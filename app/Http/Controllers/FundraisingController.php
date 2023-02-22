<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fundraising;

class FundraisingController extends Controller
{
    public function fundraisingsView() {
        $fundraisings = Fundraising::where('status', '=', 1)->get()->sortByDesc('id');
        $users = User::all();

        return view('fundraisings', ['fundraisings' => $fundraisings, 'users' => $users]);
    }
}
