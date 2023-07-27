<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ChatBot extends Component
{
    public int $chatId = 0;
    public string $state = 'closed';
    public string $ask = '';
    public $userChat = [];

    public function messages(): array
    {
        return [
            'ask.regex' => 'Pertanyaan harus menggunakan alfabet, angka, dan " . , ? ! " saja.',
        ];
    }

    public function render()
    {
        return view('livewire.chat-bot', [
            'state' => $this->state,
            'chats' => $this->userChat
        ]);
    }

    public function open()
    {
        if (!$this->chatId) {
            $this->chatId = DB::table('chatlog')->max('id') + 1;
            DB::table('chatlog')->insert([
                'id' => $this->chatId,
                'info' => 'chatbot'
            ]);
            DB::table('chatbot')->insert([
                'chat_id' => $this->chatId,
                'actor' => 'bot',
                'chat' => 'Halo! Adakah yang bisa saya bantu?'
            ]);
        }
        $chatData = DB::table('chatbot')->select('actor', 'chat')->where('chat_id', $this->chatId)->get();
        
        $this->userChat = $chatData ? $chatData : [];
        $this->state = 'opened';
    }

    public function close()
    {
        $this->ask = '';
        $this->state = 'closed';
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'ask' => 'regex:/^[a-zA-Z0-9,!?\.\s]+$/'
        ]);

        $typoCorr = $this->typoCorrection($validatedData['ask']);

        $affected = DB::table('chatbot')->insert([
            'chat_id' => $this->chatId,
            'actor' => 'user',
            'chat' => $typoCorr['text']
        ]);
        $chatData = DB::table('chatbot')->select('actor', 'chat')->where('chat_id', $this->chatId)->get();
        $this->userChat = $chatData ? $chatData : [];
        $this->dispatchBrowserEvent('contentChanged', ['event' => 'Added']);
        $this->fetchResponse($typoCorr['text']);
        $this->ask = '';
    }

    public function fetchResponse(string $question) {
        $response = DB::table('botresponse')->select('response')->where('question', $question)->first() ? DB::table('botresponse')->select('response')->where('question', $question)->first()->response : "Maaf saya tidak memiliki respons untuk pertanyaan Anda";

        $affected = DB::table('chatbot')->insert([
            'chat_id' => $this->chatId,
            'actor' => 'bot',
            'chat' => $response
        ]);
        $chatData = DB::table('chatbot')->select('actor', 'chat')->where('chat_id', $this->chatId)->get();
        $this->userChat = $chatData ? $chatData : [];
        $this->dispatchBrowserEvent('contentChanged', ['event' => 'Added']);
    }

    public function typoCorrection(string $ask) {
        $url = 'http://127.0.0.1:5000/typo'; // Replace with the API endpoint URL
        $queryParams = [
            'text' => $ask
        ];

        try {
            $response = Http::get($url, $queryParams);

            if ($response->successful()) {
                $data = $response->json(); // Convert the response to JSON
                // Process the API data as needed
                return $data;
            } else {
                // Handle the case when the API request is not successful
                return response()->json(['error' => 'API request failed'], $response->status());
            }
        } catch (Exception $e) {
            // Handle exceptions if any occurred during the API request
            return response()->json(['error' => 'API request error'], 500);
        }
    }
}
