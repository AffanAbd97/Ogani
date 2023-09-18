<?php

namespace App\Http\Controllers;

use File;
use App\Models\Product;
use App\Models\Category;
use App\Charts\ProductChart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{ function randomColour() {
   
    $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
    return $color;
}
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $produk =Product::paginate(5);

    $kategori =Category::all();
    $arr = array();
    $arrclr = collect([]);
    $data = collect([]);

    for ($i=0; $i <$kategori->count(); $i++) { 
    array_push($arr,$kategori[$i]->nama);
    $randomColor =  DashboardController::randomColour();
    $kategoriId =Category::where('nama',$kategori[$i]->nama) -> first()->id;
    $data->push(Product::where('kategori_id', $kategoriId)->count());
    $arrclr->push($randomColor);
    
    }
    $chart = new ProductChart;
    $chart->labels($arr);
    $dataset = $chart->dataset('My dataset', 'doughnut', $data);
    $chart->displayAxes(false, false);
    $dataset->backgroundColor($arrclr);
    $dataset->color($arrclr);
  
    return view('admin.index', compact('produk','chart'));
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    $produk =Product::all();
    $kategori =Category::all();
    return view('admin.create', compact('produk', 'kategori'));
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required|mimes:png,jpeg,jpg|max:2048',
        'harga' => 'required',
        'stok' => 'required',
        'kategori_id' => 'required',
    ]);

    $NamaGambar = time() . '.' . $request->gambar->extension();

    $request->gambar->move(public_path('image'), $NamaGambar);

    $produk = new Product;

    $produk->nama = $request->nama;
    $produk->deskripsi = $request->deskripsi;
    $produk->gambar = $NamaGambar;
    $produk->harga = $request->harga;
    $produk->stok = $request->stok;
    $produk->kategori_id = $request->kategori_id;
    $produk->save();



    return redirect('/dashboard')->withSuccess('Product Baru Ditambahkan!');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $produk =Product::find($id);
    return view('admin.detail', compact('produk'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $produk =Product::find($id);
   
    $kategori =Category::all();
    return view('admin.update', compact('produk', 'kategori'));
   
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'mimes:png,jpeg,jpg|max:2048',
        'harga' => 'required',
        'stok' => 'required',
        'kategori_id' => 'required',
    ]);

    $produk =Product::find($id);
    if ($request->has('gambar')) {
        $path = "image/";
        File::delete($path . $produk->gambar);

        $NamaGambar = time() . '.' . $request->gambar->extension();

        $request->gambar->move(public_path('image'), $NamaGambar);

        $produk->gambar = $NamaGambar;

        $produk->save();
    }

    
    $produk->nama = $request->nama;
    $produk->deskripsi = $request->deskripsi;
 
    $produk->harga = $request->harga;
    $produk->stok = $request->stok;
    $produk->kategori_id = $request->kategori_id;
    $produk->save();
   
    return redirect('/dashboard')->withSuccess('Product Berhasil Di ubah!');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $produk =Product::find($id);

    $path = "image/";
    File::delete($path . $produk->gambar);

    $produk->delete();

    return redirect('/dashboard')->withWarning('Product Dihapus!');
}
}
