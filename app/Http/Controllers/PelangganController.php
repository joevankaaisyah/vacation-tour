<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan Data Pelanggan
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', [
        'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan Form Tambah Karyawan
        return view(
            'pelanggan.create', [
            'users' => User::all() //Mengirimkan semua data User ke Pelanggan pada halaman create
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Menyimpan Data Pelanggan
        $request->validate([
        'nama_lengkap' =>'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'foto' => 'required|image|file|max:2048',
        'id_user'=> 'required'
        ]);
        $array = $request->only([
        'nama_lengkap', 'no_hp', 'alamat', 'foto', 'id_user'
        ]);
        $array['foto'] = $request->file('foto')->store('Foto Pelanggan');
        $tambah=Pelanggan::create($array);
        if($tambah) $request->file('foto')->store('Foto Pelanggan');
        return redirect()->route('pelanggan.index')->with('success_message', 'Berhasil menambah data pelanggan baru');
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
        //Menampilkan Form Edit
        $pelanggan = Pelanggan::find($id);
        if (!$pelanggan) return redirect()->route('pelanggan.index')->with('error_message', 'Pelanggan dengan id'.$id.' tidak ditemukan');
        return view('pelanggan.edit', [
            'pelanggan' => $pelanggan,
            'users' => User::all() //Mengirimkan semua data user ke Modal pada halaman edit
        ]);
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
        // Mengedit Data Pelanggan
        $request->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'foto' => $request->file('foto') != null ? 'image|file|max:2048' : '',
            'id_user'=> 'required'
        ]);
        $pelanggan = Pelanggan::find($id);
        $pelanggan->nama_lengkap = $request->nama_lengkap;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->alamat = $request->alamat;
        if($request->file('foto') != null){
            unlink("storage/" . $pelanggan->foto);
            $pelanggan->foto = $request->file('foto')->store('Foto Pelanggan');
            }
        $pelanggan->save();
        $pelanggan->id_user = $request->id_user;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with('success_message', 'Berhasil mengubah data pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Menghapus Guru
        $pelanggan = Pelanggan::find($id);
        if($pelanggan){
        $hapus = $pelanggan->delete();
        if($hapus) unlink("storage/" . $pelanggan->foto);
        } 
        return redirect()->route('pelanggan.index') ->with('success_message', 'Berhasil menghapus data pelanggan "' . $pelanggan->nama_lengkap . '" !');
    }
}
