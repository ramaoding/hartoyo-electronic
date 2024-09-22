<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OrdersResource;
use App\Models\Orders;
use App\Models\Products;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::with('orderDetails')->get();
        return new OrdersResource('Order List', $orders);
    }

    public function store(Request $request)
    {
        // return $request; 
        $validator = Validator::make($request ->all(), [
            'products' => 'required',
            'products.*.id' => 'required',
            'products.*.quantity' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }

        $orders = Orders::create();
        foreach($request->products as $key=>$value){
            $orderDetail = OrderDetails::create([
                'orderId' => $orders->id,
                'productsId' => $value['id'],
                'quantity' => $value['quantity'],
            ]);
        }
        $response =  Orders::with('orderDetails')->find($orders);
        return new OrdersResource('Order created successfully', $response);
    }

    public function show($id)
    {
        $data = Orders::with('orderDetails')->find($id);
        if($data == null){
            return response()->json(['message' => 'Order not found']);
        }
        return new OrdersResource('Order detail', $data);
    }

    public function destroy($id)
    {
        $data = Orders::find($id);
        if($data == null){
            return response()->json(['message' => 'Order not found']);
        }
        $data->delete();
        return new OrdersResource('Order deleted successfully', $data);
    }
}
