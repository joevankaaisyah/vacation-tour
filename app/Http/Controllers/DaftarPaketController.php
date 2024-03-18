<?php

namespace App\Http\Controllers;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarpaket = DaftarPaket::all();
        return view('daftarpaket.index', [
        'daftarpaket' => $daftarpaket
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
            'daftarpaket.create', [
            'paket' => PaketWisata::all() //Mengirimkan semua data Paket Wisata ke Daftar Paket pada halaman create
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
        'nama_paket' =>'required',
        'id_paket_wisata' => 'required',
        'jumlah_peserta' => 'required',
        'harga_paket' => 'required',
        ]);
        $array = $request->only([
        'nama_paket', 'id_paket_wisata', 'jumlah_peserta', 'harga_paket'
        ]);
        DaftarPaket::create($array);
        return redirect()->route('daftarpaket.index')
        ->with('success_message', 'Berhasil menambah data Daftar Paket baru');
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
    $daftarpaket = DaftarPaket::find($id);
    if (!$daftarpaket) return redirect()->route('daftarpaket.index')->with('error_message', 'Daftar Paket dengan id = '.$id.'tidak ditemukan');
    return view('daftarpaket.edit', [
    'daftarpaket' => $daftarpaket,
    'paket' => PaketWisata::all() //Mengirimkan semua data user ke Modal pada halaman edit
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
        'nama_paket' =>'required',
        'id_paket_wisata' => 'required',
        'jumlah_peserta' => 'required',
        'harga_paket' => 'required',
        ]);
        $daftarpaket = DaftarPaket::find($id);
        $daftarpaket->nama_paket = $request->nama_paket;
        $daftarpaket->id_paket_wisata = $request->id_paket_wisata;
        $daftarpaket->jumlah_peserta = $request->jumlah_peserta;
        $daftarpaket->harga_paket = $request->harga_paket;
        $daftarpaket->save();
        return redirect()->route('daftarpaket.index')
        ->with('success_message', 'Berhasil mengubah Data Daftar Paket');
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
    $daftarpaket = DaftarPaket::find($id);
    if ($daftarpaket) $daftarpaket->delete();
    return redirect()->route('daftarpaket.index')->with('success_message', 'Berhasil menghapus Data daftarpaket "' . $daftarpaket->nama_paket . '" !');
    }
}
