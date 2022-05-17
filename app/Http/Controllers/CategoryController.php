<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $cates= Category::all();
        return view('cates.index', compact('cates'));    
    }

  
    public function create()
    {
        return view('cates.create');
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required'
            
        ]);

        $cates = Category::create([
            'name'=> $request->name
        ]);
        return redirect()->back();
    }

 
    public function show(Category $cates)
    {
        return view('cates.show')->with('cates',$cates);
    }

 
    public function edit($id)
    {
        $cates= Category::find($id);
        return view('cates.edit')->with('cates',$cates);
        
    }

   
    public function update(Request $request, $id)
    {
        $cates=Category ::find($id);
        $this->validate($request,[
            'name'=>'required'
        ]);
        $cates->name=$request->name;
        $cates->save();
        return redirect()->back();
    }


    public function destroy( $id)
    {
    
    if(Category::destroy($id)) {
        return redirect('cates/')->with('success', 'successfully deleted!');
      } else {
        return redirect('cates/')->with('error', 'Please try again!');
      }

    }
}
