<?php

namespace App\Http\Controllers;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class PaketWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan Semua Data Paket Wisata
        $paketwisata = PaketWisata::all();
        return view('paketwisata.index', [
        'paketwisata' => $paketwisata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan Form Tambah User
        return view('paketwisata.create');
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
            'nama_paket' =>'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => 'required|image|file|max:2048',
            'foto2' => 'required|image|file|max:2048',
            'foto3' => 'required|image|file|max:2048',
            'foto4' => 'required|image|file|max:2048',
            'foto5' => 'required|image|file|max:2048',
            ]);
            $array = $request->only([
            'nama_paket', 'deskripsi', 'fasilitas', 'itinerary', 'diskon', 'foto1', 'foto2', 'foto3', 'foto4', 'foto5' 
            ]);
            $array['foto1'] = $request->file('foto1')->store('Foto Pelanggan');
            $array['foto2'] = $request->file('foto2')->store('Foto Pelanggan');
            $array['foto3'] = $request->file('foto3')->store('Foto Pelanggan');
            $array['foto4'] = $request->file('foto4')->store('Foto Pelanggan');
            $array['foto5'] = $request->file('foto5')->store('Foto Pelanggan');
            $tambah=PaketWisata::create($array);
            if($tambah) $request->file('foto1')->store('Foto Pelanggan');
            return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto2')->store('Foto Pelanggan');
            return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto3')->store('Foto Pelanggan');
            return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto4')->store('Foto Pelanggan');
            return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menambah data paket wisata baru');
            if($tambah) $request->file('foto5')->store('Foto Pelanggan');
            return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menambah data paket wisata baru');
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
        $paketwisata = PaketWisata::find($id);
        if (!$paketwisata)
            return redirect()->route('paketwisata.index')->with('error_message', 'Paket Wisata dengan id' . $id . ' tidak ditemukan');
            return view('paketwisata.edit', [
            'paketwisata' => $paketwisata
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
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
            'foto1' => $request->file('foto1') != null ? 'image|file|max:2048' : '',
            'foto2' => $request->file('foto2') != null ? 'image|file|max:2048' : '',
            'foto3' => $request->file('foto3') != null ? 'image|file|max:2048' : '',
            'foto4' => $request->file('foto4') != null ? 'image|file|max:2048' : '',
            'foto5' => $request->file('foto5') != null ? 'image|file|max:2048' : ''
        ]);
        $paketwisata = PaketWisata::find($id);
        $paketwisata->nama_paket = $request->nama_paket;
        $paketwisata->deskripsi = $request->deskripsi;
        $paketwisata->fasilitas = $request->fasilitas;
        $paketwisata->itinerary = $request->itinerary;
        $paketwisata->diskon = $request->diskon;
        if($request->file('foto1') != null){
            unlink("storage/" . $paketwisata->foto);
            $paketwisata->foto = $request->file('foto1')->store('Foto Pelanggan');
            }
        $paketwisata->save();
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto2') != null){
            unlink("storage/" . $paketwisata->foto);
            $paketwisata->foto = $request->file('foto2')->store('Foto Pelanggan');
            }
        $paketwisata->save();
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto3') != null){
            unlink("storage/" . $paketwisata->foto);
            $paketwisata->foto = $request->file('foto3')->store('Foto Pelanggan');
            }
        $paketwisata->save();
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto4') != null){
            unlink("storage/" . $paketwisata->foto);
            $paketwisata->foto = $request->file('foto4')->store('Foto Pelanggan');
            }
        $paketwisata->save();
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');

        if($request->file('foto5') != null){
            unlink("storage/" . $paketwisata->foto);
            $paketwisata->foto = $request->file('foto5')->store('Foto Pelanggan');
            }
        $paketwisata->save();
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil mengubah Paket Wisata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //Menghapus Paket Wisata
        $paketwisata = PaketWisata::find($id);
        if ($paketwisata) {
            $hapus = $paketwisata->delete();
            if ($hapus)
                unlink("storage/" . $paketwisata->foto1);
        }
        return redirect()->route('paketwisata.index')->with('success_message', 'Berhasil menghapus Paket Wisata');
    }
}
