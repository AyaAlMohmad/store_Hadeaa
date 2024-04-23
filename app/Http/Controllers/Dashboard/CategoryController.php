<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends DashboardController
{
    public function __construct(Category $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit', 'finalDelete', 'recycleBin', 'restore'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(CategoryRequest $request)
    {
        $data = $request->all();

        if ($item = Category::create($data)) {
            session()->flash('success', $this->success_create);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_create);

            return redirect()->back();
        }
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(CategoryRequest $request, Category $Category)
    {
        $data = $request->all();

        if ($update = $Category->update($data)) {
            session()->flash('success', $this->success_update);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_update);
            return redirect($this->index_route);
        }
    }
}
