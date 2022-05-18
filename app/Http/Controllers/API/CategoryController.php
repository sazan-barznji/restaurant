<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Category;
use Validator;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Controllers\API\BaseController as BaseController;

class CategoryController extends BaseController
{
    public function index()
    {
        $cates= Category::all();
        return $this->sendResponse(CategoryResource::collection($cates),
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
        $cates = Category::create($input);
        return $this->sendResponse(new CategoryResource($cates) ,'Product created successfully' );
          
    }

 
    public function show($id)
    {
        $cates = Category::find($id);
        if ( is_null($cates) ) {
            return $this->sendError('Product not found'  );
        }
        return $this->sendResponse(new CategoryResource($cates) ,'Product found successfully' );

    } 
   
    public function update(Request $request, Category $cates,$id)
    {
        $cates=Category ::find($id);
        $input = $request->all();
        $validator = Validator::make($input , [
            'name'=>'required'
        ]  );

        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
        $cates->name = $input['name'];
        $cates->save();
        return $this->sendResponse(new CategoryResource($cates) ,'Product updated successfully' );
    }

    public function destroy(  Category $cates,$id)
    {
        $cates->destroy($id);
        return  response()->json([
            'status'=> true,
            'message' =>'success'
        ],200);
    }


}
