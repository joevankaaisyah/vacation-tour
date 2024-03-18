@extends('adminlte::page')
@section('title', 'List Pelanggan')
@section('content_header')
 <h1 class="m-0 text-dark">List Data Pelanggan</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card overflow-scroll">
 <div class="card-body">
 <a href="{{route('pelanggan.create')}}" class="btn
btn-primary mb-2">
 Tambah
 </a>
 <table class="table table-hover table-bordered
table-stripped" id="example2">
 <thead>
<tr style="background-color: #2176ff">
 <th style="color: white">No.</th>
 <th style="color: white">Id Pelanggan</th>
 <th style="color: white">Nama Lengkap</th>
 <th style="color: white">No Handphone</th>
 <th style="color: white">Alamat</th>
 <th style="color: white">Foto</th>
 <th style="color: white">Id User</th>
 <th style="color: white">Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($pelanggan as $key => $bs)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$bs->id}}</td>
 <td>{{$bs->nama_lengkap}}</td>
 <td>{{$bs->no_hp}}</td>
 <td>{{$bs->alamat}}</td>
 <td>
 <img src="storage/{{$bs->foto}}" alt="{{$bs->foto}} tidak tampil" class="img-thumbnail" style="width: 50px;">
 </td>
 <td id={{$key+1}}>{{$bs->fpelanggan->email}}</td>
 <td>
 <a href="{{route('pelanggan.edit',
$bs)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a href="{{route('pelanggan.destroy',
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