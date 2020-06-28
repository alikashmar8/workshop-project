<?php

namespace App\Http\Controllers;

use App\User;
use App\Workshop;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $act = 2;
        $workshops = Workshop::all();
        $users = User::all();
        if (auth()->user()->type == 0) {
            $act = auth()->user()->activated;
        }
        return view('home', compact('workshops', 'users', 'act'));
    }
}
