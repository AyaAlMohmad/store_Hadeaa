<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Addition;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdditionController extends Controller
{
    public function index()
    {
        $menu = Menu::all();
        $sociales = Social::all();
        $items = Addition::all();
        $id = Auth::id();
        $favorite = Favorite::where('user_id', $id)->take(2)->get();
        $order = Order::where('user_id', $id)->take(2)->get();
        return view('frontend.addition', compact(
            'menu',
            'favorite',
            'order',
            'sociales',
            'items'
        ));
    }

    public function show($id){
        $menu = Menu::all();
        $sociales = Social::all();
        $item = Addition::find($id);
        $idAuth = Auth::id();
        $favorite = Favorite::where('user_id', $idAuth)->take(2)->get();
        $order = Order::where('user_id', $idAuth)->take(2)->get();
        
        $products = Product::orderBy('created_at', 'desc')->get();

        $groupedProducts = $products->groupBy('sub_category_id')->map(function ($products) {
            return $products->first();
        });
        $id = Auth::id();
        $favorite = Favorite::where('user_id', $id)->take(2)->get();
        $order = Order::where('user_id', $id)->take(2)->get();
        return view('frontend.component.additionShow', compact(
            'menu',
            'sociales',
            'groupedProducts',
            'item',
            'favorite',
            'order'
        ));
    }
}
