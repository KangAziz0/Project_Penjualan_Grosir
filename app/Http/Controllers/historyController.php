<?php

namespace App\Http\Controllers;

use App\Models\history;
use Illuminate\Http\Request;

class historyController extends Controller
{
    public function index(){
        $data['history'] = history::all();
        return view('history.history',$data);
    }
}
