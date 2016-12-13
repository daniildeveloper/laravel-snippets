@extends("shop.master")

@section("title") Shopping cart @endsection

@section("content")
    <div class="container">
        @foreach($products->chunk(3) as $productChunk)
            <div class="row">

                @foreach($productChunk as $product)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{$product->imagePath}}" alt="book" class="img-responsive">
                            <div class="caption">
                                <h3>{{$product->title}}</h3>
                                <p class="description">{{$product->description}}</p>
                                <div class="clearfix">
                                    <div class="pull-left price">${{$product->price}}</div>
                                    <a href="{{route("shop.to-cart", ['id'=>$product->id])}}"
                                       class="btn btn-success pull-right" role="button">add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>


@endsection