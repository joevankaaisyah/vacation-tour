<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Reservasi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>LAPORAN DATA RESERVASI VACATION TOUR</h4>
        <h6><a target="_blank" href="#">www.vacation_tour.com</a></h5>
	</center>
	<table class='table table-bordered'>
		<thead>
    <tr style="background-color: #1b9aaa">
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
    </tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $key => $bs)
			<tr>
				<td>{{ $i++ }}</td>
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
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>