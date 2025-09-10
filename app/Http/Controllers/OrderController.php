<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index',['orders' =>$orders]);
    }
    public function create()
    {
        $suppliers = Supplier::all();
        return view('orders.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'order_id' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'order_date' => 'required|date',
            'status' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
        ]);

        // Assuming you have an Order model
        $newOrder =Order::create($data);

        return redirect(route('orders.index'))->with('success', 'Order created successfully.');
    }
}


