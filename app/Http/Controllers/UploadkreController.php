<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kode_kantor;
use App\Models\Uploadkre;
use Session;

class UploadkreController extends Controller
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
        $kantors    = Kode_kantor::all();
        $datakre     = Uploadkre::latest()->get();
        return view('kredit.data-uploadkre',compact('datakre','kantors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kantors    = Kode_kantor::all();
        $datas      = Uploadkre::all();
        //$setperiode         = Setperiode::orderBy('id', 'DESC')->take(1)->get();
        return view('kredit.create-uploadkre',compact('kantors','datas'));
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
       // validasi form
        $request->validate([
            'no_rekening' => 'required|unique:uploadkre',
            'periode' => 'required',
            'namafile' => 'required',
            'kantor_id' => 'required',
            'file' => 'required|mimes:zip'
        ],[
            'no_rekening.required' => 'norekening harus diisi',
            'periode.required' => 'periode pelaporan harus diisi',
            'namafile.required' => 'nama file harus diisi',
            'kantor_id.required' => 'kantor belum dipilih',
            'file.required' => 'nama file nama_nasabah (ex: ASEP.zip)',
            'file.mimes' => 'file yang di upload harus berbentuk .zip',
            'no_rekening.unique' => 'no rekening sudah ada dalam data'
        ]);



        $uploadfile = new Uploadkre;
        $uploadfile->kantor_id      = $request->kantor_id;
        $uploadfile->no_rekening    = $request->no_rekening;
        //$uploadfile->kode_obox      = $request->kode_obox;
        $uploadfile->periode        = $request->periode;
        $uploadfile->namafile       = $request->namafile;
        $hari       = substr($uploadfile->periode,13,2);
        $bulan      = substr($uploadfile->periode,16,2);
        $tahun      = substr($uploadfile->periode,19);
        $arr        = array($tahun,$bulan,$hari);
        $periode    = implode("",$arr);
        $nm         = $request->file;
        $namafile   = "01020101.600324."."UN-A.".$uploadfile->no_rekening.".".$nm->getClientOriginalName();
        $uploadfile->file       = $namafile;
        //masukan ke folder file

        $nm->move(public_path().'/filekre', $namafile);
        $uploadfile->save();
        notify()->success("sudah diupload","File ".$request->namafile." ","topCenter");
        //session()->flash('message','file '.$request->namafile.' sudah diupload');
        //return back();
        return redirect('kredit/download');
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
        $datakre     = Uploadkre::find($id);
        $datakre->delete();

        $file = public_path("filekre/".$datakre->file);
        //dd($id);
        if (! file_exists($file)){
            session()->flash('hapus','file sudah dihapus');
            return redirect('kredit/download');
        }else{
            unlink("filekre/".$datakre->file);
            notify()->error("Berhasil Dihapus","File ".$datakre->namafile."","topCenter");
       // session()->flash('hapus','file sudah dihapus');
        return redirect('kredit/download');
        }
    }
}
