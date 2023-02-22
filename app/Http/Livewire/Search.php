<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Fundraising;
use App\Models\Fund;

class Search extends Component
{
    public $users;
    public $funds;
    public $fundraisings;

    public $searchTerm;
    public $funds_checkbox;
    public $users_checkbox;
    public $fundraisings_checkbox;

    public function __construct() {
        $this->funds_checkbox = true;
        $this->users_checkbox = true;
        $this->fundraisings_checkbox = true;
    }

    public function render()
    {        
        if($this->funds_checkbox) {
            if($this->searchTerm != null) {
                $searchTerm = '%' . $this->searchTerm . '%';
                $this->funds = Fund::where('name', 'like', $searchTerm)->get();
            } else {
                $this->funds = Fund::all();
            }
        }

        if($this->users_checkbox) {
            if($this->searchTerm != null) {
                $searchTerm = '%' . $this->searchTerm . '%';
                $this->users = User::where('status', '=', true)->where('name', 'like', $searchTerm)->get();
            } else {
                $this->users = User::where('status', '=', true)->get();                         
            }
        }
        
        if($this->fundraisings_checkbox) {
            if($this->searchTerm != null) {
                $searchTerm = '%' . $this->searchTerm . '%';
                $this->fundraisings = Fundraising::where('status', '=', true)->where('name', 'like', $searchTerm)->get();
            } else {
                $this->fundraisings = Fundraising::where('status', '=', true)->get();
            }
        }

        return view('livewire.search');
    }
}
