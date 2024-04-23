<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends DashboardController
{
    public function __construct(Comment $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = [/*'create', 'store', 'update','edit','destroy',  */ 'index','show'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    // // ************************************************
    // // ************************************************
    // // ***********************Store********************
    // // ************************************************
    // // ************************************************
    // public function store(CommentRequest $request)
    // {
    //     $data = $request->all();
    //    $user=Auth::id();
    //     $data['user_id']=$user;
    //     $item = Comment::create($data);
    //     return redirect($this->index_route);
    // }
    // // ************************************************
    // // ************************************************
    // // ***********************Update*******************
    // // ************************************************
    // // ************************************************
    // public function update(CommentRequest $request, Comment $Comment)
    // {
    //     $data = $request->all();
    //    $user=Auth::id();
    //    $data['user_id']=$user;
    //     $update = $Comment->update($data);
    //     return redirect($this->index_route);

    // }
}
