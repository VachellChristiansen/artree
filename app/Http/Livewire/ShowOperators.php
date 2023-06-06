<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ShowOperators extends Component
{
    public $search = '';
    public $operatorNames = [];
    public $operatorEmails = [];

    public function mount()
    {
        $operatorData = DB::table('operators')
        ->join('clearance', 'operators.clearance_id', '=', 'clearance.id')
        ->select('operators.id', 'operators.name', 'operators.email', 'clearance.role')
        ->where('role', 'like', '%'.$this->search.'%')
        ->orWhere('name', 'like', '%'.$this->search.'%')
        ->get();
        foreach ($operatorData as $data) {
            $this->operatorNames[$data->id] = $data->name;
            $this->operatorEmails[$data->id] = $data->email;
        }
    }

    public function render()
    {
        return view('livewire.show-operators', [
            'operators' => DB::table('operators')
            ->join('clearance', 'operators.clearance_id', '=', 'clearance.id')
            ->select('operators.id', 'operators.name', 'operators.email', 'clearance.role')
            ->where('role', 'like', '%'.$this->search.'%')
            ->orWhere('name', 'like', '%'.$this->search.'%')
            ->get(),
            'roles' => DB::table('clearance')->select('role')->get(),
            'data' => '',
            'testName' => $this->operatorNames,
            'testEmail' => $this->operatorEmails
        ]);
    }

    public function chooseRole($role) {
        $this->search = $role;
    }

    public function saveOperatorChanges($id) {
        $validatedData = $this->validate([
            'operatorNames.'.$id => 'required|regex:/^[a-zA-Z0-9\s]+$/|between:3,60',
            'operatorEmails.'.$id => 'required|email:rfc,dns'
        ]);

        $affected = DB::table('operators')
        ->where('id', $id)
        ->update([
            'name' => $validatedData['operatorNames'][$id],
            'email' => $validatedData['operatorEmails'][$id]
        ]);
    }
}
