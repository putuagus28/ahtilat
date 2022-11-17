@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Pelanggan Baru</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/pelanggans" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
                <input type="text" class="form-control @error('id_pelanggan') is-invalid @enderror" id="id_pelanggan"
                    name="id_pelanggan" value="{{ old('id_pelanggan') }}">
                @error('id_pelanggan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control @error('nama_pelanggan') is-invalid @enderror" id="nama_pelanggan"
                    name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
                @error('nama_pelanggan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email">Email address</label>
                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                    name="email" id="email" placeholder="name@example.com">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="notlp" class="form-label">No Telp</label>
                <input type="text" class="form-control @error('notlp') is-invalid @enderror" id="notlp"
                    name="notlp" value="{{ old('notlp') }}">
                @error('notlp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan"
                    name="catatan" value="{{ old('catatan') }}">
                @error('catatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
