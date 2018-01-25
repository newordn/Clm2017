@extends('layout')
@section('body')
<div class="row" style="padding:10px;">
	<h4 class="center-align">NOMBRE D'APPRENANT(E)S ET TRÉSORERIE DANS TOUS LE CENTRE.</h4>
	<div class="card col s6 center-align ">
		<h4>{{$users}} <i class="fa fa-user"></i></h4>
	</div>
	<div class="card center-align col s6">
		<h4><strong>{{$money}}</strong> FRANCS</h4>
	</div>	
</div>

<div class="row center-align" style="padding:0px 10px 10px 10px;">
	<h4 >NOMBRE D'APPRENANT(E)S ET TRÉSORERIE PAR CLASSE.</h4>
	@php($i=0)
	@foreach($classes as $classe)
	<h5 style="color:blue;"><button class="btn blue">{{$classe->category}} {{$classe->level}} {{$classe->module}}</button></h5>
	<div class="card col s6 center-align ">
		<h4> {{count($classe->eleves)}} <i class="fa fa-user"></i></h4>
	</div>
	<div class="card center-align col s6">
		<h4><strong>{{$amounts[$i]}}</strong> FRANCS</h4>
		@php($i=$i+1)
	</div>
	@endforeach
</div>

@stop
