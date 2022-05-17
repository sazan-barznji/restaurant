@extends('layout')
@section('content')

<h1>hello from index </h1>
<div class="container">
    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">
                All Meals 
            </h1>
            <a class="btn btn-success" href="{{route('meals.create')}}"> Create</a>
        
        </div>
      </div>
      
    </div>
    <div class="row">
        @if ($meals->count()>0)
         <div class="col">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Price</th>
                <th scope="col">time</th>
                <th scope="col">ingr</th>
                <th scope="col">Catagory</th>
                <th scope="col">Restaurant</th>
                <th scope="col">photo</th>
                <th scope="col">actions </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($meals as $item)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$item->title}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->time}}</td>
                        <td>{{$item->ingr}}</td>
                        <td>{{$item->cate_id}}</td>
                        <td>{{$item->rest_id}}</td>
                        <td> <img src="{{URL::asset($item->photo)}}" class="img-tumbnail" width="100px" height="100px"></td>
                        {{-- <td> <img src="{{asset($item->photo)}}" class="img-tumbnail"> </td> --}}
                         
                        <td>
                            <a class="btn btn-primary" href="{{route('meals.edit',[$item->id])}}"> Edit</a>
                            <a class="btn btn-danger" href="{{route('meals.destroy',[ $item->id])}}">Delete</a>
                        </td>
                       
                        
                    </tr>   
                @endforeach
             
              
            </tbody>
        </table>
      </div>   
        @else
        <div class="col">
            <div class="alert alert-danger" role="alert">
             you dont have any product!
             </div> 
        </div>
         
        @endif

    </div>
  </div>


@endsection