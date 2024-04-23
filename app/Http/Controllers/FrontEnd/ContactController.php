<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
   function index()
   {
      $menu = Menu::all();
      $sociales = Social::all();
      $contact = Contact::find(1);
      $id = Auth::id();
      $favorite = Favorite::where('user_id', $id)->take(2)->get();
      $order = Order::where('user_id', $id)->take(2)->get();
      return view('frontend.contact', compact(
         'menu',
         'sociales',
         "contact",
         'favorite',
         'order'
      ));
   }
}
