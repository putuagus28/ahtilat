@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Kategori Produk</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/kategoriproduks/{{ $kategoriProduk->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori Produk</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori"
                    name="nama_kategori" value="{{ old('nama_kategori', $kategoriProduk->nama_kategori) }}">
                @error('nama_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
