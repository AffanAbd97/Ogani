<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $kategori = Category::all();
        $products = Product::paginate(10);
        $productcount = Product::count();
       
        if(Auth::user()){
            $user = Auth::id();
            $usercart =Cart::where('user_id', $user)->first();
            if($usercart){
                $cartid =$usercart ->id;
                $counts = CartDetail::where('cart_id', $cartid)->count();
                $total = $usercart ->total;
            }else{
                $counts = 0;
                $total = 0;
            }
           
        }else{
          
           
          
            $counts = 0;
            $total = 0;
            

            }
            return view('pages.product', compact('products', 'counts', 'total','kategori','productcount'));
    }

    public function show($id){
        $products = Product::find($id);
        if(Auth::user()){
            $user = Auth::id();
            $usercart =Cart::where('user_id', $user)->first();
            if($usercart){
                $cartid =$usercart ->id;
                $counts = CartDetail::where('cart_id', $cartid)->count();
                $total = $usercart ->total;
            }else{
                $counts = 0;
                $total = 0;
            }
           
        }else{
          
           
          
            $counts = 0;
            $total = 0;
            

            }
            return view('pages.detail', compact('products', 'counts', 'total'));
        
    }
}
