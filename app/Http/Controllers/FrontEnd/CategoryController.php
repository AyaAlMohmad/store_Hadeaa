<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
    $products = [];
    $menu = Menu::all();
    // $products = Product::orderBy('created_at', 'desc')->get();

    // $groupedProducts = $products->groupBy('sub_category_id')->map(function ($products) {
    //     return $products->first();
    // });

    $Category = Category::all();
    // $subCategories = SubCategory::all();
    // $services = Service::all();
    $sociales=Social::all();

    $response = Order::select('product_id', DB::raw('count(product_id) as total_count'))
        ->groupBy('product_id')
        ->orderBy('total_count', 'desc')
        ->get();

    $products = [];
    foreach ($response as $item) {
        $product = Product::where('id', $item->product_id)->first();
        if ($product) {
            $products[] = $product;
        }
    }
    $id = Auth::id();
    $favorite = Favorite::where('user_id', $id)->take(2)->get();
    $order = Order::where('user_id', $id)->take(2)->get();
    return view('frontend.category', compact(
        'menu',
        'products',
        'Category',
        'sociales',
        'favorite',
        'order'
        
    ));
}
}
