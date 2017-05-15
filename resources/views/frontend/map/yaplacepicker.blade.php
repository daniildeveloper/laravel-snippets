@extends("layouts.master")

@section("title")
Yandex Maps Api
@endsection

@section("content")
  <div class="container">
    <ol class="breadcrumb">
      <li><a href="{{route("front")}}">Frontend</a></li>
      <li>Yandex Maps Place Picker</li>
    </ol>

    <div id="map"></div>



    
  </div>
@endsection


@section("scripts")
  <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

  <script>
    ymaps.ready(function () {  
    var map = new ymaps.Map("#map", {
          center: [55.76, 37.64], 
          zoom: 10
        });

    if (map) {
      ymaps.modules.require('Placemark', 'Circle', function (['Placemark', 'Circle']) {
        var placemark = new Placemark([55.37, 35.45]);
      });
    }
  });
  </script>
@endsection