<?php

namespace App\Http\Controllers\API;

use App\Models\Discount;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Discount as DiscountResource;
use App\Http\Controllers\API\BaseController as BaseController;

class DiscountController extends BaseController
{
    public function index()
    {
        $discs= Discount::all();
        return $this->sendResponse(DiscountResource::collection($discs),
          'All products sent'); 
    }
    
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input , [
            'disc_name'=>'required',
            'disc_value'=>'required',
            'disc_code'=>'required'
           ]  );

        if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
        }
        $discs = Discount::create($input);
        return $this->sendResponse(new DiscountResource($discs) ,'Product created successfully' );
          
    }

 
    public function show($id)
    {
        $discs = Discount::find($id);
        if ( is_null($discs) ) {
            return $this->sendError('Product not found'  );
        }
        return $this->sendResponse(new DiscountResource($discs) ,'Product found successfully' );

    } 
   
    public function update(Request $request, Discount $discs,$id)
    {
        $discs=Discount ::find($id);
        $input = $request->all();
        $validator = Validator::make($input , [
            'disc_name'=>'required',
            'disc_value'=>'required',
            'disc_code'=>'required'
        ]  );

        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
        $discs->disc_name = $input['disc_name'];
        $discs->disc_value = $input['disc_value'];
        $discs->disc_code = $input['disc_code'];
        $discs->save();
        return $this->sendResponse(new DiscountResource($discs) ,'Product updated successfully' );
    }

    public function destroy(  Discount $discs,$id)
    {
        $discs->destroy($id);
        return  response()->json([
            'status'=> true,
            'message' =>'success'
        ],200);
    }
}


