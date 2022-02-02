<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\Kode_kantor;
use App\Models\Level;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tampil data
       $datas = User::all();
        return view('user.userdata', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels     = Level::all();
        $kantors    = Kode_kantor::all();
        $users      = new User;

        //page tambah user
        return view('user.create', compact('levels','kantors','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi form
        $request->validate([
            'username' => 'required|max:8|unique:users',
            'name' => 'required',
            'level_id' => 'required',
            'kantor_id' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ],[
            'username.required' => 'username harus diisi',
            'name.required' => 'nama lengkap harus diisi',
            'password.required' => 'password minimal 6 huruf'
        ]);
        //return $request;
        //proses insert data
        $users = new User;
        $users->name        = $request->name;
        $users->username    = $request->username;
        $users->level_id    = $request->level_id;
        $users->kantor_id   = $request->kantor_id;
        $users->password    = Hash::make($request->password);
        $users->save();

        //return back()->with('status', 'Data ditambah!');
       // return $request;
        session()->flash('message','user '.$users->username.' ditambahkan');
        return redirect('user');
    }
    public function __construct()
    {
        $this->middleware('auth');
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
        //ubah data user
        $levels     = Level::all();
        $kantors    = Kode_kantor::all();
        $users      = User::find($id);

        //page tambah user
        return view('user.edit', compact('levels','kantors','users'));

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
        //update data ke database
         //validasi form
         $request->validate([
            'username' => 'required|max:8',
            'name' => 'required',
            'level_id' => 'required',
            'kantor_id' => 'required',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'password_confirmation'  => 'required', 'string', 'min:8',
        ],[
            'username.required' => 'username harus diisi',
            'name.required' => 'nama lengkap harus diisi',
            'password.required' => 'password minimal 8 huruf',
        ]);
        //return $request;
        //proses insert data
        $users = User::find($id);
        $users->name        = $request->name;
        $users->username    = $request->username;
        $users->level_id    = $request->level_id;
        $users->kantor_id   = $request->kantor_id;
        $users->password    = Hash::make($request->password);
        $users->save();

        //return back()->with('status', 'Data ditambah!');
       // return $request;

        return redirect('user');
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
        $users = User::find($id);

        $users->delete();
        session()->flash('hapus','user sudah dihapus');
        return redirect('user');
    }
}
