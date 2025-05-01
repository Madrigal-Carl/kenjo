<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
    
        $products = $category
            ? Product::where('category', $category)->get()
            : Product::all();
    
        return response()->json($products, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:35',
            'details' => 'required',
            'price' => 'required|numeric',
            'category' => 'required',
            'image' => 'nullable'
        ], [
            'name.required' => 'Please provide a product name. It’s required.',
            'name.max' => 'The product name can’t be longer than 35 characters.',
            'details.required' => 'Don’t forget to add product details.',
            'price.required' => 'Please set a price for the product.',
            'price.numeric' => 'The price should be a valid number.',
            'category.required' => 'Please select a category for the product.',
        ]);        

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            flash()->title('Invalid Input')->error($message);
            return response()->json([
                'errors' => $message
            ], 422);
        }

        $product = Product::create([
            'name' => $request->name,
            'details' => $request->details,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $request->image ?? 'assets/images/product.png'
        ]);

        return response()->json([
            'message' => 'Product has been added successfully.',
            'data' => $product
        ], 201);
    }
}
