<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\CartDetail;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $user = Auth::id();
        $usercart = Cart::where('user_id', $user)->first();
        if($usercart){
            $cartid =$usercart ->id;
            $counts = CartDetail::where('cart_id', $cartid)->count();
            $carts = CartDetail::where('cart_id', $cartid)->get();
            $total = $usercart ->total;
        }else{
            $counts = 0;
            $total = 0;
            $carts =[];
        }
    
        $products = Product::all();
     
        
        return view('cart.index', compact('counts', 'products', 'carts', 'total'));
    }

    public function create()
    {
        $counts = Cart::count();
        $products = Product::all();
        $carts = Cart::all();
        $total = Cart::sum('total');

        return view('cart.add', compact('counts', 'products', 'carts', 'total'));
    }

    public function store(Request $request)
    {
        $cart = Cart::insert([
            'jml' => request('jml'),
            'harga' => 20000,
            'produk_id' => request('produk_id')
        ]);
        return redirect('/cart');
    }

    public function save($id)
    {
        $total = 0;
        $user = Auth::id();
        $usercart = Cart::where('user_id', $user)->first();
        $harga = Product::find($id)->harga;
        $produk = Product::find($id)->nama;
        if($usercart){
            $cart = Cart::updateOrCreate(
                ['user_id' => $user],
                ['total' => $usercart->total + $harga]
            );
            $cartitem = CartDetail::where('cart_id' , $cart->id)->where('produk_id',$id)->first();
            if( $cartitem ){

                $cartdetail = CartDetail::updateOrCreate(['cart_id' => $cart->id,'produk_id' => $id],[
                    
                    'jml' => $cartitem ->jml+1,
                    
                    
                ]);
                
            }else{
                $cartdetail = CartDetail::updateOrCreate(
                    ['cart_id' => $cart->id,'produk_id' => $id],[
                    'cart_id' => $cart->id,
                    'jml' => 1,
                    'harga' => $harga,
                    'produk_id' => $id,
                    
                ]); 
            }
        }else{
            $cart = Cart::updateOrCreate(
                ['user_id' => $user],
                ['total' => $total + $harga]
            );
            $cartdetail = CartDetail::updateOrCreate(
                ['cart_id' => $cart->id,'produk_id' => $id],[
                'cart_id' => $cart->id,
                'jml' => 1,
                'harga' => $harga,
                'produk_id' => $id,
                
            ]);
            
        }
    //     $total += $harga ;
    // }
        
       
        
        return back()->withSuccess($produk . ' berhasil ditambahkan ke cart!');;
    }

    public function edit($id)
    {
        $user = Auth::id();
        $usercart = Cart::where('user_id', $user)->first();
        $cartid = $usercart->id;
        $counts = CartDetail::count();
        $products = Product::all();
        $carts = CartDetail::where('cart_id', $cartid)->get();
        $total = $usercart->total;
        $cart = CartDetail::find($id);
        return view('cart.edit', compact('counts', 'products', 'carts', 'total', 'cart'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'jml' => 'required',
        ]);
        $user = Auth::id();
        $usercart = Cart::where('user_id', $user)->first();
        $cartid = $usercart->id;
        
       $newtotal = 0;
        
      
       
        CartDetail::where('id', $request->id)->update([
            'jml' => $request->jml,
        
          
        ]);
        $carts = CartDetail::where('cart_id', $cartid)->get();
        foreach ($carts as $val) {
           
            $harga = $val->harga;
            $jml = $val->jml;
            $total = $harga * $jml;
            $newtotal += $total;
           
        }
     
        $save = Cart::where('user_id', $user)->update([
            'total' => $newtotal,
        
          
        ]);
   
       
        return redirect('/cart')->withSuccess('Product Berhasil Dirubah!');;
    }

    public function destroy($id)
    {
        $cart = CartDetail::find($id);
       $cartid= $cart->cart_id;
       $harga = $cart->harga;
       $jml = $cart->jml;
       $oldTotal = $harga * $jml;
       $total = Cart::find($cartid)->total;

    $newtotal = $total - $oldTotal;
  
  
        $up = Cart::where('id', $cartid )->update([
            'total' => $newtotal,
          
        ]);
        $cart->delete();
        return redirect('/cart')->withWarning('Product Dihapus!');
    }

    public function checkout()
    {
        $user = Auth::id();
        $userdata = User::find($user);
      
        $usercart = Cart::where('user_id', $user)->first();
        $cartid = $usercart->id;
        $counts = CartDetail::count();
        $products = Product::all();
        $carts = CartDetail::where('cart_id', $cartid)->get();
        $total = $usercart->total;
        
        return view('cart.checkout', compact('userdata','counts', 'products', 'carts', 'total'));
    }

    public function confirm(Request $request)
    {
        $userid = Auth::id();
        $carts = Cart::where('user_id',$userid)->first();
        $cartsdetail = CartDetail::where('cart_id',$carts->id)->get();
        $order_id = now()->format('YmdHis');

        DB::beginTransaction();
        $order = Order::create([
            'tanggal' => now()->format('Y-m-d'),
            'pengiriman' => $request->pengiriman,
            'bank' => $request->bank,
            'noRek' => $request->noRek,
            'totalHrg' => $carts ->total,
            'alamat' => $request->alamat,
            'user_id' =>$userid,
        ]);

        foreach ($cartsdetail as $item) {
            OrderDetail::insert([
                'order_id' => $order->id,
                'produk_id' => $item->produk_id,
                'jml' => $item->jml,
                'harga' => $item->harga,
                // 'total' => $cart->total
            ]);
            $item->delete();
        }
        $carts->delete();
        DB::commit();

        return redirect('/cart')->withSuccess('Pembelian Berhasil!');;
    }


    public function detail(Request $request)
    {
        if ($request->ajax()) {
            $harga = Product::find($request->id);
            $id = $request->produk_id;
            $produk = Product::where('id', 1)->first();
            $harga = $produk->harga;

            $msg = [
                'harga' => $harga,
            ];
            echo json_encode($msg);
        }
    }

}
