<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ProductsResource;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function index()
    {
        $response = Products::all();
        return new ProductsResource('Product List', $response);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request ->all(), [
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $response = Products::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'sold' => $request->sold,
        ]);

        return new ProductsResource('Product created successfully', $response);
    }

    public function show($id)
    {
        $data = Products::find($id);
        if($data == null){
            return response()->json(['message' => 'Product not found']);
        }
        return new ProductsResource('Product detail', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request ->all(), [
            'id' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $data = Products::find($id);
        if($data == null){
            return response()->json(['message' => 'Product not found']);
        }
        
        
        // $data->name = $request->name;
        // $data->price = $request->price;
        // $data->stock = $request->stock;
        // $data->sold = $request->sold;
        
        $data->update([
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'sold' => $request->sold,
        ]);

        return new ProductsResource('Product updated successfully', $data);
    }

    public function destroy($id)
    {
        $data = Products::find($id);
        if($data == null){
            return response()->json(['message' => 'Product not found']);
        }
        $data->delete();
        return new ProductsResource('Product deleted successfully', $data);
    }
}
