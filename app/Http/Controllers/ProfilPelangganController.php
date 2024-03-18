<?php

namespace App\Http\Controllers;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfilPelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan Profil Pelanggan
    $pelanggan = Pelanggan::where('nama_lengkap', Auth::user()->name)->first();
    return view('profil-pelanggan.index', ['pelanggan' => $pelanggan]);
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
        //Menampilkan Form Edit Pelanggan
    $pelanggan = Pelanggan::find($id);
    if (!$pelanggan) return redirect()->route('profil-pelanggan.index')->with('error_message', 'Pelanggan dengan ID = '.$id.' tidak ditemukan');
    return view('profil-pelanggan.edit', [
    'pelanggan' => $pelanggan,
    'users' => User::all()
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
        return redirect()->route('profil-pelanggan.index')->with('success_message', 'Berhasil mengubah data pelanggan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
