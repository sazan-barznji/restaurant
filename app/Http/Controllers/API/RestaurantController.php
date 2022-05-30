<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Validator;
use App\Http\Resources\Restaurant as RestaurantResource;
use App\Http\Controllers\API\BaseController as BaseController;

class RestaurantController extends BaseController
{
    public function index()
    {
        $rests= Restaurant::all();
        return $this->sendResponse(RestaurantResource::collection($rests),
          'All products sent'); 
    }
    
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input , [
            'name'=>'required',
           ]  );

        if ($validator->fails()) {
        return $this->sendError('Please validate error' ,$validator->errors() );
        }
        $rests = Restaurant::create($input);
        return $this->sendResponse(new RestaurantResource($rests) ,'Product created successfully' );
          
    }

 
    public function show($id)
    {
        $rests = Restaurant::find($id);
        if ( is_null($rests) ) {
            return $this->sendError('Product not found'  );
        }
        return $this->sendResponse(new RestaurantResource($rests) ,'Product found successfully' );

    } 
   
    public function update(Request $request, Restaurant $rests,$id)
    {
        $rests=Restaurant ::find($id);
        $input = $request->all();
        $validator = Validator::make($input , [
            'name'=>'required'
        ]  );

        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
        $rests->name = $input['name'];
        $rests->save();
        return $this->sendResponse(new RestaurantResource($rests) ,'Product updated successfully' );
    }

    public function destroy(  Restaurant $rests,$id)
    {
        $rests->destroy($id);
        return  response()->json([
            'status'=> true,
            'message' =>'success'
        ],200);
    }


}
