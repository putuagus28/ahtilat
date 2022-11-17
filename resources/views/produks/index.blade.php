@extends('layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mt-3">
        <div class="card-header">
            Data Produk
        </div>
        <div class="card-body">
            <a href="/produks/create" class="btn btn-primary mb-3 btn-sm">Buat Produk Baru</a>
            <table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <td class="text-right">{{ $loop->iteration }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>{{ $produk->kategoris->nama_kategori }}</td>
                            <td>{{ $produk->satuan }}</td>
                            <td class="text-right">@currency($produk->harga)</td>
                            <td>{{ $produk->deskripsi }}</td>
                            <td>
                                {{-- <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"><span
                                        data-feather="eye"></span></a> --}}
                                <a href="/produks/{{ $produk->id }}/edit" class="badge bg-warning"><span
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
