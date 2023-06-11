<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

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

        $affected = DB::table('chatbot')->insert([
            'chat_id' => $this->chatId,
            'actor' => 'user',
            'chat' => $validatedData['ask']
        ]);
        $chatData = DB::table('chatbot')->select('actor', 'chat')->where('chat_id', $this->chatId)->get();
        $this->userChat = $chatData ? $chatData : [];
        $this->dispatchBrowserEvent('contentChanged', ['event' => 'Added']);
        $this->fetchResponse($this->ask);
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
}
