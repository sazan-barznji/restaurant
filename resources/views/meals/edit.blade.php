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
     <h1>Edit a meal </h1>
     <a class="btn btn-success" href="{{route('meals.index')}}"> <- all posts</a>
    </div>

  </div>
  <div class="row">

    <div class="col">
      <form method="POST" action="{{route('meals.update',[$meals->id])}}" enctype="multipart/form-data">
{{-- <form method="POST" action="{{route('meals.update',['meals=>$meals->id'])}}" enctype="multipart/form-data"> --}}
        @csrf 
       
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Title</label>
          <input type="text" name="title" value="{{$meals->title}}"  class="form-control" >
        </div>

        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Ingredients</label>
          <textarea class="form-control" name="ingr" rows="3">{{$meals->ingr}}</textarea>
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Time</label>
          <input type="number" name="time" value="{{$meals->time}}" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">price</label>
          <input type="number" name="price" value="{{$meals->price}}" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Restaurant</label>
          <input type="number" name="rest_id" value="{{$meals->rest_id}}" class="form-control" >
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Catagory</label>
          <input type="number" name="cate_id" value="{{$meals->cate_id}}" class="form-control" >
        </div>

        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">img</label>
          <input type="file" name="photo" value="{{$meals->photo}}" class="form-control" >
        </div>

        <button class="btn btn-danger" type="submit"> Update</button>

      </form>
      
      
      
    </div>

  </div>

</div>

@endsection
{{-- 
<select name="id_user" id="username" class="uk-select">
    <option>- pilih username -</option>
        @foreach ($pegawai as $emp)
           <option value="{{$emp->user->id}}">{{$emp->user->nama_pgw}}</option>
        @endforeach
</select>
 --}}