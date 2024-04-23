<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SubCategoryController extends DashboardController
{

    public function __construct(SubCategory $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['create', 'store', 'update', 'edit', 'destroy',  'index', 'show', 'finalDelete', 'recycleBin', 'restore'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }


    public function create()
    {
        $items = Category::all();

        return view('dashboard.pages.sub_categories.form', compact('items'));
    }

    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(SubCategoryRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/subcategory'), $imageName);
        $data['image'] = $imageName;
        if ($item = SubCategory::create($data)) {
            session()->flash('success', $this->success_create);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_create);

            return redirect()->back();
        }
    }



    public function edit($id)
    {
        $item = SubCategory::withTrashed()->findOrFail($id);
        $items= Category::all();
        return view('dashboard.pages.sub_categories.edit', compact('item','items'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(SubCategoryRequest $request, SubCategory $SubCategory)
    {
        $data = $request->all();
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/subcategory' . $SubCategory->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/subcategory'), $imageName);
            $data['image'] = $imageName;
            $update =   $SubCategory->update($data);
        }
        $update = $SubCategory->update($data);
        if ($update) {
            session()->flash('success', $this->success_update);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_update);

            return redirect()->back();
        }
    }
}
