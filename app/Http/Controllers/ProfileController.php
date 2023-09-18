<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Profile;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
       
        $usercart =Cart::where('user_id', $id)->first();
            
            if($usercart){
                $cartid =$usercart ->id;
                $counts = CartDetail::where('cart_id', $cartid)->count();
                $total = $usercart ->total;
            }else{
                $counts = 0;
                $total = 0;
            }
        $profile = Profile::where('id', $user->profile_id)->first();
        
        return view('pages.profile', compact('user','profile', 'counts', 'total'));
    }
    public function edit($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
       
        $usercart =Cart::where('user_id', $id)->first();
            
            if($usercart){
                $cartid =$usercart ->id;
                $counts = CartDetail::where('cart_id', $cartid)->count();
                $total = $usercart ->total;
            }else{
                $counts = 0;
                $total = 0;
            }
        $profile = Profile::where('id', $user->profile_id)->first();
        
        return view('pages.editProfile', compact('user','profile', 'counts', 'total'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'foto' => 'image|mimes:jpeg,jpg,png|max:2048',
            'umur' => 'required|integer',
            'telepon' => 'required',
            'gender'=>'required'
        ]);
        $user = User::find($id);
        $profile = Profile::firstWhere('id', $user->profile_id);
    
        if($request->foto){
            if($profile->foto){
                unlink(public_path('img/profile/'.$profile->foto));
            }
            $filename = time().'.'.$request->foto->extension(); 
            $request->foto->move(public_path('img/profile'), $filename);
            ;
        }else{
            $filename = null;
        }
       
        
      
        $user->name=$request->name;
        $profile->alamat=$request->alamat;
        $profile->telepon=$request->telepon;
        $profile->umur=$request->umur;
        $profile->gender=$request->gender;
        $profile->foto = $filename;
        $profile->update();
        $user->update();
        return redirect('/profile'.'/'.$id);
    }
}
