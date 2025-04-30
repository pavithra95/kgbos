<?php

namespace App\Http\Controllers;

use App\Models\Verify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        if ($user->role == 'hod') {
            $items = Verify::where('hod_name',$user->id)->where('status','pending')->get();
        } else {
            if ($user->role == 'dean'){
                $items = Verify::where('dean_name',$user->id)->where('status','verified_by_hod')->get();
            }
            else{
                $items = Verify::where('status','verified_by_dean')->get();
            }
        }
        
        
        return view('home')->with(compact('items'));
    }
}
