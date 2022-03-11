<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->user()->is_agent == 0) {
            return view('dashboard.index');
        } else {
            return view('dashboard.index-agent');
        }
    }

}
