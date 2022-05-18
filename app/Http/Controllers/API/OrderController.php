<?php

namespace App\Http\Controllers\API;

use App\Models\Order;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Order as OrderResource;
use App\Http\Controllers\API\BaseController as BaseController;

class OrderController extends BaseController
{
    public function index()
    {
        $orders= Order::all();
        return $this->sendResponse(OrderResource::collection($orders),
          'All products sent'); 
    }
    
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input , [
            'disc_id'=>'required',
            'meal_id'=>'required',
            'total_price'=>'required',
            'total_time'=>'required',
            'quantity'=>'required',
            'service'=>'required',
            'table_num'=>'required'
           ]  );

        if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
        }
        $orders = Order::create($input);
        return $this->sendResponse(new OrderResource($orders) ,'Product created successfully' );
          
    }

 
    public function show($id)
    {
        $orders = Order::find($id);
        if ( is_null($orders) ) {
            return $this->sendError('Product not found'  );
        }
        return $this->sendResponse(new OrderResource($orders) ,'Product found successfully' );

    } 
   
    public function update(Request $request, Order $orders,$id)
    {
        $orders=Order ::find($id);
        $input = $request->all();
        $validator = Validator::make($input , [
            'disc_id'=>'required',
            'meal_id'=>'required|exists:meals,id',
            'total_price'=>'required',
            'total_time'=>'required',
            'quantity'=>'required',
            'service'=>'required',
            'table_num'=>'required'
        ]  );

        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
        $orders->disc_id = $input['disc_id'];
        $orders->meal_id = $input['meal_id'];
        $orders->total_price = $input['total_price'];
        $orders->total_time = $input['total_time'];
        $orders->quantity = $input['quantity'];
        $orders->service = $input['service'];
        $orders->table_num = $input['table_num'];
        $orders->save();
        return $this->sendResponse(new OrderResource($orders) ,'Product updated successfully' );
    }

    public function destroy(  Order $orders,$id)
    {
        $orders->destroy($id);
        return  response()->json([
            'status'=> true,
            'message' =>'success'
        ],200);
    }


}