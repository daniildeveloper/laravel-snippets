<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li><a href="{{url("/shop/")}}">Shop</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Hayp<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('hayp')}}">Hayp index</a></li>
                        <li><a href="{{route('my-hayp')}}">My Hayp</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::user() !== null)
                    <li><a href="#">{{Auth::user()->money}} $</a></li>
                @endif
                <li>
                    <a href="{{url("/shop/cart")}}">
                        <i class="fa fa-shopping-cart"></i> Shopping cart
                        <span class="badge">{{\Illuminate\Support\Facades\Session::has("cart") ? \Illuminate\Support\Facades\Session::get("cart")->totalQty : ""}}</span>
                        <span class="badge">${{\Illuminate\Support\Facades\Session::has("cart") ? \Illuminate\Support\Facades\Session::get("cart")->totalPrice : ""}}</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-user"></i> User<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">login</a></li>

                        <li role="separator" class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
