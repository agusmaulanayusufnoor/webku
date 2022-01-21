<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Kode_kantor_slik;
use App\Models\Level;
use App\Models\Stock_jenis;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $stock_jenis     = Stock_jenis::all();
       $kantors         = Kode_kantor_slik::all();
       $stockdata       = stock::all();

    //    if($request->ajax()){           
    //     //Jika request from_date ada value(datanya) maka
    //     if(!empty($request->from_date))
    //     {
    //         //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
    //         if($request->from_date === $request->to_date){
    //             //kita filter tanggalnya sesuai dengan request from_date
    //             $list_pegawai = Pegawai::whereDate('tanggal','=', $request->from_date)->get();
    //         }
    //         else{
    //             //kita filter dari tanggal awal ke akhir
    //             $list_pegawai = Pegawai::whereBetween('tanggal', array($request->from_date, $request->to_date))->get();
    //         }                
    //     }
    //     //load data default
    //     else
    //     {
    //         $list_pegawai = Pegawai::all();
    //     }
    //     return datatables()->of($list_pegawai)
    //                 ->addColumn('action', function($data){
    //                     $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
    //                     $button .= '&nbsp;&nbsp;';
    //                     $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
    //                     return $button;
    //                 })
    //                 ->rawColumns(['action'])
    //                 ->addIndexColumn()
    //                 ->make(true);            
    // }
      return view('stock.stock', compact('stockdata','stock_jenis','kantors',));
       //return view('stock.stock');

       //return $stockdata;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(stock $stock)
    {
        //
    }
    public function search(Request $request)
    {
        $stock_jenis     = Stock_jenis::all();
        $kantors         = Kode_kantor_slik::all();
        //cari tanggal
        $tgl1    = '2022-01-01';
        $tgl2    = '2022-01-05';
        $query   = stock::where('tanggal', '>=', $tgl1);
        dd($query); 
        return view('stock.stock', compact('query'));
    }
}
