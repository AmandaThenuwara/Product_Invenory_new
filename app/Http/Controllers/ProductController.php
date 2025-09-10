<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('supplier_name', 'like', "%{$search}%");
            });
        }
        
        $products = $query->latest()->get();
        return view('products.index', compact('products')); 
    }

    public function create()
    {
        $suppliers = Supplier::all();
        return view('products.create', compact('suppliers')); 
    }

    public function store(Request $request)
    {
       
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'supplier_name' => 'required|string|max:255',
            'reorder_level' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        $newProduct = Product::create($data);

        return redirect(route('products.index'))->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category' => 'required|string|max:255',
            'sku' => 'required|string|max:255',
            'supplier_name' => 'required|string|max:255',
            'reorder_level' => 'nullable|integer',
            'description' => 'nullable|string',
        ]);

        $product->update($data);
        return redirect(route('products.index'))->with('success', 'Product updated successfully.');   
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('products.index'))->with('success', 'Product deleted successfully.');
    }
}
