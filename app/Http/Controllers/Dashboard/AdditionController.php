<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AdditionRequest;
use App\Models\Addition;
use App\Models\AdditionColor;
use App\Models\AdditionImage;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdditionController extends DashboardController
{
    public function __construct(Addition $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['destroy', 'create', 'index', 'store', 'update', 'show', 'edit', 'finalDelete', 'recycleBin', 'restore'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }


    public function create()
    {
  
 
        $colors = Color::all();
        return view('dashboard.pages.additions.form', compact('colors'));
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(AdditionRequest $request)
    {
        $data = $request->except('images', 'color_id');
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/Addition'), $imageName);
        $data['image'] = $imageName;
        $Addition = Addition::create($data);
        if ($request->color_id) {
            foreach ($request->color_id as $colorId) {
                AdditionColor::create([
                    'addition_id' => $Addition->id,
                    'color_id' => $colorId,
                ]);
            }
        }
        if ($request->has('images')) {
            foreach ($request->images as $image) {
                // Make a image name based on user name and current timestamp
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();

                // Move the image to the correct location
                $image->move(public_path('images/Addition'), $imageName);
                // $fullPath = asset('images/Addition/' . $imageName);

                // Save image details into the database
                $Addition->images()->create(['image' => $imageName]);
            }
        }
        if ($Addition) {
            session()->flash('success', $this->success_create);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_create);

            return redirect()->back();
        }
    }



    public function edit($id)
    {
        $item = Addition::findOrFail($id);
      
        $colors = Color::all();
        return view('dashboard.pages.additions.edit', compact('item', 'colors'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    public function update(AdditionRequest $request, Addition $Addition)
    {
        $data = $request->except('images','color_id');
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/Addition' . $Addition->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/Addition'), $imageName);
            $data['image'] = $imageName;
            $update =   $Addition->update($data);
        }
        $update = $Addition->update($data);
        if (request()->hasFile('images') && request('images') != '') {
            // Delete old images if exists
            if ($oldImages = AdditionImage::where('addition_id', $Addition->id)->get()) {
                foreach ($oldImages as $oldImage) {
                    $oldImagePath = public_path('images/Addition/' . $oldImage->image);
                    if (File::exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    $oldImage->delete();
                }
            }
        }
        if (request()->hasFile('images') && request('images') != '') {
            // Loop through the images array
            foreach ($request->images as $image) {
                // Make a image name based on user name and current timestamp
                $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
                // Move the image to the correct location
                $image->move(public_path('images/Addition'), $imageName);
                // Save image details into the database
                $Addition->images()->create(['image' => $imageName]);
            }
        }
        
        if (empty($request->color_id)) {
            //   $colors= ColorAddition::where('Addition_id', $Addition->id)->get();
            $Addition->colors()->detach();
        }
        if ($request->color_id) {

            // Update color Additions
            foreach ($request->color_id as $colorId) {
                $colorAddition = AdditionColor::where('addition_id', $Addition->id)->first();
                if ($colorAddition) {
                    $colorAddition->update(['color_id' => $colorId]);
                } else {
                    AdditionColor::create([
                        'addition_id' => $Addition->id,
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
