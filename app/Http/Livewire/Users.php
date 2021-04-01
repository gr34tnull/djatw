<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users;

    public function mount()
    {
        // $this->users = User::all();
        $this->users = User::where('admin',false)->get();
    }

    public function render()
    {
        return view('livewire.users');
    }
}
