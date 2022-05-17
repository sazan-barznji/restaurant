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
     <h1>Edit Discount </h1>
     <a class="btn btn-success" href="{{route('discs.index')}}"> <- all posts</a>
    </div>

  </div>

  <div class="row">

    <div class="col">
      <form method="POST" action="{{route('discs.update',[$discs->id])}}">
        @csrf 
        @method('PUT')


        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Name</label>
          <input type="text" name="disc_name" value="{{$discs->disc_name}}"  class="form-control" >

          <label for="exampleFormControlInput1" class="form-label"> Value % </label>
          <input type="text" name="disc_value" value="{{$discs->disc_value}}" class="form-control">

          <label for="exampleFormControlInput1" class="form-label"> Code </label>
          <input type="text" name="disc_code" value="{{$discs->disc_code}}" class="form-control">


        </div>

        <button class="btn btn-danger" type="submit"> Update</button>

      </form>
      
      
      
    </div>

  </div>

</div>

@endsection