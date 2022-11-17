@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mt-3">
        <div class="card-header">
            Laporan Jurnal Umum
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3 btn-sm">Cetak Laporan Jurnal Umum</a>
            <table id="laporan-neraca-saldo" class="table table-striped table-bordered table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Tanggal</th>
                        <th scope="col" class="text-center">Keterangan</th>
                        <th scope="col" class="text-center">Ref</th>
                        <th scope="col" class="text-center">Debet</th>
                        <th scope="col" class="text-center">Kredit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurnalumums as $jurnalumum)
                        <tr>
                            <td>{{ showDateTime($jurnalumum->tanggal_jurnal, 'd F Y') }}</td>
                            <td>
                                @foreach ($jurnalumum->akunjurnalumums as $jurnalakun)
                                    <div class="row">
                                        @if ($jurnalakun->posisi_akun == 'Debet')
                                            <div class="col-6">{{ $jurnalakun->akuns->nama_akun }}</div>
                                            <div class="col-6"></div>
                                        @else
                                            <div class="col-6"></div>
                                            <div class="col-6">{{ $jurnalakun->akuns->nama_akun }}</div>
                                        @endif
                                    </div>
                                @endforeach
                            </td>
                            <td class="text-center">
                                @foreach ($jurnalumum->akunjurnalumums as $jurnalakun)
                                    <div class="row">
                                        <div class="col">{{ $jurnalakun->akuns->no_akun }}</div>
                                    </div>
                                @endforeach
                            </td>
                            <td class="text-right">
                                @foreach ($jurnalumum->akunjurnalumums as $jurnalakun)
                                    <div class="row">
                                        @if ($jurnalakun->posisi_akun == 'Debet')
                                            <div class="col">@currency($jurnalakun->nominal_jurnal)</div>
                                        @else
                                            <div class="col">@currency(0)</div>
                                        @endif
                                    </div>
                                @endforeach
                            </td>
                            <td class="text-right">
                                @foreach ($jurnalumum->akunjurnalumums as $jurnalakun)
                                    <div class="row">
                                        @if ($jurnalakun->posisi_akun == 'Kredit')
                                            <div class="col">@currency($jurnalakun->nominal_jurnal)</div>
                                        @else
                                            <div class="col">@currency(0)</div>
                                        @endif
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th colspan="3" class="text-center">Total</th>
                    <th class="text-right">@currency($totalDebet)</th>
                    <th class="text-right">@currency($totalKredit)</th>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
