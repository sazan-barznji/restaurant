<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Meal as MealResource;
use App\Http\Controllers\API\BaseController as BaseController;

class MealController extends BaseController
{
    public function index()
    {
        $meals= Meal::all();
        return $this->sendResponse(MealResource::collection($meals),
          'All products sent'); 
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input , [         
                'photo'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
                'title'=>'required',
                'ingr'=>'required',
                'price'=>'required',
                'time'=>'required',
                'rest_id'=>'required',
                'cate_id'=>'required'
           ]);

    // $fileName = time().$request->file('photo')->getClientOriginalName();
    // $path = $request->file('photo')->storeAs('images', $fileName, 'public'); 
    // $input["photo"] = '/storage/'.$path;
    $photo = request()->file('photo');
    $photoName = $photo->getClientOriginalName();
    $photoName = time().'_'.$photoName;
    
    if ($validator->fails()) {
    return $this->sendError('Please validate error' ,$validator->errors() );
    }
    $meals = Meal::create($input);

    return $this->sendResponse(new MealResource($meals) ,'Product created successfully' );
          
    }

 
    public function show($id)
    {
        $meals = Meal::find($id);
        if ( is_null($meals) ) {
            return $this->sendError('Product not found'  );
        }
        return $this->sendResponse(new MealResource($meals) ,'Product found successfully' );

    } 
   
    public function update(Request $request, Meal $meals,$id)
    {
        $meals=Meal ::find($id);
        $input = $request->all();
        $validator = Validator::make($input , [
           
                'photo'=>'required|image',
                'title'=>'required',
                'ingr'=>'required',
                'price'=>'required',
                'time'=>'required',
                'rest_id'=>'required',
                'cate_id'=>'required'

        ]  );
        // if ($request->has('photo')){
        //     // $photo= $request->photo;
        //     // $newphoto=time().$photo;
        //     // $photo->save('uploads/meals/');
        //     // $meals->photo = 'uploads/meals/'.$newphoto;
        //     $photo= $request->file('photo')->store('mealsImgs');
        // }
        if ($request->file('photo') == null) {
            $file = "";
        }else{
            $photo= $request->file('photo')->store('mealsImgs'); 
        }
        // $photo= $request->file('photo')->store('uploads/meals/');

        
        if ($validator->fails()) {
         return $this->sendError('Please validate error' ,$validator->errors() );
           }
        // $meals->photo = $input['photo'];
        $meals->title = $input['title'];
        $meals->ingr = $input['ingr'];
        $meals->price = $input['price'];
        $meals->time = $input['time'];
        $meals->rest_id = $input['rest_id'];
        $meals->cate_id = $input['cate_id'];
       

        $meals->save();
        return $this->sendResponse(new MealResource($meals) ,'Product updated successfully' );
    }

    public function destroy(  Meal $meals,$id)
    {
        $meals->destroy($id);
        return  response()->json([
            'status'=> true,
            'message' =>'success'
        ],200);
    }


}

