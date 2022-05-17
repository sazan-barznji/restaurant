<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index()
    {
        $discs= Discount::all();
        return view('discs.index', compact('discs'));    
    }

  
    public function create()
    {
        return view('discs.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'disc_name'=>'required',
            'disc_value'=>'required',
            'disc_code'=>'required'
            
            
        ]);

        $discs = Discount::create([
            'disc_name'=> $request->disc_name,
            'disc_value'=>$request->disc_value,
            'disc_code'=>$request->disc_code
           
        ]);
        return redirect()->back();
    }

 
    public function show(Discount $discs)
    {
        return view('discs.show')->with('discs',$discs);
    }

 
    public function edit($id)
    {
        $discs= Discount::find($id);
        return view('discs.edit')->with('discs',$discs);
        
    }

   
    public function update(Request $request, $id)
    {

        $discs=Discount ::find($id);
        $this->validate($request,[
    
            'disc_name'=>'required',
            'disc_value'=>'required',
            'disc_code'=>'required'
        ]);
        $discs->disc_name=$request->disc_name;
        $discs->disc_value=$request->disc_value;
        $discs->disc_code=$request->disc_code;
        $discs->save();

        return redirect()->back();
    }


    public function destroy( $id)
    {
    
    if(Discount::destroy($id)) {
        return redirect('discs/')->with('success', 'successfully deleted!');
      } else {
        return redirect('discs/')->with('error', 'Please try again!');
      }

    }
}
