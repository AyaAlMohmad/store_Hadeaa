<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request){
        $user_id=Auth::id();
        $product_id=$request->product_id;
        Order::create([
            'amount'=>$request->amount,
            'comment'=>$request->comment,
            'user_id'=>$user_id,
            'product_id'=>$product_id
        ]);
        return back();

    }
    public function destroy($id){
        $delete=Order::where('id',$id)->delete();
        return back();
     }
     public function storeAddition(Request $request){
        $user_id=Auth::id();
        $addition_id=$request->addition_id;
        OrderAddition::create([
            'amount'=>$request->amount,
            'comment'=>$request->comment,
            'user_id'=>$user_id,
            'addition_id'=>$addition_id
        ]);
        return back();

    }
    public function destroyAddition($id){
        $delete=OrderAddition::where('id',$id)->delete();
        return back();
     }
}
