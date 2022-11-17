@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat User Baru</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/users" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" value="{{ old('username') }}">
                @error('username')
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
                <label for="level" class="form-label">Hak Akses</label>
                <select class="form-select" name="level">
                    <option value="1" @if (old('level') == '1') selected @endif>Pimpinan</option>
                    <option value="2" @if (old('level') == '2') selected @endif>Akunting</option>
                    <option value="3" @if (old('level') == '3') selected @endif>Project Manager</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
