@extends('adminlte::page')
@section('title', 'List Daftar Reservasi')
@section('content_header')
 <h1 class="m-0 text-dark">List Daftar Reservasi</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card overflow-scroll">
 <div class="card-body">
 <a href="{{route('reservasi.create')}}" class="btn btn-primary mb-2">
 Tambah
 </a>
 <a href="/exportpdf" class="btn btn-info mb-2">
Export PDF
</a>
 <table class="table table-hover table-bordered
table-stripped" id="example2">
 <thead>
<tr style="background-color: #2176ff">
 <th style="color: white">No.</th>
 <th style="color: white">ID Pelanggan</th>
 <th style="color: white">ID Daftar Paket</th>
 <th style="color: white">Tanggal Reservasi Wisata</th>
 <th style="color: white">Harga</th>
 <th style="color: white">Jumlah Peserta</th>
 <th style="color: white">Diskon</th>
 <th style="color: white">Nilai Diskon</th>
 <th style="color: white">Total Bayar</th>
 <th style="color: white">File Bukti Transfer</th>
 <th style="color: white">Status Reservasi Wisata</th>
 <th style="color: white">Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($reservasi as $key => $bs)
 <tr>
 <td>{{$key+1}}</td>
 <td id={{$key+1}}>{{$bs->fbpelanggan->nama_lengkap}}</td>
 <td id={{$key+1}}>{{$bs->fbdaftarpaket->nama_paket}}</td>
 <td>{{$bs->tgl_reservasi_wisata}}</td>
 <td>{{$bs->harga}}</td>
 <td>{{$bs->jumlah_peserta}}</td>
 <td>{{$bs->diskon}}</td>
 <td>{{$bs->nilai_diskon}}</td>
 <td>{{$bs->total_bayar}}</td>
 <td>
 <img src="storage/{{$bs->file_bukti_tf}}" alt="{{$bs->file_bukti_tf}} tidak tampil" class="img-thumbnail" style="width: 50px;">
 </td>
 <td>{{$bs->status_reservasi_wisata}}</td>
 <td>
 <a href="{{route('reservasi.edit',
$bs)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a href="{{route('reservasi.destroy',
$bs)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
 Delete
 </a>
 </td>
 </tr>
 @endforeach
</tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
@stop
@push('js')
 <form action="" id="delete-form" method="post">
 @method('delete')
 @csrf
 </form>

 <script>
 $('#example2').DataTable({
 "responsive": true,
 });
 function notificationBeforeDelete(event, el) {
 event.preventDefault();
 if (confirm('Apakah anda yakin akan menghapus data ? ')) {
 $("#delete-form").attr('action', $(el).attr('href'));
 $("#delete-form").submit();
 }
 }
 </script>
@endpush