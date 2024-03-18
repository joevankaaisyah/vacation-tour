<?php

namespace App\Http\Controllers;
use App\Models\Reservasi;
use App\Models\DaftarPaket;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use PDF;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        return view('reservasi.index', [
        'reservasi' => $reservasi
        ]);
    }

    public function exportpdf(){
        $data = Reservasi::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('datareservasi-pdf');
        return $pdf->download('data reservasi.pdf');
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
            'reservasi.create', [
            'paket' => DaftarPaket::all(),
            'pelanggan' => Pelanggan::all()
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
        //Menyimpan Data Reservasi
        $request->validate([
        'id_pelanggan' =>'required',
        'id_daftar_paket' => 'required',
        'tgl_reservasi_wisata' => 'required',
        'harga' => 'required',
        'jumlah_peserta' => 'required',
        'diskon' => 'required',
        'nilai_diskon' => 'required',
        'total_bayar' => 'required',
        'file_bukti_tf' => 'required|image|file|max:2048',
        'status_reservasi_wisata' => 'required'
        ]);
        $array = $request->only([
        'id_pelanggan', 'id_daftar_paket', 'tgl_reservasi_wisata', 'harga', 'jumlah_peserta', 'diskon', 'nilai_diskon', 'total_bayar', 'file_bukti_tf', 'status_reservasi_wisata'
        ]);
        $array['file_bukti_tf'] = $request->file('file_bukti_tf')->store('Foto Bukti Transfer');
        $tambah=Reservasi::create($array);
        if($tambah) $request->file('file_bukti_tf')->store('Foto Bukti Transfer');
        return redirect()->route('reservasi.index')->with('success_message', 'Berhasil menambah data reservasi baru');
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
        $reservasi = Reservasi::find($id);
        if (!$reservasi) return redirect()->route('reservasi.index')->with('error_message', 'Reservasi dengan id'.$id.' tidak ditemukan');
        return view('reservasi.edit', [
            'reservasi' => $reservasi,
            'paket' => DaftarPaket::all(),
            'pelanggan' => Pelanggan::all()
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
         //Menyimpan Data Reservasi
        $request->validate([
            'id_pelanggan' =>'required',
            'id_daftar_paket' => 'required',
            'tgl_reservasi_wisata' => 'required',
            'harga' => 'required',
            'jumlah_peserta' => 'required',
            'diskon' => 'required',
            'nilai_diskon' => 'required',
            'total_bayar' => 'required',
            'file_bukti_tf' => $request->file('file_bukti_tf') != null ? 'image|file|max:2048' : '',
            'status_reservasi_wisata' => 'required'
            ]);
            $reservasi = Reservasi::find($id);
            $reservasi->id_pelanggan = $request->id_pelanggan;
            $reservasi->id_daftar_paket = $request->id_daftar_paket;
            $reservasi->tgl_reservasi_wisata = $request->tgl_reservasi_wisata;
            $reservasi->harga = $request->harga;
            $reservasi->jumlah_peserta = $request->jumlah_peserta;
            $reservasi->diskon = $request->diskon;
            $reservasi->nilai_diskon = $request->nilai_diskon;
            $reservasi->total_bayar = $request->total_bayar;
            if($request->file('file_bukti_tf') != null){
                unlink("storage/" . $reservasi->file_bukti_tf);
                $reservasi->file_bukti_tf = $request->file('file_bukti_tf')->store('Foto Bukti Transfer');
                }
            $reservasi->save();
            $reservasi->status_reservasi_wisata = $request->status_reservasi_wisata;
            $reservasi->save();
            return redirect()->route('reservasi.index')->with('success_message', 'Berhasil mengubah data reservasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Menghapus Reservasi
        $reservasi = Reservasi::find($id);
        if($reservasi){
        $hapus = $reservasi->delete();
        if($hapus) unlink("storage/" . $reservasi->file_bukti_tf);
        } 
        return redirect()->route('reservasi.index') ->with('success_message', 'Berhasil menghapus data reservasi "' . $reservasi->id_pelanggan . '" !');
    }
}
