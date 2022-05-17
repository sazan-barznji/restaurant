<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

    public function index()
    {
        $rests= Restaurant::all();
        return view('rests.index', compact('rests'));    
    }

  
    public function create()
    {
        return view('rests.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'res_name'=>'required'
            
        ]);

        $rests = Restaurant::create([
            'res_name'=> $request->res_name,
        ]);
        return redirect()->back();
    }

 
    public function show(Restaurant $rests)
    {
        return view('rests.show')->with('rests',$rests);
    }

 
    public function edit($id)
    {
        $rests= Restaurant::find($id);
        return view('rests.edit')->with('rests',$rests);
        
    }

   
    public function update(Request $request, $id)
    {

        $rests=Restaurant ::find($id);
        $this->validate($request,[
    
            'res_name'=>'required',
        ]);
        $rests->res_name=$request->res_name;
        $rests->save();

        return redirect()->back();
    }


    public function destroy( $id)
    {
    
    if(Restaurant::destroy($id)) {
        return redirect('rests/')->with('success', 'successfully deleted!');
      } else {
        return redirect('rests/')->with('error', 'Please try again!');
      }

    }
}
