<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPaket extends Model
{
    use HasFactory;
    public $table = "daftar_paket";

    protected $fillable = [
        'nama_paket', 'id_paket_wisata', 'jumlah_peserta', 'harga_paket'
    ];

    public function fdaftarpaket(){
        return $this->belongsTo(PaketWisata::class, 'id_paket_wisata', 'id');
        }
}
