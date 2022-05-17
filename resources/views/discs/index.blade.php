@extends('layout')
@section('content')

<div class="container">

    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All Discounts</h1>
            <a class="btn btn-success" href="{{route('discs.create')}}"> Create</a>
        </div>
      </div>
    </div>
    <div class="row">
        @if ($discs->count()>0)
         <div class="col">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Value %</th>
                <th scope="col">Code</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
                <th scope="col">delete</th>
              </tr>
            </thead>

            <tbody>

              @php
              $i = 0;
              @endphp

              @foreach ($discs as $item)
                  <tr>
                      <th scope="row"> {{++$i}} </th>
                      <td>{{$item->disc_name}}</td>
                      <td>{{$item->disc_value}}</td>
                      <td>{{$item->disc_code}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>
                        <a class="btn btn-primary" href="{{route('discs.edit',['disc'=> $item->id])}}"> Edit</a>
                      </td>
                      <td>
                        <form action="{{ route('discs.destroy',$item->id) }}" method="POST">
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