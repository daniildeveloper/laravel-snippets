@extends("layouts.master")

@section("title")
Dropzonejs experiments
@endsection

@section("content")
<form action="{{route("backend.dropzone")}}"
      class="dropzone"
      id="dropzone"
      method="post" enctype="multipart/form-data">
      {{csrf_field()}}
        <div class="fallback">
          <input name="file" type="file" multiple />
        </div>
      </form>
@endsection

@section("scripts")
  <script src="{{asset("vendors/dropzone/dist/min/dropzone.min.js")}}"></script>
  <script>
    var myDropzone = new Dropzone("div#dropzone", {
      url: "{{route("backend.dropzone")}}"
    })
    Dropzone.options.myAwesomeDropzone = {
      paramName: "file",
      // maxFileSize: 2,
      addRemoveLinks: true,
  </script>
@endsection

@section('styles')
  <link rel="stylesheet" href="{{asset("vendors/dropzone/dist/min/dropzone.min.css")}}">
@endsection