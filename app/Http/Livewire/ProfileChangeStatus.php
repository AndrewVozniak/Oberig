<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Auth;

class ProfileChangeStatus extends Component
{
    public function render()
    {
        return view('livewire.profile-change-status');
    }

    public function change_status() {
        $status = (Auth::user()->status) ? False : True;
        Auth::user()->status = $status;
        Auth::user()->save();
    }
}
