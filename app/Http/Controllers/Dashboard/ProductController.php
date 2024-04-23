<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\File;

class ProductController extends DashboardController
{
    public function __construct(Product $model)
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
        $items = SubCategory::all();
        // $category = Category::all();
        $colors = Color::all();
        return view('dashboard.pages.products.form', compact('colors', 'items'));
    }

    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(ProductRequest $request)
    {
        $data = $request->except('images', 'color_id');
        $image = $request->file('image_first');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/product'), $imageName);
        $data['image_first'] = $imageName;
        $product = Product::create($data);
        if ($request->color_id) {
            foreach ($request->color_id as $colorId) {
                ColorProduct::create([
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                ]);
            }
        }
        if ($request->has('images')) {
            foreach ($request->images as $image) {
                // Make a image name based on user name and current timestamp
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                // Move the image to the correct location
                $image->move(public_path('images/product'), $imageName);
                // $fullPath = asset('images/product/' . $imageName);

                // Save image details into the database
                $product->images()->create(['image' => $imageName]);
            }
        }
        if ($product) {
            session()->flash('success', $this->success_create);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_create);

            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $items = SubCategory::all();
        // $designers = Designer::all();
        $colors = Color::all();
        return view('dashboard.pages.products.edit', compact('product', 'colors', 'items'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(ProductRequest $request, Product $Product)
    {
        $data = $request->except('images', 'color_id');

        if (request()->hasFile('image_first') && request('image_first') != '') {
            $image_mainPath = public_path('images/product/' . $Product->image_first);
            if (File::exists($image_mainPath)) {
                unlink($image_mainPath);
            }
        }
        if (request()->hasFile('image_first') && request('image_first') != '') {
            $image = request()->file('image_first');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/product'), $imageName);
            $data['image_first'] = $imageName;

            $update = $Product->update($data);
        }
        $update = $Product->update($data);
        if (request()->hasFile('images') && request('images') != '') {
            // Delete old images if exists
            if ($oldImages = ImageProduct::where('product_id', $Product->id)->get()) {
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('images/product/' . $oldImage->image);
                    if (File::exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $oldImage->delete();
                }
            }
        }
        // Move new images to destination directory
        // Check if the request has images
        if (request()->hasFile('images') && request('images') != '') {
            // Loop through the images array
            foreach ($request->images as $image) {
                // Make a image name based on user name and current timestamp
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
                // Move the image to the correct location
                $image->move(public_path('images/product'), $imageName);
                // Save image details into the database
                $Product->images()->create(['image' => $imageName]);
            }
        }



        if (empty($request->color_id)) {
            //   $colors= ColorProduct::where('product_id', $product->id)->get();
            $Product->colors()->detach();
        }
        if ($request->has('color_id')) {

            // Update color products
            foreach ($request->color_id as $colorId) {
                $colorProduct = ColorProduct::where('product_id', $Product->id)->first();
                if ($colorProduct) {
                    $colorProduct->update(['color_id' => $colorId]);
                } else {
                    ColorProduct::create([
                        'product_id' => $Product->id,
                        'color_id' => $colorId,
                    ]);
                }
            }
        }
        if ($update) {
            session()->flash('success', $this->success_update);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_update);

            return redirect()->back();
        }
    }
}
