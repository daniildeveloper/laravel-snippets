@extends("layouts.master")

@section("title") Shopping cart | Items @endsection

@section("content")
    <div class="container">
        <h1 class="text-center">My orders</h1>


        @if(\Illuminate\Support\Facades\Session::has("cart") && \Illuminate\Support\Facades\Session::get("cart")->totalQty > 0)
            @foreach(\Illuminate\Support\Facades\Session::get("cart")->items as $item)
                <div class="col-md-4 col-sm-2">

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{$item['item']["title"]}}
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">{{$item['item']["description"]}}</li>
                            <li class="list-group-item"><span class="bold">${{$item['item']["price"]}}</span> x {{$item["qty"]}}</li>
                        </ul>
                    </div>
                </div>
            @endforeach

        @else
            <p>You have no orders</p>
        @endif
    </div>

@endsection