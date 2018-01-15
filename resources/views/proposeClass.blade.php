@extends('layout')
@section('body')
<div class="container center-align" style="margin-top:50px">
	@php($i=0)
	
	@foreach($modules as $module )
		<a class="btn" href="/showClass/{{$category}}/{{$level}}/{{$module}}">{{$module}}</a><br/>
		<span style="display:none">@php($i=$module[1])</span>
	@endforeach
	@php($i = $i +1)
	<form action="/newClass" method="POST">
	 <!-- start of module -->
        <div class="input-field">
        	<h2>Début du module/ Start of module</h2>
          <input id="start_of_module" type="date"  name="start_of_module">
        </div>
      <!-- start of module -->

      <input type="hidden" value="{{$category}}" name="category">
      <input type="hidden" value="{{$level}}" name="level">
      <input type="hidden" value="{{$radical}}{{$i}}" name="module">
      <!-- csrf -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
      <!--csrf-->
   
	<button type="submit" class="waves-effect waves-light btn btn-large blue modal-trigger" "><i class="fa fa-plus"></i></button>

	</form>
</div>
@stop

@section('footer')
footer_home
@stop