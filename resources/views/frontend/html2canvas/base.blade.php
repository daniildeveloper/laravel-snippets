@extends("layouts.master")

@section("title")
Html to canvas base php
@endsection

@section("content")

<div class="container">
  <ol class="breadcrumb">
    <li><a href="{{route("front")}}">Frontend</a></li>
    <li>Html to canvas base php</li>
  </ol>

  <div class="wrap">
  <p>Click "Findlay" to run html2canvas</p>
  <div id="capture" class="box">
      <span class="text">Findlay</span>
      <img src="{{asset("images/frontend/t.jpg")}}" />
  </div>
  <div class="box paste"></div>
</div>



</div>
@endsection


@section("scripts")
  <script src="{{asset("vendors/html2canvas/build/html2canvas.min.js")}}"></script>
  <script>
  $(document).ready(function() {
    $('.text').click(function(){
      html2canvas($("#capture"), {
          allowTaint: true,
          onrendered: function(canvas) {
          $('.paste').prepend(canvas);
            var dataURL = canvas.toDataURL();
            console.log(dataURL);
          }
      });
    });
  });
  </script>
@endsection