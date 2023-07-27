<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = Category::all();
        return view('admin.kategori.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kategori = Category::insert([
            'nama' => $request->nama,
        ]);

        return redirect('/kategori')->with('status', 'Data Kategori Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $kategori = Category::find($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $kategori = Category::find($id);
        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect('/kategori')->with('status', 'Data Kategori Berhasil Diubah');
    }

    public function destroy($id)
    {
        $kategori = Category::find($id);
        $kategori->delete();

        return redirect('/kategori')->with('status', 'Data Kategori Berhasil Dihapus');
    }

}
