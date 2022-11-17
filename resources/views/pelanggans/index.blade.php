@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mt-3">
        <div class="card-header">
            Data Pelanggan
        </div>
        <div class="card-body">
            <a href="/pelanggans/create" class="btn btn-primary mb-3 btn-sm">Buat Pelanggan Baru</a>
            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ID Pelanggan</th>
                        <th scope="col">Nama Pelanggan</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Telp</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggans as $pelanggan)
                        <tr>
                            <td class="text-right">{{ $loop->iteration }}</td>
                            <td>{{ $pelanggan->id_pelanggan }}</td>
                            <td>{{ $pelanggan->nama_pelanggan }}</td>
                            <td>{{ $pelanggan->email }}</td>
                            <td>{{ $pelanggan->notlp }}</td>
                            <td>{{ $pelanggan->catatan }}</td>
                            <td>
                                {{-- <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a> --}}
                                <a href="/pelanggans/{{ $pelanggan->id }}/edit" class="badge bg-warning"><span
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
