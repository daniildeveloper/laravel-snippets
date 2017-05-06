@extends("layouts.master")

@section("title")
  Autocomplete with jqueryui
@endsection

@section("content")

<div class="container">
<ol class="breadcrumb">
  <li><a href="{{route("front")}}">Frontend</a></li>
  <li>Autocomplete with jqueryui</li>
</ol>
  
    {{-- main content --}}
    <section class="filter-wrapper">
      <div class="ui-widget">
        <label for="tags">Tags: </label>
        <input id="tags">
      </div>
    </section>

</div>
@endsection

@section("styles")
<style>

</style>
@endsection

@section("scripts")
{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
<script src="{{asset("vendors/jquery/dist/jquery.min.js")}}"></script>
  <script src="{{asset("front/autocomplete/jqueryui.js")}}"></script>
<script src="{{asset("vendors/jquery-ui/ui/minified/jquery-1-7.js")}}"></script>
  <script src="{{asset("front/autocomplete/jqueryui.user.js")}}"></script>
@endsection