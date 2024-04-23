<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\Social;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $products = [];
        $menu = Menu::all();
        $products = Product::orderBy('created_at', 'desc')->get();

        $groupedProducts = $products->groupBy('sub_category_id')->map(function ($products) {
            return $products->first();
        });

        $Category = Category::all();
        $subCategories = SubCategory::all();
        $comments = Comment::orderBy('created_at', 'desc')->take(4)->get();
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

        return view('frontend.index', compact(
            'menu',
            'groupedProducts',
            'Category',
            'sociales',
            'comments',
            'products',
            'subCategories',
            'favorite',
            'order'
        ));
    }
    public function nameMenu()
    {
        $menu = Menu::all()->pluck('name', 'title');
        return view('layouts.frontend.include.nevbar', compact('menu'));
    }
    public function footer(){
        $menu = Menu::all()->pluck('name', 'title');
        $sociales=Social::all();
        $services=Service::all();
        return view('layouts.frontend.include.footer', compact('menu','sociales'));
   
    }

}
