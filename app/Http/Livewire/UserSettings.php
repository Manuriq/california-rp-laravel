<?php

namespace App\Http\Livewire;

use App\Models\Comptes;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserSettings extends Component
{
    public $user = [];

    protected $rules = [
        "user.cNom" => "required|string|min:6|disable",
        "user.cEmail" => "required|string|email|max:255|unique:comptes|disable",
        "user.password" => "required|string|password|min:6"
    ];

    public function mount(){
        $this->user = Auth::user();
    }

    public function save(){

    }

    public function render()
    {
        return view('livewire.user-settings');
    }
}
