@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Akun</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="/akuns/{{ $akun->id }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nama_akun" class="form-label">Nama Akun</label>
                <input type="text" class="form-control @error('nama_akun') is-invalid @enderror" id="nama_akun"
                    name="nama_akun" value="{{ old('nama_akun', $akun->nama_akun) }}">
                @error('nama_akun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_akun" class="form-label">No Akun</label>
                <input type="text" class="form-control @error('no_akun') is-invalid @enderror" id="no_akun"
                    name="no_akun" value="{{ old('no_akun', $akun->no_akun) }}">
                @error('no_akun')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="sub_sub_kode_rekening_id" class="form-label">Jenis Akun</label>
                <select class="form-select" name="sub_sub_kode_rekening_id">
                    @foreach ($subsubkoderekenings as $subsubkoderekening)
                        <option value="{{ $subsubkoderekening->id }}" @if ($akun->sub_sub_kode_rekening_id == $subsubkoderekening->id) selected @endif>
                            {{ $subsubkoderekening->nama_akun }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
