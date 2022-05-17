@extends('layout')
@section('content')

<div class="container">

    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Category</h1>
            <a class="btn btn-success" href="{{route('cates.create')}}"> Create</a>
        </div>
      </div>
    </div>
    <div class="row">
        @if ($cates->count()>0)
         <div class="col">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
                <th scope="col">delete</th>
              </tr>
            </thead>

            <tbody>

              @php
              $i = 0;
              @endphp

              @foreach ($cates as $item)
                  <tr>
                      <th scope="row"> {{++$i}} </th>
                      <td>{{$item->name}}</td>
                      <td>
                        <a class="btn btn-primary" href="{{route('cates.edit',['cate'=> $item->id])}}"> Edit</a>
                      </td>
                      <td>
                        <form action="{{ route('cates.destroy',$item->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                        
                              <button type="submit" class="btn btn-danger">Delete</button>
                         
                      </form>
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