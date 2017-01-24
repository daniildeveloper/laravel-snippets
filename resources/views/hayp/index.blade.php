@extends('layouts.master')

@section('title')
  Hayp
@endsection

@section('content')
  <div class="container">
    @foreach($items as $item)
      <div class="col-md-3">
        <h3>{{$item->title}}</h3>
        <div>
          {{$item->description}}
        </div>
        <div class="">
           <p>cost {{$item->price}}</p>
           <p>pro hour {{$item->profit_pro_hour}}</p>
        </div>
        <a href="{{url('/hayp/buy-' . $item->id)}}" class="btn btn-success">Buy</a>
      </div>
    @endforeach
  </div>
@endsection
