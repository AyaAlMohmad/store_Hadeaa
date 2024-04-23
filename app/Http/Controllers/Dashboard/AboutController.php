<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\AboutRequest;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends DashboardController
{
    public function __construct(About $model)
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
    public function store(AboutRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/about'), $imageName);
        $data['image'] = $imageName;
        if ($item = About::create($data)) {
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
    public function update(AboutRequest $request, About $about)
    {
        $data = $request->all();
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/about' . $about->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/about'), $imageName);
            $data['image'] = $imageName;
            $update =   $about->update($data);
        }
        $update = $about->update($data);
        if ($update) {
            session()->flash('success', $this->success_update);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_update);

            return redirect()->back();
        }
    }
}
