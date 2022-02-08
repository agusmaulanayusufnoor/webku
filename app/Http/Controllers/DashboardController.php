<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setperiode;

class DashboardController extends Controller
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
    public function index(){
       //$setperiode         = Setperiode::orderBy('id', 'DESC')->take(1)->get();
        return view('dashboard');
    }

    // public function setperiode(Request $request){
    //     //dd($request->all());
    //     $setperiode                 = new Setperiode;
    //     $setperiode->periode        = $request->periode;
    //     $setperiode->save();
    //     return redirect()->back()->with('pesanperiode', 'Tanggal Periode Disimpan');
    // }
}
