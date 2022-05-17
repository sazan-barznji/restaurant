@extends('layout')
@section('content')

<div class="container">
   <div >
      @if (count($errors)>0)

          <ul class="alert alert-danger">
            @foreach ($errors->all() as $item)
                <li>
                  {{$item}}
                </li>
            @endforeach
          </ul>
                
        @endif
    </div>
  <div class="row">

    <div class="col">
     <h1>add a new Restaurant </h1>
     <a class="btn btn-success" href="{{route('rests.index')}}"> <- all posts</a>
    </div>

  </div>

  <div class="row">

    <div class="col">
      <form method="POST" action="{{route('rests.store')}}">
        @csrf 
       
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="text" name="res_name" class="form-control" >


        </div>

        <button class="btn btn-danger" type="submit"> Save</button>

      </form>
      
      
      
    </div>

  </div>

</div>

@endsection