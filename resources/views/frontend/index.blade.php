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
  </div>
</div>
@endsection