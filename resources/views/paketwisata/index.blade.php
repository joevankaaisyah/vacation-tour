@extends('adminlte::page')
@section('title', 'List Paket Wisata')
@section('content_header')
 <h1 class="m-0 text-dark">List Paket Wisata</h1>
@stop
@section('content')
 <div class="row">
 <div class="col-12">
 <div class="card overflow-scroll">
 <div class="card-body pe-3">
 <a href="{{route('paketwisata.create')}}" class="btn
btn-primary mb-2">
 Tambah
 </a>
 <table class="table table-hover table-bordered
table-stripped" id="example2">
 <thead>
<tr style="background-color: #2176ff">
 <th style="color: white">No.</th>
 <th style="color: white">Id Paket Wisata</th>
 <th style="color: white">Nama Paket</th>
 <th style="color: white">Deskripsi</th>
 <th style="color: white">Fasilitas</th>
 <th style="color: white">Itinerary</th>
 <th style="color: white">Diskon</th>
 <th style="color: white">Foto 1</th>
 <th style="color: white">Foto 2</th>
 <th style="color: white">Foto 3</th>
 <th style="color: white">Foto 4</th>
 <th style="color: white">Foto 5</th>
 <th style="color: white">Opsi</th>
 </tr>
</thead>
<tbody>
@foreach($paketwisata as $key => $bs)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$bs->id}}</td>
 <td>{{$bs->nama_paket}}</td>
 <td>{{$bs->deskripsi}}</td>
 <td>{{$bs->fasilitas}}</td>
 <td>{{$bs->itinerary}}</td>
 <td>{{$bs->diskon}}</td>
 <td>
 <img src="storage/{{$bs->foto1}}" alt="{{$bs->foto1}} tidak tampil" class="img-thumbnail" style="width: 50px;">
 </td>
 <td>
 <img src="storage/{{$bs->foto2}}" alt="{{$bs->foto2}} tidak tampil" class="img-thumbnail" style="width: 50px;">
 </td>
 <td>
 <img src="storage/{{$bs->foto3}}" alt="{{$bs->foto3}} tidak tampil" class="img-thumbnail" style="width: 50px;">
 </td>
 <td>
 <img src="storage/{{$bs->foto4}}" alt="{{$bs->foto4}} tidak tampil" class="img-thumbnail" style="width: 50px;">
 </td>
 <td>
 <img src="storage/{{$bs->foto5}}" alt="{{$bs->foto5}} tidak tampil" class="img-thumbnail" style="width: 50px;">
 </td>
 <td>
 <a href="{{route('paketwisata.edit',
$bs)}}" class="btn btn-primary btn-xs">
 Edit
 </a>
<a href="{{route('paketwisata.destroy',
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