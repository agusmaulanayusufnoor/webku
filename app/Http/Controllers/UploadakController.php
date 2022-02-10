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

        $uploadfile = new Uploadak;
        $uploadfile->kantor_id  = $request->kantor_id;
        $uploadfile->namafile   = $request->namafile;
        $uploadfile->periode   = $request->periode;
        // $hari       = substr($uploadfile->periode,13,2);
        // $bulan      = substr($uploadfile->periode,16,2);
        // $tahun      = substr($uploadfile->periode,19);
        // $arr        = array($tahun,$bulan,$hari);
        // $periode    = implode("",$arr);
        $file   = $request->namafile.".00".$request->kantor_id.".".$nm->getClientOriginalName();
        $uploadfile->file       = $file;
        //masukan ke folder file
        $nm->move(public_path().'/fileak', $file);
        $uploadfile->save();
        notify()->success("sudah diupload","File ".$request->namafile." ","topCenter");
       // session()->flash('message','file '.$request->namafile.' sudah diupload');
        //return back();
        return redirect('akunting/download');
    }

    public function destroy($id)
    {
        //hapus data satu2
        $dataak     = Uploadak::find($id);
        $dataak->delete();

        $file = public_path("fileak/".$dataak->file);
        //dd($id);
        if (! file_exists($file)){
            session()->flash('hapus','file sudah dihapus');
            return redirect('akunting/download');
        }else{
            unlink("fileak/".$dataak->file);
            notify()->error("Berhasil Dihapus","File ".$dataak->namafile."","topCenter");
        //session()->flash('hapus','file sudah dihapus');
        return redirect('akunting/download');
        }
      //Image::where("id", $image->id)->delete();
    }//endfunctiondestroy

}
