@extends("layouts.master")

@section("title")
  Auocomplete with jquery only
@endsection

@section("content")

<div class="container">
<ol class="breadcrumb">
  <li><a href="{{route("front")}}">Frontend</a></li>
  <li>Autocomplete</li>
</ol>
  
    {{-- main content --}}
    <section class="filter-wrapper">
      <div class="keyword-wrapper">
      <input type="text" id="keyword" autocomplete="off" placeholder="start typing please..." required />
      <a href="#" target="_blank" id="keyword-button">
        <i class="fa fa-search-plus"></i>
      </a>
      </div>
      <ul id="filter-select" class="filter-select no-value">
      </ul>
      <div id="show"></div>
    </section>

</div>
@endsection

@section("styles")
<style>
  .filter-wrapper, .keyword-wrapper {
  display: flex;
  justify-content: center;
}
.filter-wrapper {
  min-height: 100%;
  flex-flow: column wrap;
  align-items: center;
  position: relative
}
.keyword-wrapper {
  width: 100%;
  position: relative;
}
#keyword {
  border: 1px solid #ccc;
  padding: 10px;
  font: 1.5em 'Arimo', sans-serif;
  width: 50%;
  outline: none;
  transition: border 0.5s ease-in-out
}
#keyword:focus {
  border-top-color: rgba(0,0,0,0);
  border-left-color: rgba(0,0,0,0);
  border-right-color: rgba(0,0,0,0);
}
#keyword-button {
  position: absolute;
  right: 26%;
  top: 50%;
  transform: translateY(-50%);
  font-size: 1.7em;
  color: #8DB9ED
}
#keyword-button:hover {
  color: #ccc
}
.filter-select {
  width: 50%;
  list-style: none;
  font-size: 1.1em;
  color: rgb(105,105,105);
  border: 1px solid #ccc;
  border-top: none;
  /*so things don't jump around*/
  position: absolute;
  left: 25%;
  /*Since we know the wrapper will always be 100% height, we can use half of 100% + half the height of the input*/
  top: calc(50% + 25px);
  /*for a better calculation use JS.  I'm calculating half of the body height - half the height of the input - li padding*/
  max-height: calc(50% - 15px);
  overflow-y: auto;
  background: #fff
}
.filter-select-list {
  cursor: pointer;
  padding: 5px 10px;
}
.filter-select-list:hover {
  background: rgb(155,155,155);
  color: #fff
}
.no-value {
  border: none
}
.list-highlight, .list-highlight:hover {
  background: rgb(55,55,55);
  color: #fff
}
/*some simple responsive designs*/
@media only screen and (max-width: 768px) {
  
  .filter-select, #keyword {
    width: 80%;
  }
  #keyword {
    font-size: 1.3em
  }
  .filter-select {
    font-size: 0.9em;
    left: 10%;
    top: calc(50% + 23px);
  }
  #keyword-button {
    right: 11%
  }
}
@media only screen and (max-width: 480px) {
  
  .filter-select, #keyword {
    width: 95%;
  }
  .filter-select {
    left: 2.5%;
  }
  #keyword-button {
    right: 3.5%
  }
}

</style>
@endsection

@section("scripts")
  <script src="{{asset("front/autocomplete/pure.js")}}"></script>
@endsection