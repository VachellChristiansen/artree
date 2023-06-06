<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EditOperators extends Component
{
    public $search = '';
    public $editing = false;
    public $who;

    public $operatorClearance;
    public $operatorName = '';
    public $operatorEmail = '';
    public $operatorPassword = '';

    public function render()
    {
        return view('livewire.edit-operators', [
            'operators' => DB::table('operators')
            ->join('clearance', 'operators.clearance_id', '=', 'clearance.id')
            ->select('operators.id', 'operators.name', 'operators.email', 'clearance.role')
            ->where('role', 'like', '%'.$this->search.'%')
            ->orWhere('name', 'like', '%'.$this->search.'%')
            ->get(),
            'roles' => DB::table('clearance')->select('role')->get(),
            'data' => DB::table('operators')
            ->where('id', $this->who)
            ->first(),
            'editing' => $this->editing,
        ]);
    }

    public function edit($id) {
        $this->editing = true;
        $this->who = $id;
    }

    public function update($id) {
        $currPassword = DB::table('operators')
        ->select('password')
        ->where('id', $id)
        ->first();
        if(Hash::check($this->operatorPassword, $currPassword->password)) {
            $validatedData = $this->validate([
                $this->operatorName => 'required|regex:/^[a-zA-Z0-9\s]+$/|between:3,60',
                $this->operatorEmail => 'required|email:rfc,dns'
            ]);
        }
    }
}
