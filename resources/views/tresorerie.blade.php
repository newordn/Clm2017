@extends('layout')
@section('body')
<div class="row" style="padding:200px;height: 520px;">
	<div class="card col s6 center-align ">
		<h4>{{$users}} <i class="fa fa-user"></i></h4>
	</div>
	<div class="card center-align col s6">
		<h4><strong>{{$money}}</strong> Francs</h4>
	</div>
	
</div>
@endsection
