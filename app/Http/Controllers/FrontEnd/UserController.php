<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   public function edit($id)  {
      $menu = Menu::all();
      $sociales = Social::all();
      $id = Auth::id();
      $user = User::find($id);
  
      $favorite = Favorite::where('user_id', $id)->take(2)->get();
      $order = Order::where('user_id', $id)->take(2)->get();
      return view('frontend.profileUserEdite',compact(    'menu',
      'sociales',
      'user',
      'order',
      'favorite'));
   }
   public function update(Request $request,$id){
      $user = User::find($id);
      $data=$request->all();
      if(isset( $data['password'])){
      $user->update($data);}
      else{
         $data1=$request->except('password');
         $user->update($data1);
      }
      return redirect()->route('user.show');
   }
   function show()
   {
      $menu = Menu::all();
      $sociales = Social::all();
      $id = Auth::id();
      $user = User::find($id);
  
      $favorite = Favorite::where('user_id', $id)->take(2)->get();
      $order = Order::where('user_id', $id)->take(2)->get();
      return (view('frontend.profileUser', compact(
         'menu',
         'sociales',
         'user',
         'order',
         'favorite'
      )));
   }
   function order()
   {
      $menu = Menu::all();
      $sociales = Social::all();
      $id = Auth::id();
      $orders = Order::where('user_id', $id)->get();
 
      $favorite = Favorite::where('user_id', $id)->take(2)->get();
      $order = Order::where('user_id', $id)->take(2)->get();
      return (view('frontend.profileorder', compact(
         'menu',
         'sociales',
         'orders',
         'favorite',
         'order'
      )));
   }
   function favorite()
   {
      $menu = Menu::all();
      $sociales = Social::all();
      $id = Auth::id();
      $favorites = Favorite::where('user_id', $id)->get();
  
      $favorite = Favorite::where('user_id', $id)->take(2)->get();
      $order = Order::where('user_id', $id)->take(2)->get();
      return (view('frontend.profilefavorite', compact(
         'menu',
         'sociales',
         'order',
         'favorite',
         'favorites'
      )));
   }
}
