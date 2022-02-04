<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kode_kantor;
use App\Models\Uploadak;

class UploadakController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kantors    = Kode_kantor::all();
        $dataak     = Uploadak::latest()->get();
        return view('akunting.data-uploadak',compact('dataak','kantors'));
    }
     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kantors    = Kode_kantor::all();
        $datas      = Uploadak::all();

        return view('akunting.create-uploadak',compact('kantors','datas'));
    }
}
