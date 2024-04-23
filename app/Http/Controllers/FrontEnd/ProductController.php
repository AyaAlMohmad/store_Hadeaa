<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function show($id)
    {
        $menu = Menu::all();
        $sociales = Social::all();
        $product = Product::find($id);
        $products = Product::orderBy('created_at', 'desc')->get();

        $groupedProducts = $products->groupBy('sub_category_id')->map(function ($products) {
            return $products->first();
        });
        $comments=Comment::where('product_id',$id)->get();
        $iduser = Auth::id();
        $favorite = Favorite::where('user_id', $iduser)->take(2)->get();
        $order = Order::where('user_id', $iduser)->take(2)->get();
        return view('frontend.product', compact(
            'menu',
            'sociales',
            'groupedProducts',
            'product',
            'favorite',
            'comments',
            'order'
        ));
    }
}
