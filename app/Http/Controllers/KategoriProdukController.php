<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Requests\StoreKategoriProdukRequest;
use App\Http\Requests\UpdateKategoriProdukRequest;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategoriproduks.index', [
            "title" => "Data Kategori Produk",
            "kategoriProduks" => KategoriProduk::all()->sortBy('nama_kategori'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoriproduks/create', [
            "title" => "Data Kategori Produk",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKategoriProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|max:255|unique:kategori_produks',
        ]);

        KategoriProduk::create($validatedData);

        return redirect('/kategoriproduks')->with('success', 'Kategori Produk baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriProduk $kategoriProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriProduk $kategoriProduk, $id)
    {
        return view('kategoriproduks.edit', [
            'title' => "Data Kategori Produk",
            'kategoriProduk' => KategoriProduk::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKategoriProdukRequest  $request
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriProduk $kategoriProduk, $id)
    {
        $rules = [
            'nama_kategori' => "required|max:255|unique:kategori_produks,nama_kategori,$id",
        ];

        $validatedData = $request->validate($rules);

        KategoriProduk::where('id', $id)->update($validatedData);

        return redirect('/kategoriproduks')->with('success', 'Kategori Produk berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriProduk  $kategoriProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriProduk $kategoriProduk)
    {
        //
    }
}
