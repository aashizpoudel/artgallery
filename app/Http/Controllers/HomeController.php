<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Art;
use App\Interest;

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
        $arts = auth()->user()->arts()->latest()->paginate(3);
        $interests= Interest::with('art','user')->whereHas('art',function($q){
            $q->where('user_id',auth()->user()->id);
        })->latest()->paginate(4);
        return view('home',compact('arts','interests'));
    }
}
