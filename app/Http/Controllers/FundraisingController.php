<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fundraising;
use Auth;

class FundraisingController extends Controller
{
    public function fundraisingsView() {
        $fundraisings = Fundraising::where('status', '=', 1)->get()->sortByDesc('id');
        $users = User::all();

        return view('fundraisings', ['fundraisings' => $fundraisings, 'users' => $users]);
    }

    public function fundraisingCreate(Request $req) {
        $name = $req->input('name');
        $description = $req->input('description');
        $max_amount = $req->input('max_ammount');
        $current_amount = 0;
        $foundator_id = Auth::user()->id;

        $fundraising = new Fundraising;
        $fundraising->name = $name;
        $fundraising->description = $description;
        $fundraising->max_amount = $max_amount;
        $fundraising->current_amount = $current_amount;
        $fundraising->foundator_id = $foundator_id;

        $fundraising->save();

        return redirect()->route('user_public_profile_page', ['id' => $foundator_id]);
    }

    public function fundraisingDelete($id) {
        $fundraising = Fundraising::find($id);

        if(Auth::user()->id == $fundraising->foundator_id) {
            $fundraising->delete();
        }

        return redirect()->route('user_public_profile_page', ['id' => Auth::user()->id]);
    }
    
}
