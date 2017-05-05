@extends("layouts.master")

@section("title")
Dropzonejs experiments
@endsection

@section("content")

<div class="container">
<ol class="breadcrumb">
  <li><a href="{{route("front")}}">Frontend</a></li>
  <li>Dropzone</li>
</ol>
  <form action="{{route("backend.dropzone")}}"
        class="dropzone"
        id="dropzone"
        method="post" enctype="multipart/form-data">
        {{csrf_field()}}
          <div class="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
</div>
@endsection

@section("scripts")
  <script src="{{asset("vendors/dropzone/dist/dropzone.js")}}"></script>
  <script>
    var dropzone = new Dropzone("form#dropzone", {
      url: "{{route("backend.dropzone")}}",
      paramName: "file",
      maxFileSize: 2,
      addRemoveLinks: true,
      dictRemoveFile: "Удалить файл",
      dictMaxFilesExceeded: "Достигнуто максимальное количество файлов",
      dictCancelUpload: "Отменить загрузку",
      dictFileTooBig: "Слишком большой файл",
      dictInvalidFileType: "Не поддерживаемый формат файлов"
    })
  </script>
@endsection

@section('styles')
  <link rel="stylesheet" href="{{asset("vendors/dropzone/dist/min/dropzone.min.css")}}">
  <style>
    .dz-image, .dz-image img{
      width: 200px !important;
      height: 200px !important;
      border-radius: 0px !important;
    }
  </style>
@endsection