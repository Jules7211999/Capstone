<?php

namespace App\Http\Controllers;

use App\Models\Months;
use Illuminate\Http\Request;

class HistoryLogController extends Controller
{
    public function index(){

        $months = Months::has('history')->with('history.user')->get();
        return view('Superuser.History.history',['months' => $months]);
    }
}
