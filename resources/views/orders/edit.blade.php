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
     <h1>Edit a order </h1>
     <a class="btn btn-success" href="{{route('orders.index')}}"> <- all posts</a>
    </div>

  </div>

  <div class="row">

    <div class="col">
      <form method="POST" action="{{route('orders.update',[$orders->id])}}">
        @csrf 
        @method('PUT')
     
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">disc_id</label>
          <input type="number" name="disc_id" value="{{$orders->disc_id}}" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">meal_id</label>
          <input type="number" name="meal_id" value="{{$orders->meal_id}}" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">total_price</label>
          <input type="number" name="total_price" value="{{$orders->total_price}}" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">total_time</label>
          <input type="number" name="total_time"  value="{{$orders->total_time}}"class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">quantity</label>
          <input type="number" name="quantity"  value="{{$orders->quantity}}"class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">service</label>
          <input type="number" name="service" value="{{$orders->service}}" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Table</label>
          <input type="number" name="table_num" value="{{$orders->table_num}}" class="form-control" >
        </div>

      

        <button class="btn btn-danger" type="submit"> Update</button>

      </form>
      
      
      
    </div>

  </div>

</div>

@endsection