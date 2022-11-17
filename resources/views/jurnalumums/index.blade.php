@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mt-3">
        <div class="card-header">
            Data Jurnal Umum
        </div>
        <div class="card-body">
            <a href="/jurnalumums/create" class="btn btn-primary mb-3 btn-sm">Buat Jurnal Baru</a>
            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tanggal Jurnal</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Jenis Aktivitas</th>
                        <th scope="col">Total</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jurnalumums as $jurnalumum)
                        <tr>
                            <td class="text-right">{{ $loop->iteration }}</td>
                            <td>{{ showDateTime($jurnalumum->tanggal_jurnal, 'd F Y') }}</td>
                            <td>{{ $jurnalumum->keterangan_jurnal }}</td>
                            <td>{{ $jurnalumum->jenis_aktivitas }}</td>
                            <td class="text-right">@currency($jurnalumum->total_jurnal)</td>
                            <td>
                                <a href="/jurnalumums/{{ $jurnalumum->id }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a>
                                <a href="/jurnalumums/{{ $jurnalumum->id }}/edit" class="badge bg-warning"><span
                                        data-feather="edit"></span></a>
                                {{-- <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                            data-feather="x-circle"></span></button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            // datatable
            $('#example').DataTable();
        });
    </script>
@endsection
