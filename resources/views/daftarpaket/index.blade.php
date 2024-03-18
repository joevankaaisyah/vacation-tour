@extends('adminlte::page')
@section('title', 'List Daftar Paket')
@section('content_header')
 <h1 class="m-0 text-dark">List Daftar Paket</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card overflow-scroll">
 <div class="card-body">
 <a href="{{route('daftarpaket.create')}}" class="btn btn-primary mb-2">
 Tambah
 </a>
 <table class="table table-hover table-bordered
table-stripped" id="example2">
 <thead>
<tr style="background-color: #2176ff">
 <th style="color: white">No.</th>
 <th style="color: white">Id Daftar Paket</th>
 <th style="color: white">Nama Paket</th>
 <th style="color: white">Id Paket Wisata</th>
 <th style="color: white">Jumlah Peserta</th>
 <th style="color: white">Harga Paket</th>
 <th style="color: white">Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($daftarpaket as $key => $bs)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$bs->id}}</td>
 <td>{{$bs->nama_paket}}</td>
 <td id={{$key+1}}>{{$bs->fdaftarpaket->diskon}}</td>
 <td>{{$bs->jumlah_peserta}}</td>
 <td>{{$bs->harga_paket}}</td>
 <td>
 <a href="{{route('daftarpaket.edit',
$bs)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a href="{{route('daftarpaket.destroy',
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