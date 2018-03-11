<?php

namespace App\Http\Controllers\Writer;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function open ()
    {
       $orders = Project::orderBy('id', 'desc')->get();
       return view('writer/orders/index', compact('orders'));
    }

    public function show ($id)
    {
        $order = Project::find($id);
        return view('writer/orders/order', compact('order'));
    }
}
