<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('order_id', 'like', "%{$search}%")
                  ->orWhere('company_name', 'like', "%{$search}%")
                  ->orWhere('status', 'like', "%{$search}%")
                  ->orWhereRaw('CAST(total_amount as CHAR) LIKE ?', ["%{$search}%"]);
            });
        }
        
        $orders = $query->latest()->get();
        return view('orders.index', compact('orders'));
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


