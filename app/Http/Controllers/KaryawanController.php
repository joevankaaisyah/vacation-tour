<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //Menampilkan Data Standar Kompetensi
    $karyawan = Karyawan::all();
    return view('karyawan.index', [
    'karyawan' => $karyawan
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
        'karyawan.create', [
        'users' => User::all() //Mengirimkan semua data User ke Karyawan pada halaman create
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
        //Menyimpan Data Karyawan
    $request->validate([
    'nama_karyawan' =>'required',
    'alamat' => 'required',
    'no_hp' => 'required',
    'jabatan' => 'required',
    'id_user'=> 'required'
    ]);
    $array = $request->only([
    'nama_karyawan', 'alamat', 'no_hp', 'jabatan', 'id_user'
    ]);
    Karyawan::create($array);
    return redirect()->route('karyawan.index')
    ->with('success_message', 'Berhasil menambah data karyawan baru');
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
    $karyawan = Karyawan::find($id);
    if (!$karyawan) return redirect()->route('karyawan.index')->with('error_message', 'Karyawan dengan id = '.$id.'tidak ditemukan');
    return view('karyawan.edit', [
    'karyawan' => $karyawan,
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
        //Mengedit Data Standar Kompetensi
    $request->validate([
    'nama_karyawan' =>'required',
    'alamat' => 'required',
    'no_hp' => 'required',
    'jabatan' => 'required',
    'id_user'=> 'required'
    ]);
    $karyawan = Karyawan::find($id);
    $karyawan->nama_karyawan = $request->nama_karyawan;
    $karyawan->alamat = $request->alamat;
    $karyawan->no_hp = $request->no_hp;
    $karyawan->jabatan = $request->jabatan;
    $karyawan->id_user = $request->id_user;
    $karyawan->save();
    return redirect()->route('karyawan.index')
    ->with('success_message', 'Berhasil mengubah Data Karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Menghapus Data Karyawan
    $karyawan = Karyawan::find($id);
    if ($karyawan) $karyawan->delete();
    return redirect()->route('karyawan.index')->with('success_message', 'Berhasil menghapus Data Karyawan "' . $karyawan->nama_karyawan . '" !');
    }
}
