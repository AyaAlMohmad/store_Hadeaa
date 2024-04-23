<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Social;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubCategoryController extends Controller
{
    public function show($id)
    {
   

    $SubCategory = SubCategory::find($id);
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
    return view('frontend.subcategory', compact(
        
        'SubCategory',
       
        'menu',
        'products',
        'Category',
        'sociales',
        'order',
        'favorite'
    ));
}
}
