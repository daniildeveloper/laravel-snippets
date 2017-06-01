@extends("layouts.master")

@section("title")
Jquery contdown
@endsection

@section("content")
  <div id="countdown"></div>
@endsection

@section('scripts')
<script src="{{asset("vendors/jquery.countdown/dist/jquery.countdown.js")}}">  
</script>

<script src="{{asset("front/jquery/countdown.js")}}"></script>
<script>
  
</script>
@endsection
