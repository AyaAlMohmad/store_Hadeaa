<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SocialController extends DashboardController
{

    public function __construct(Social $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = ['create', 'store', 'update', 'edit', 'destroy',  'index', 'show', 'finalDelete', 'recycleBin', 'restore'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    public function store(SocialRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/Social'), $imageName);
        $data['image'] = $imageName;
        if ($item = Social::create($data)) {
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
    public function update(SocialRequest $request, Social $Social)
    {
        $data = $request->all();
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/Social' . $Social->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/Social'), $imageName);
            $data['image'] = $imageName;

            $update = $Social->update($data);
        }
        $update = $Social->update($data);
        if ($update) {
            session()->flash('success', $this->success_update);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_update);

            return redirect()->back();
        }
    }
}
