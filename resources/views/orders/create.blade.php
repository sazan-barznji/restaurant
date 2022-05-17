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
     <h1>Create a new Category </h1>
     <a class="btn btn-success" href="{{route('orders.index')}}"> <- all posts</a>
    </div>

  </div>

  <div class="row">

    <div class="col">
      <form method="POST" action="{{route('orders.store')}}">
        @csrf 
       
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">disc_id</label>
          <input type="number" name="disc_id" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">meal_id</label>
          <input type="number" name="meal_id" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">total_price</label>
          <input type="number" name="total_price" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">total_time</label>
          <input type="number" name="total_time" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">quantity</label>
          <input type="number" name="quantity" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">service</label>
          <input type="number" name="service" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Table</label>
          <input type="number" name="table_num" class="form-control" >
        </div>


        <button class="btn btn-danger" type="submit"> Save</button>

      </form>
      
      
      
    </div>

  </div>

</div>

@endsection