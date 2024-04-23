<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends DashboardController
{
    public function __construct(Service $model)
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
    public function store(ServiceRequest $request)
    {
        $data = $request->all();
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/Service'), $imageName);
        $data['image'] = $imageName;
        if ($item = Service::create($data)) {
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
    public function update(ServiceRequest $request, Service $Service)
    {
        $data = $request->all();
        if (request()->hasFile('image') && request('image') != '') {
            $imagePath = public_path('images/Service' . $Service->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
            $image = request()->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/Service'), $imageName);
            $data['image'] = $imageName;
            $update =   $Service->update($data);
        }
        $update = $Service->update($data);
        if ($update) {
            session()->flash('success', $this->success_update);
            return redirect($this->index_route);
        } else {
            session()->flash('error', $this->error_update);

            return redirect()->back();
        }
    }
}
