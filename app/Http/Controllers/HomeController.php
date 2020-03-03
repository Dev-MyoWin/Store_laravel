<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use App\History;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        History::create(['description'=> Auth::user()->name." login at ".now()]);	
        return redirect()->route('products.index');
    }
}
