<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kode_kantor;
use App\Models\Uploadba;
use Session;

class UploadbaController extends Controller
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
        $databa     = Uploadba::latest()->get();
        return view('pelayanan.data-uploadba',compact('databa','kantors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kantors    = Kode_kantor::all();
        $datas      = Uploadba::all();

        return view('pelayanan.create-uploadba',compact('kantors','datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        //validasi form
        $request->validate([

            'namafile' => 'required',
            'kantor_id' => 'required',
            'file' => 'required|mimes:zip'
        ],[
            'namafile.required' => 'nama file harus diisi',
            'kantor_id.required' => 'kantor belum dipilih',
            'file.required' => 'nama file harus nama kantor (ex: cab-kpo.zip)',
            'file.mimes' => 'file yang di upload harus berbentuk .zip'
        ]);

        $nm         = $request->file;

        $uploadfile = new Uploadba;
        $uploadfile->kantor_id  = $request->kantor_id;
        $uploadfile->namafile   = $request->namafile;
        $uploadfile->periode   = $request->periode;
        $hari       = substr($uploadfile->periode,13,2);
        $bulan      = substr($uploadfile->periode,16,2);
        $tahun      = substr($uploadfile->periode,19);
        $arr        = array($tahun,$bulan,$hari);
        $periode    = implode("",$arr);
        $file   = "01020101.600324.OP001UN-A.".$periode.".00".$request->kantor_id.".".$nm->getClientOriginalName();
        $uploadfile->file       = $file;
        //masukan ke folder file
        $nm->move(public_path().'/fileba', $file);
        $uploadfile->save();
        session()->flash('message','file sudah diupload');
        //return back();
        return redirect('pelayanan/download');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //hapus data satu2
        $databa     = Uploadba::find($id);
        $databa->delete();

        $file = public_path("fileba/".$databa->file);
        //dd($id);
        if (! file_exists($file)){
            session()->flash('hapus','file sudah dihapus');
            return redirect('pelayanan/download');
        }else{
            unlink("fileba/".$databa->file);
        session()->flash('hapus','file sudah dihapus');
        return redirect('pelayanan/download');
        }




        //Image::where("id", $image->id)->delete();
    }
}
