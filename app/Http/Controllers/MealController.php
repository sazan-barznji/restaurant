<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;


class MealController extends Controller
{
    //for accessign controllers
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $meals= Meal::latest()->paginate(10);
        return view('meals.index', compact('meals'));      
    }
    
    public function create()
    {
        // $rests= Restaurant::all();
        // if ($rests->count()==0){
        //     return redirect()->route('rests.create');
        // }
        // return view('meals.create')->with('rests', $rests);
        return view('meals.create');
    }

    
    public function store(Request $request)
    {
        //take you information and put it in the data base 
        $this->validate($request,[
            'photo'=>'required|image',
            'title'=>'required',
            'ingr'=>'required',
            'price'=>'required',
            'time'=>'required',
            'rest_id'=>'required',
            'cate_id'=>'required'
        ]);
        
        $photo = $request->photo;
        $newphoto = time().$photo->getClientOriginalName();
        $photo->move('uploads/meals/',$newphoto);

        $meals = Meal::create([
            // 'rest_id'=> Restaurant::id(),
            'photo'=>'uploads/meals/'.$newphoto,
            'title'=> $request->title,
            'ingr'=>$request->ingr,
            'price'=>$request->price,
            'time'=>$request->time,
            'rest_id'=>$request->rest_id,
            'cate_id'=>$request->cate_id
        ]);
      
        return redirect()->route('meals.store')
        ->with('success ','meals added successfully! ');
    } 


    public function show(Meal $meals)
    {
        return view('meals.show',comact('meals'));
    }

   
    public function edit($id)
    {
        $meals= Meal::find($id);
        return view('meals.edit')->with('meals',$meals);
    }
 
    public function update(Request $request, $id)
    {
        $meals=Meal::find($id);

        $this->validate($request,[
            'title'=>'required',
            'ingr'=>'required',
            'price'=>'required',
            'time'=>'required',
            'rest_id'=>'required',
            'cate_id'=>'required'
        ]);
        if ($request->has('photo')){
            $photo= $request->photo;
            $newphoto=time().$photo->getClientOriginalName();
            $photo->move('uploads/meals/',$newphoto);
            $meals->photo = 'uploads/meals/'.$newphoto;
        }

        $meals->title= $request->title;
        $meals->ingr = $request->ingr;
        $meals->time = $request->time;
        $meals->price= $request->price;
        $meals->rest_id=$request->rest_id;
        $meals->cate_id=$request->cate_id;
        $meals->save();


        return redirect()->back();
    }

    public function destroy($id)
    {
        if(Meal::destroy($id)) {
            return redirect('meals/')->with('success', 'successfully deleted!');
          } else {
            return redirect('meals/')->with('error', 'Please try again!');
          }  
    }
}
