@extends('layouts.master')

@section('title')
  My hayp
@endsection

@section('content')
  <h1 class="text-center">My Hayp</h1>
  <div class="container">
    <div class="row">
      @foreach($items as $i)
        <div class="col-md-3">
          <h4>{{DB::table('hayp_items')->where('id', $i->item_id)->get()[0]->title}} <span class="badge">{{$i->count}}</span></h4>
        </div>
      @endforeach
    </div>
  </div>
@endsection
