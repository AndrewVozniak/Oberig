<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundraisingController extends Controller
{
    public function fundraisingsView() {
        return view('fundraisings');
    }
}
