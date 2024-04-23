<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
    protected $model;
    protected $dash_view = 'dashboard.pages';
    protected $module_name;
    protected $controller_name;
    protected $method_name;
    protected $method_view;
    protected $module_actions = [];
    protected $success_create;
    protected $success_update;
    protected $success_delete;
    protected $success_restore;
    protected $success_finalDelete;

    protected $error_create;
    protected $error_update;
    protected $error_delete;
    protected $error_restore;
    protected $error_finalDelete;

    protected $index_route;

    public function __construct(Model $model = null)
    {
        $this->model = $model;
        $this->controller_name = $this->getControllerName();
        $this->module_name = Str::snake(Str::plural($this->controller_name));
        $this->method_name = request()->route()->getActionMethod();
        $this->method_view = $this->dash_view . '.' . $this->module_name . '.' . $this->method_name;

        $this->index_route = route($this->module_name . '.index');


        $this->success_create='The creation has been saved successfully';
        $this->success_update='The modifications were saved successfully';
        $this->success_delete='Moved to Recycle Bin';
        $this->success_restore='Data has been restored';
        $this->success_finalDelete='Permanently deleted';
        $this->error_create='The creation was not saved';
        $this->error_update='The modifications are not saved';
        $this->error_delete='The item was not deleted';
        $this->error_restore='The item was not returned';
        $this->error_finalDelete='The item has not been permanently deleted';
        $this->module_actions = ['destroy', 'create', 'store', 'update'];
        view()->share([
            'module_name' => $this->module_name,
            'method_name' => $this->method_name,
            'module_actions' => $this->module_actions,


            'success_create'=>$this->success_create,
            'success_update'=>$this->success_update,

        ]);
    }
    // ************************************************
    // ************************************************
    // ***********************Index********************
    // ************************************************
    // ************************************************
    public function index()
    {
        $items = $this->model->get();
        return view($this->dash_view . '.' . $this->module_name . '.index')
            ->with('items', $items);
    }
    // ************************************************
    // ************************************************
    // ***********************Show********************
    // ************************************************
    // ************************************************
    public function show($id)
    {
        $item = $this->model->find($id);
        return view(
            $this->dash_view . '.' . $this->module_name . '.show',
            compact('item')
        );
    }
    // ************************************************
    // ************************************************
    // **********************Create********************
    // ************************************************
    // ************************************************
    public function create()
    {
        return view($this->dash_view . '.' . $this->module_name . '.form');
    }
    // ************************************************
    // ************************************************
    // ***********************Store********************
    // ************************************************
    // ************************************************
    // public function store()
    // {
    // }



    // ************************************************
    // ************************************************
    // ***********************Edit*********************
    // ************************************************
    // ************************************************
    public function edit($id)
    {

        $item = $this->model->withTrashed()->findOrFail($id);
        return view($this->method_view, compact('item'));
    }
    // ************************************************
    // ************************************************
    // ***********************Update*******************
    // ************************************************
    // ************************************************
    // public function update()
    // {
    // }



    // ************************************************
    // ************************************************
    // ***********************Delete*******************
    // ************************************************
    // ************************************************
    public function destroy($id)
    {
      if( $item = $this->model->findOrFail($id)->delete()){
  
        session()->flash('success',$this->success_delete);
        return redirect()->back();
      }else{
        session()->flash('error',$this->error_delete);

        return redirect()->back();
       }
    }
    // ************************************************
    // ************************************************
    // ***********************Restore******************
    // ************************************************
    // ************************************************
    public function restore($id)
    {
        $item = $this->model::withTrashed()->find($id);
     if($restore = $item->restore()){
        session()->flash('success',$this->success_restore);

        return redirect()->back();
     }else{
            session()->flash('error',$this->error_restore);
    
            return redirect()->back();
           }
    }
    // ************************************************
    // ************************************************
    // ***********************RecycleBin***************
    // ************************************************
    // ************************************************
    public function recycleBin()
    {
        $items = $this->model->onlyTrashed()->get();
        return view(
            $this->dash_view . '.' . $this->module_name . '.recycleBin',
            compact('items')
        );
    }

    // ************************************************
    // ************************************************
    // ***********************FinalDelete**************
    // ************************************************
    // ************************************************
    public function finalDelete($id)
    {
        $item = $this->model::withTrashed()->find($id);
       if( $finalDelete = $item->forceDelete()){
        session()->flash('success',$this->success_finalDelete);

        return redirect()->back();
       }else{
        session()->flash('error',$this->error_finalDelete);

        return redirect()->back();
       }
    }
    // ************************************************
    // ************************************************
    // ***************getControllerName****************
    // ************************************************
    // ************************************************
    protected function getControllerName()
    {
        return str_replace('Controller', '', class_basename($this));
    }
}
