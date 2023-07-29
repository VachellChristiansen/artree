<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditBot extends Component
{
    public $search = '';
    public $addQuestion = '';
    public $addResponse = '';
    public $botQuestions = [];
    public $botResponses = [];

    public function mount() 
    {
        $botData = DB::table('botresponse')
        ->where('question', 'like', '%'.$this->search.'%')
        ->orderby('id', 'asc')
        ->get();
        foreach($botData as $data) {
            $this->botQuestions[$data->id] = $data->question;
            $this->botResponses[$data->id] = $data->response;
        }
    }

    public function render()
    {
        return view('livewire.edit-bot', [
            'bots' => DB::table('botresponse')
            ->where('question', 'like', '%'.$this->search.'%')
            ->orderby('id', 'asc')
            ->get()
        ]);
    }

    public function addBotResponse() {
        $validatedData = $this->validate([
            'addQuestion' => ['required', 'regex:/^[a-zA-Z0-9!@#$%^&*()_+=[\]{}|:;<>,.?~`\s]+$/'],
            'addResponse' => 'required'
        ]);
        DB::table('botresponse')
        ->insert([
            'question' => $validatedData['addQuestion'],
            'response' => $validatedData['addResponse']
        ]);
    }

    public function saveBotChanges($id) {
        $validatedData = $this->validate([
            'botQuestions.'.$id => ['required', 'regex:/^[a-zA-Z0-9!@#$%^&*()_+=[\]{}|:;<>,.?~`\s]+$/'],
            'botResponses.'.$id => 'required'
        ]);

        $affected = DB::table('botresponse')
        ->where('id', $id)
        ->update([
            'question' => $validatedData['botQuestions'][$id],
            'response' => $validatedData['botResponses'][$id]
        ]);
    }
}
