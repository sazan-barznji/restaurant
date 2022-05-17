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
     <h1>Create a new meal </h1>
     <a class="btn btn-success" href="{{route('meals.index')}}"> <- all meals</a>
    </div>

  </div>

  <div class="row">

    <div class="col">
      <form method="POST" action="{{route('meals.store')}}" enctype="multipart/form-data">
        @csrf 
        {{-- {{ method_field('POST') }} --}}
       
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" >
        </div>

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Ingredients</label>
          <textarea class="form-control" name="ingr" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Time</label>
          <input type="text" name="time" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Price</label>
          <input type="text" name="price" class="form-control" >
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">img</label>
          <input type="file" name="photo" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">restaurant</label>
          <input type="number" name="rest_id" class="form-control" >

          {{-- @foreach ($rests as $item)
               <input type="checkbox" name="rests[]" value="{{$item->id}}"> 
               <label for="">{{$item->rests}}</label>
          @endforeach --}}
        
        </div>
     

        <div class="mb-3">
         
          <label for="exampleFormControlInput1" class="form-label">Catagory</label>
          <input type="number" name="cate_id" class="form-control" >

        </div>


        <button class="btn btn-danger" type="submit"> Save</button>

      </form>
      
      
      
    </div>

  </div>

</div>

@endsection