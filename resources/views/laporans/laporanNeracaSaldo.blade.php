@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mt-3">
        <div class="card-header">
            Laporan Neraca Saldo
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3 btn-sm">Cetak Laporan Neraca Saldo</a>
            <table id="laporan-neraca-saldo" class="table table-striped table-bordered table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Nama Akun</th>
                        <th scope="col" class="text-center">No. Akun</th>
                        <th scope="col" class="text-center">Debet</th>
                        <th scope="col" class="text-center">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($akuns as $akun)
                        @if ($akun->subsubkoderekenings->subkoderekenings->koderekenings->id == '1' ||
                            $akun->subsubkoderekenings->subkoderekenings->koderekenings->id == '5')
                            <tr>
                                <td>{{ $akun->nama_akun }}</td>
                                <td>{{ $akun->no_akun }}</td>
                                <td class="text-right">@currency($akun->saldo_akun)</td>
                                <td class="text-right">@currency(0)</td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $akun->nama_akun }}</td>
                                <td>{{ $akun->no_akun }}</td>
                                <td class="text-right">@currency(0)</td>
                                <td class="text-right">@currency($akun->saldo_akun)</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-center">Total</th>
                        <th class="text-right">@currency($totalDebet)</th>
                        <th class="text-right">@currency($totalKredit)</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
