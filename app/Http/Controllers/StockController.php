<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Kode_kantor_slik;
use App\Models\Kode_kantor;
use App\Models\Level;
use App\Models\Stock_jenis;
use Carbon\Carbon;
use App\Http\Controllers\AjaxController;
use Yajra\DataTables\DataTables;
use DB;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
       $stock_jenis     = Stock_jenis::all();
       $kantors         = kode_kantor::all();
      // $stockdata       = stock::all();
        $stockdata = stock::join('kode_kantors', 'stocks.sandi_kantor', '=', 'kode_kantors.id')
        ->get(['stocks.*','kode_kantors.*']);
//dd($stockdata);

      //return view('stock.stock', compact('stockdata','stock_jenis','kantors',));

        if($request->ajax()){

            if(!empty($request->from_date))
            {
                $tgl1 = Carbon::today();
                $tgl1 = Carbon::today();
                $tgl1    = Carbon::createFromFormat('d/m/Y',request()->from_date)->format('Y-m-d'); // Carbon::createFromFormat('d/m/Y', $request->stockupdate)->format('Y-m-d')

                $tgl2    = Carbon::createFromFormat('d/m/Y',request()->to_date)->format('Y-m-d');


                //Jika tanggal awal(from_date) hingga tanggal akhir(to_date) adalah sama maka
                if($request->from_date == $request->to_date){

                    //kita filter tanggalnya sesuai dengan request from_date
                     $stockdata = stock::join('kode_kantors', 'stocks.sandi_kantor', '=', 'kode_kantors.id')
                                        ->orderBy('tanggal', 'DESC')
                                        ->whereDate('tanggal',$tgl1)
                                        ->get(['stocks.*','kode_kantors.kode_kantor','kode_kantors.nama_kantor']);


                 }
                 else{
                //     //kita filter dari tanggal awal ke akhir
                     $stockdata = stock::join('kode_kantors', 'stocks.sandi_kantor', '=', 'kode_kantors.id')
                                        ->orderBy('tanggal', 'DESC')
                                        ->whereBetween('tanggal', [$tgl1, $tgl2])
                                        ->get(['stocks.*','kode_kantors.kode_kantor','kode_kantors.nama_kantor']);

                 }


            }
            //load data default
            else
            {
                $stock_jenis     = Stock_jenis::all();
                $kantors         = kode_kantor::all();
                $stockdata = stock::all();
                $stockdata = stock::join('kode_kantors', 'stocks.sandi_kantor', '=', 'kode_kantors.id')
                            ->orderBy('tanggal', 'DESC')
                           ->get(['stocks.*','kode_kantors.kode_kantor','kode_kantors.nama_kantor']);


            }
            return datatables()->of($stockdata)
                        ->addColumn('action', function($data){
                            $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-primary btn-xs edit-post"><i class="far fa-edit"></i></a>';
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs"><i class="far fa-trash-alt"></i></button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
       //return view('stock.stock');
       return view('stock.stock', compact('stockdata','stock_jenis','kantors',));
       //return response()->json($stockdata);
        
       //
       //return $stockdata;
    }
    public function search(Request $request)
    {
        $stock_jenis     = Stock_jenis::all();
        $kantors         = Kode_kantor_slik::all();

        //cari tanggal
        if (request()->from || request()->to) {
        $tgl1    = Carbon::parse(request()->from)->toDateTimeString();
        //Carbon::parse(request()->start_date)->toDateTimeString();
        $tgl2    = Carbon::parse(request()->to)->toDateTimeString();
        $stockdata   = stock::whereBetween('tanggal',[$tgl1,$tgl2])->get();
        } else {
            $stockdata = stock::latest()->get();
        }
        //dd($tgl1);
        return view('stock.stock', compact('stockdata','stock_jenis','kantors',));
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
        $id = $request->id;

        $post   =  stock::updateOrCreate(['id' => $id],
                    [
                        'jenis'             =>  $request->jenis,
                        'sandi_kantor'      =>  $request->sandi_kantor,
                        'tanggal'           =>  Carbon::createFromFormat('d/m/Y',request()->tanggal)->format('Y-m-d'),
                        'jml_stok_awal'     =>  $request->jml_stok_awal,
                        'tambahan_stok'     =>  $request->tambahan_stok,
                        'jml_digunakan'     =>  $request->jml_digunakan,
                        'jml_rusak'         =>  $request->jml_rusak,
                        'jml_hilang'        =>  $request->jml_hilang,
                        'jml_stok_akhir'    =>  $request->jml_stok_akhir
                    ]);
                    
        return response()->json($post);
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
    public function edit($id)
    {
        //edit stock
        $where = array('id' => $id);
        $post  = stock::where($where)->first();
        //$post   = stock::with($id)-->first();
        return response()->json($post);
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
    public function destroy($id)
    {
        //hapus data untuk ajax json
        $hapusstock = stock::where('id',$id)->delete();

        //hapus data untuk eloquent laravel8
       //  $hapusstock = stock::find($id);
      //   $hapusstock->delete();
        return response()->json($hapusstock);
    //    return redirect('stock');
    }
   
}
