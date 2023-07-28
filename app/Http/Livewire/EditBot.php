<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class EditBot extends Component
{
    public $botQuestions = [];
    public $botResponses = [];

    public function mount() 
    {
        $botData = DB::table('botresponse')
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
            ->get()
        ]);
    }
}
