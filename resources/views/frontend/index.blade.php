@extends("layouts.master")

@section("title")
Frontend
@endsection

@section("content")
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <h4>Dropzone.js</h4>
      <ul>
        <li>
          <a href="{{route("dropzone")}}">Dropzone</a>
        </li>
      </ul>
    </div>

    <div class="col-md-3">
      <h4>Autocomplete search</h4>
      <ul>
        <li>
          <a href="{{route("frontend.autocomplete.pure")}}">pure jquery</a>
        </li>
        <li>
          <a href="{{url("frontend/autocomplete/jqueryui")}}">jqueryui</a>
        </li>
        <li><a href="{{url("frontend/autocomplete/combobox")}}">Combobox</a></li>
      </ul>
    </div>

  </div>
</div>
@endsection