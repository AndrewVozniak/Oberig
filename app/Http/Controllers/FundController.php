<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\Category;
use App\Models\Categoriesator;

class FundController extends Controller
{
    public function fundsView() {
        $funds = Fund::all();

        return view('funds', ['funds' => $funds]);
    }

    public function fundView($id) {
        $fund = Fund::find($id);
        
        return view('fund', ['fund' => $fund]);
    }
}
