@extends('adminlte::page')
@section('title', 'List Karyawan')
@section('content_header')
 <h1 class="m-0 text-dark">List Karyawan</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card overflow-scroll">
 <div class="card-body">
 <a href="{{route('karyawan.create')}}" class="btn
btn-primary mb-2">
 Tambah
 </a>
 <table class="table table-hover table-bordered
table-stripped" id="example2">
 <thead>
<tr style="background-color: #2176ff">
 <th style="color: white">No.</th>
 <th style="color: white">Id Karyawan</th>
 <th style="color: white">Nama Karyawan</th>
 <th style="color: white">Alamat</th>
 <th style="color: white">No Handphone</th>
 <th style="color: white">Jabatan</th>
 <th style="color: white">Id User</th>
 <th style="color: white">Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($karyawan as $key => $bs)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$bs->id}}</td>
 <td>{{$bs->nama_karyawan}}</td>
 <td>{{$bs->alamat}}</td>
 <td>{{$bs->no_hp}}</td>
 <td>{{$bs->jabatan}}</td>
 <td id={{$key+1}}>{{$bs->fbidstudi->email}}</td>
 <td>
 <a href="{{route('karyawan.edit',
$bs)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a href="{{route('karyawan.destroy',
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