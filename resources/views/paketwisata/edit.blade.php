@extends('adminlte::page')
@section('title', 'Edit Paket Wisata')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Paket Wisata</h1>
@stop
@section('content')
<form action="{{route('paketwisata.update', $paketwisata)}}" method="post" enctype="multipart/form-data">
    @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama_paket">Nama Paket</label>
                            <input type="text" class="form-control
@error('nama_paket') is-invalid @enderror"
                                id="nama_paket" placeholder="Masukkan Nama Paket" name="nama_paket" value="{{$paketwisata->nama_paket ?? old('nama_paket') }}">
                            @error('nama_paket')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control
    @error('deskripsi') is-invalid @enderror" id="deskripsi" placeholder="Masukkan Fasilitas" name="deskripsi"
                                value="{{$paketwisata->deskripsi ?? old('deskripsi') }}">
                            @error('deskripsi')
                            <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fasilitas">Fasilitas</label>
                            <input type="text" class="form-control
@error('fasilitas') is-invalid @enderror" id="fasilitas"
                                placeholder="Masukkan Fasilitas" name="fasilitas" value="{{$paketwisata->fasilitas ?? old('fasilitas') }}">
                            @error('fasilitas')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="itinerary">Itinerary</label>
                            <input type="text" class="form-control
    @error('itinerary') is-invalid @enderror" id="itinerary" placeholder="Masukkan Fasilitas" name="itinerary"
                                value="{{$paketwisata->itinerary ?? old('itinerary') }}">
                            @error('itinerary')
                            <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="diskon">Diskon</label>
                            <input type="number" class="form-control
@error('diskon') is-invalid @enderror" id="diskon"
                                placeholder="Masukkan Diskon" name="diskon" value="{{$paketwisata->diskon ?? old('diskon') }}">
                            @error('diskon')
                                <span class="textdanger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto1" class="form-label">Foto 1</label>
                            @if($paketwisata->foto1)
                            <img src="{{ asset('storage/'. $paketwisata->foto1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @endif
                            <input class="form-control @error('foto1') is-invalid @enderror" type="file"  id="foto1" name="foto1" value="{{$paketwisata->foto1 ?? old('foto1')}}" onchange="previewImage()">
                            @error('foto1') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto2" class="form-label">Foto 2</label>
                            @if($paketwisata->foto2)
                            <img src="{{ asset('storage/'. $paketwisata->foto2) }}" class="img-preview2 img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @else
                            <img class="img-preview2 img-fluid mb-3 col-sm-5 d-block">
                            @endif
                            <input class="form-control @error('foto2') is-invalid @enderror" type="file"  id="foto2" name="foto2" value="{{$paketwisata->foto2 ?? old('foto2')}}" onchange="previewImage2()">
                            @error('foto2') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto3" class="form-label">Foto 3</label>
                            @if($paketwisata->foto3)
                            <img src="{{ asset('storage/'. $paketwisata->foto3) }}" class="img-preview3 img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @else
                            <img class="img-preview3 img-fluid mb-3 col-sm-5 d-block">
                            @endif
                            <input class="form-control @error('foto3') is-invalid @enderror" type="file"  id="foto3" name="foto3" value="{{$paketwisata->foto3 ?? old('foto3')}}" onchange="previewImage3()">
                            @error('foto3') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto4" class="form-label">Foto 4</label>
                            @if($paketwisata->foto4)
                            <img src="{{ asset('storage/'. $paketwisata->foto4) }}" class="img-preview4 img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @else
                            <img class="img-preview4 img-fluid mb-3 col-sm-5 d-block">
                            @endif
                            <input class="form-control @error('foto4') is-invalid @enderror" type="file"  id="foto4" name="foto4" value="{{$paketwisata->foto4 ?? old('foto4')}}" onchange="previewImage4()">
                            @error('foto4') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group">
                            <label for="foto5" class="form-label">Foto 5</label>
                            @if($paketwisata->foto5)
                            <img src="{{ asset('storage/'. $paketwisata->foto5) }}" class="img-preview5 img-fluid mb-3 col-sm-5 d-block" style="width: 100px;">
                            @else
                            <img class="img-preview5 img-fluid mb-3 col-sm-5 d-block">
                            @endif
                            <input class="form-control @error('foto5') is-invalid @enderror" type="file"  id="foto5" name="foto5" value="{{$paketwisata->foto5 ?? old('foto5')}}" onchange="previewImage5()">
                            @error('foto5') <span class="textdanger">{{$message}}</span> @enderror
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('paketwisata.index') }}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @stop
    @push('js')
        <script>
            function previewImage() {
    const foto = document.querySelector('#foto1');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(foto.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
function previewImage2() {
    const foto = document.querySelector('#foto2');
    const imgPreview = document.querySelector('.img-preview2');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(foto.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
function previewImage3() {
    const foto = document.querySelector('#foto3');
    const imgPreview = document.querySelector('.img-preview3');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(foto.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
function previewImage4() {
    const foto = document.querySelector('#foto4');
    const imgPreview = document.querySelector('.img-preview4');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(foto.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
function previewImage5() {
    const foto = document.querySelector('#foto5');
    const imgPreview = document.querySelector('.img-preview5');

    imgPreview.style.display = 'block';

    const ofReader = new FileReader();
    ofReader.readAsDataURL(foto.files[0]);

    ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    }
}
        </script>
    @endpush