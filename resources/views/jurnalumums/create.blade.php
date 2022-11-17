@extends('layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Buat Jurnal Baru</h1>
    </div>
    <div class="col-lg">
        <form method="POST" action="/jurnalumums" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="row border-bottom mb-3">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tanggal_jurnal" class="form-label">Tanggal Jurnal</label>
                        <input type="date" class="form-control @error('tanggal_jurnal') is-invalid @enderror"
                            id="tanggal_jurnal" name="tanggal_jurnal" value="{{ old('tanggal_jurnal') }}">
                        @error('tanggal_jurnal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="keterangan_jurnal" class="form-label">Keterangan</label>
                        <input type="text" class="form-control @error('keterangan_jurnal') is-invalid @enderror"
                            id="keterangan_jurnal" name="keterangan_jurnal" value="{{ old('keterangan_jurnal') }}">
                        @error('keterangan_jurnal')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="jenis_aktivitas" class="form-label">Jenis Aktivitas</label>
                        <select class="form-select" name="jenis_aktivitas">
                            <option value="Operasi" @if (old('jenis_aktivitas') == 'Operasi') selected @endif>Operasi</option>
                            <option value="Investasi" @if (old('jenis_aktivitas') == 'Investasi') selected @endif>Investasi</option>
                            <option value="Pendanaan" @if (old('jenis_aktivitas') == 'Pendanaan') selected @endif>Pendanaan</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="h4">Akun Debet</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" id="addDebetButton" class="btn btn-primary btn-sm"><span
                                    data-feather="plus" class="align-text-bottom"></span></button>
                        </div>
                    </div>
                    <div class="row after-debet">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="id_akun_debet" class="form-label">Akun Debet</label>
                                <select class="form-select" name="id_akun_debet[]">
                                    @foreach ($akuns as $akun)
                                        <option value="{{ $akun->id }}"
                                            @if (old('id_akun') == $akun->id) selected @endif>
                                            {{ $akun->nama_akun }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="nominal_jurnal_debet" class="form-label">Nominal</label>
                                <input type="text"
                                    class="form-control @error('nominal_jurnal_debet') is-invalid @enderror"
                                    id="nominal_jurnal_debet" name="nominal_jurnal_debet[]"
                                    value="{{ old('nominal_jurnal_debet') }}">
                                @error('nominal_jurnal_debet')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="copy_debet" id="copy_debet">
                        <div class="row control-group">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="id_akun_debet" class="form-label">Akun Debet</label>
                                    <select class="form-select" name="id_akun_debet[]">
                                        @foreach ($akuns as $akun)
                                            <option value="{{ $akun->id }}"
                                                @if (old('id_akun') == $akun->id) selected @endif>
                                                {{ $akun->nama_akun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="nominal_jurnal_debet" class="form-label">Nominal</label>
                                    <input type="text"
                                        class="form-control @error('nominal_jurnal_debet') is-invalid @enderror"
                                        id="nominal_jurnal_debet" name="nominal_jurnal_debet[]"
                                        value="{{ old('nominal_jurnal_debet') }}">
                                    @error('nominal_jurnal_debet')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="" style="color: white">/</label>
                                <br>
                                <button type="button" id="removeDebetButton" class="btn btn-outline-primary"><span
                                        data-feather="minus" class="align-text-bottom"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="h4">Akun Kredit</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" id="addKreditButton" class="btn btn-primary btn-sm"><span
                                    data-feather="plus" class="align-text-bottom"></span></button>
                        </div>
                    </div>
                    <div class="row after-kredit">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="id_akun_kredit" class="form-label">Akun Kredit</label>
                                <select class="form-select" name="id_akun_kredit[]">
                                    @foreach ($akuns as $akun)
                                        <option value="{{ $akun->id }}"
                                            @if (old('id_akun') == $akun->id) selected @endif>
                                            {{ $akun->nama_akun }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="nominal_jurnal_kredit" class="form-label">Nominal</label>
                                <input type="text"
                                    class="form-control @error('nominal_jurnal_kredit') is-invalid @enderror"
                                    id="nominal_jurnal_kredit" name="nominal_jurnal_kredit[]"
                                    value="{{ old('nominal_jurnal_kredit') }}">
                                @error('nominal_jurnal_kredit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="copy_kredit" id="copy_kredit">
                        <div class="row control-group">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="id_akun_kredit" class="form-label">Akun Kredit</label>
                                    <select class="form-select" name="id_akun_kredit[]">
                                        @foreach ($akuns as $akun)
                                            <option value="{{ $akun->id }}"
                                                @if (old('id_akun') == $akun->id) selected @endif>
                                                {{ $akun->nama_akun }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="nominal_jurnal_kredit" class="form-label">Nominal</label>
                                    <input type="text"
                                        class="form-control @error('nominal_jurnal_kredit') is-invalid @enderror"
                                        id="nominal_jurnal_kredit" name="nominal_jurnal_kredit[]"
                                        value="{{ old('nominal_jurnal_kredit') }}">
                                    @error('nominal_jurnal_kredit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="" style="color: white">/</label>
                                <br>
                                <button type="button" id="removeKreditButton" class="btn btn-outline-primary"><span
                                        data-feather="minus" class="align-text-bottom"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById("copy_debet").style.display = 'none';
            document.getElementById("copy_kredit").style.display = 'none';

            $("#addDebetButton").click(function() {
                var html = $(".copy_debet").html();
                $(".after-debet").after(html);
            });

            $("body").on("click", "#removeDebetButton", function() {
                $(this).parents(".control-group").remove();
            });

            $("#addKreditButton").click(function() {
                var html = $(".copy_kredit").html();
                $(".after-kredit").after(html);
            });

            $("body").on("click", "#removeKreditButton", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endsection
