<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderAddition;
use Illuminate\Http\Request;

class OrderAdditionController  extends DashboardController
{ public function __construct(OrderAddition $model)
    {
        parent::__construct();
        $this->model = $model;
        $this->module_actions = [ 'index', 'show'];
        view()->share([
            'module_actions' => $this->module_actions,
        ]);
    }
   
}
