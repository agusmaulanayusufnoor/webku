<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kode_kantor;
use App\Models\Uploaddep;
use Session;

class UploaddepController extends Controller
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
         $datadep     = Uploaddep::latest()->get();
         return view('pelayanan.data-uploaddep',compact('datadep','kantors'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         $kantors    = Kode_kantor::all();
         $datas      = Uploaddep::all();
         //$setperiode         = Setperiode::orderBy('id', 'DESC')->take(1)->get();
         return view('pelayanan.create-uploaddep',compact('kantors','datas'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */

      public function store(Request $request)
      {
          //dd($request->all());
         // validasi form
          $request->validate([
              'no_rekening' => 'required',
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
              'file.mimes' => 'file yang di upload harus berbentuk .zip'
          ]);



          $uploadfile = new Uploaddep;
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
          $namafile   = $request->no_rekening.".".$request->namafile.".".$nm->getClientOriginalName();
          $uploadfile->file       = $namafile;
          //masukan ke folder file

          $nm->move(public_path().'/filedep', $namafile);
          $uploadfile->save();
          session()->flash('message','file '.$request->namafile.' sudah diupload');
          //return back();
          return redirect('pelayanan/downloaddep');
      }

      public function destroy($id)
      {
          //hapus data satu2
          $datadep     = Uploaddep::find($id);
          $datadep->delete();

          $file = public_path("filedep/".$datadep->file);
          //dd($id);
          if (! file_exists($file)){
              session()->flash('hapus','file sudah dihapus');
              return redirect('pelayanan/downloaddep');
          }else{
              unlink("filedep/".$datadep->file);
          session()->flash('hapus','file sudah dihapus');
          return redirect('pelayanan/downloaddep');
          }
      }
}
