@extends('adminlte::page')
@section('title', 'Edit Data Karyawan')
@section('content_header')
 <h1 class="m-0 text-dark">Edit Data Karyawan</h1>
@stop
@section('content')
 <form action="{{route('karyawan.update', $karyawan)}}"
method="post">
 @method('PUT')
 @csrf
 <div class="row">
 <div class="col-12">
 <div class="card">
 <div class="card-body">

 <div class="form-group">
 <label for="nama_karyawan">Nama Karyawan</label>
 <input type="text" class="form-control
@error('nama_karyawan') is-invalid @enderror" id="nama_karyawan"
placeholder="Masukan Nama Karyawan" name="nama_karyawan" value="{{$karyawan->nama_karyawan ?? old('nama_karyawan')}}">
 @error('nama_karyawan') <span class="textdanger">{{$message}}</span> @enderror
 </div>

 <div class="form-group">
 <label for="alamat">Alamat</label>
 <input type="text" class="form-control
@error('alamat') is-invalid @enderror" id="alamat"
placeholder="Masukan Alamat Lengkap" name="alamat"
value="{{$karyawan->alamat ?? old('alamat')}}">
 @error('alamat') <span class="textdanger">{{$message}}</span> @enderror
 </div>

 <div class="form-group">
 <label for="no_hp">No Handphone</label>
 <input type="text" class="form-control
@error('no_hp') is-invalid @enderror" id="no_hp"
placeholder="Masukan Nomor Handphone" name="no_hp"
value="{{$karyawan->no_hp ?? old('no_hp')}}">
 @error('no_hp') <span class="textdanger">{{$message}}</span> @enderror
 </div>

 <div class="form-group">
 <label for="jabatan">Jabatan</label>
 <select class="form-control @error('jabatan') isinvalid @enderror" id="jabatan" name="jabatan">
 <option value="administrasi" @if($karyawan->jabatan == 'admin' || old('jabatan') == 'admin')selected @endif>Administrasi</option>
 <option value="operator" @if($karyawan->jabatan == 'operator' || old('jabatan') == 'operator')selected @endif>Operator</option>
 <option value="pemilik" @if($karyawan->jabatan == 'pemilik' || old('jabatan') == 'pemilik')selected @endif>Pemilik</option>
 </select>
@error('jabatan') <span class="textdanger">{{$message}}</span> @enderror
 </div>

 <div class="form-group">
 <label for="email">Id User</label>
 <div class="input-group">
 <input type="hidden" name="id_user"
id="id_user" value="{{$karyawan->fbidstudi->id ??
old('id_users')}}">
 <input type="text" class="form-control
@error('email') is-invalid @enderror" placeholder="ID User"
id="email" name="email" value="{{$karyawan->fbidstudi->id ??
old('email')}}" arialabel="Bidang Studi" aria-describedby="cari" readonly>
 <button class="btn btn-warning" type="button"
data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop"></i>
Cari Data ID User</button>
 </div>
 </div>
 </div>

 <div class="card-footer">
 <button type="submit" class="btn btn-primary">Simpan</button>
 <a href="{{route('karyawan.index')}}" class="btn
btn-default">
 Batal
 </a>
 </div>
 </div>
 </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" arialabelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
 <div class="modal-content">
 <div class="modal-header">
 <h1 class="modal-title fs-5"
id="staticBackdropLabel">Pencarian Data ID User</h1>
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 </div>

 <div class="modal-body">
 <table class="table table-hover table-bordered table-stripped" id="example2">
  <thead>
 <tr style="background-color: #2176ff">
 <th style="color: white">No.</th>
 <th style="color: white">Nama</th>
 <th style="color: white">Email</th>
 <th style="color: white">Opsi</th>
 </tr>
 </thead>
 <tbody>
 @foreach($users as $key => $bs)
 <tr>
 <td>{{$key+1}}</td>
 <td>{{$bs->name}}</td>
 <td id={{$key+1}}>{{$bs->email}}</td>
<td>
<button type="button" class="btn btn-primary btn-xs" onclick="pilih('{{$bs->id}}', '{{$bs->email}}')" data-bs-dismiss="modal"> Pilih </button>
 </td>
 </tr>
 @endforeach
 </tbody>
 </table>
 </div>
 </div>
 </div>
 </div>
<!-- End Modal -->

@stop
@push('js')
 <script>
 $('#example2').DataTable({
 "responsive": true,
 });
 //Fungsi pilih untuk memilih data bidang studi dan mengirimkan data Bidang Studi dari Modal ke form tambah
 function pilih(id, bstud){
 document.getElementById('id_user').value = id
 document.getElementById('email').value = bstud
 }
 </script>
@endpush