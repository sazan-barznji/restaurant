@extends('layout')
@section('content')

<div class="container">

    <div class="row">
      <div class="col">
        <div class="jumbotron">
            <h1 class="display-4">All orders</h1>
            <a class="btn btn-success" href="{{route('orders.create')}}"> Create</a>
        </div>
      </div>
    </div>
    <div class="row">
        @if ($orders->count()>0)
         <div class="col">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">disc_id</th>
                <th scope="col">meal_id</th>
                <th scope="col">total_price</th>
                <th scope="col">total_time</th>
                <th scope="col">quantity</th>
                <th scope="col">table</th>
                <th scope="col">actions</th>

              </tr>
            </thead>
            <tbody>

              @php
              $i = 0;
              @endphp

              @foreach ($orders as $item)
                  <tr>
                      <th scope="row"> {{++$i}} </th>
                      <td>{{$item->disc_id}}</td>
                      <td>{{$item->meal_id}}</td>
                      <td>{{$item->total_price}}</td>
                      <td>{{$item->total_time}}</td>
                      <td>{{$item->quantity}}</td>
                      <td>{{$item->table_num}}</td>
                      <td>
                        <a class="btn btn-primary" href="{{route('orders.edit',['order'=> $item->id])}}"> Edit</a>
                      </td>
                      <td>
                        <form action="{{ route('orders.destroy',$item->id) }}" method="POST">
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