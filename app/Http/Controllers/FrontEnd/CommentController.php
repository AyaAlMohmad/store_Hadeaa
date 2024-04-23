<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
   public function store(Request $request){
    $iduser=Auth::id();
    $idproduct=$request->product_id;
    $comment=$request->comment;
    Comment::create([
        'user_id'=>$iduser,
        'product_id'=>$idproduct,
        'comment'=>$comment
    ]);
    return back();
   }
}
