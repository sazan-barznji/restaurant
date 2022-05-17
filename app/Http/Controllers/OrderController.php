<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller

{

    public function index()
    {
        $orders= Order::all();
        return view('orders.index', compact('orders'));    
    }

  
    public function create()
    {
        return view('orders.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
        
            'disc_id'=>'required',
            'meal_id'=>'required|exists:meals,id',
            'total_price'=>'required',
            'total_time'=>'required',
            'quantity'=>'required',
            'service'=>'required',
            'table_num'=>'required'
            
        ]);

        $orders = Order::create([
            'disc_id'=> $request->disc_id,
            'meal_id'=> $request->meal_id,
            'total_price'=> $request->total_price,
            'total_time'=> $request->total_time,
            'quantity'=> $request->quantity,
            'service'=> $request->service,
            'table_num' =>$request->table_num
        
        ]);
        return redirect()->back();
    }

 
    public function show(Order $orders)
    {
        return view('orders.show')->with('orders',$orders);
    }

 
    public function edit($id)
    {
        $orders= Order::find($id);
        return view('orders.edit')->with('orders',$orders);
        
    }

   
    public function update(Request $request, $id)
    {
        $orders=Order ::find($id);
        $this->validate($request,[
           
            'disc_id'=>'required',
            'meal_id'=>'required|exists:meals,id',
            'total_price'=>'required',
            'total_time'=>'required',
            'quantity'=>'required',
            'service'=>'required',
            'table_num'=> 'required'
        ]);
        $orders->disc_id=$request->disc_id;
        $orders->meal_id=$request->meal_id;
        $orders->total_price=$request->total_price;
        $orders->total_time=$request->total_time;
        $orders->quantity=$request->quantity;
        $orders->service=$request->service;
        $orders->table_num=$request->table_num;
        $orders->save();
        return redirect()->back();
    }


    public function destroy( $id)
    {
    
    if(Order::destroy($id)) {
        return redirect('orders/')->with('success', 'successfully deleted!');
      } else {
        return redirect('orders/')->with('error', 'Please try again!');
      }

    }
}
