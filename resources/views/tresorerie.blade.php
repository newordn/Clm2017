@extends('layout')
@section('body')
<div class="row container" style="padding:10px;margin-bottom: 4rem;">

	<div class="center-align" style="margin-top:15px">
		<a class="waves-effect waves-light btn blue " href="{{'/'}}"><i class="fa fa-backward"></i> Retour</a>
	</div>
	<h4 class="center-align" style="margin-bottom:2rem;" >Statistique du Centre Linguistique de Maroua en général</h4>
	<table class="striped bordered " style="border:1px solid gray" >
		<thead style="border:1px solid gray">
		<tr style="border:1px solid gray">
			<th style="border:1px solid gray">Groupes d'utilisateurs</th>
			<th style="border:1px solid gray" class="center-align">Nombre d'apprenants</th>
			<th style="border:1px solid gray" class="center-align">Caisse</th>
		</tr>
		</thead>
		<tbody style="border:1px solid gray">
		<tr style="border:1px solid gray">
			<td style="border:1px solid gray">Centre Linguistique</td>
			<td style="border:1px solid gray" class="center-align">{{$users}}</td>
			<td style="border:1px solid gray" class="center-align"><strong>{{$money}}</strong> Francs</td>
		</tr>
		</tbody>
	</table>

	<h4 class="center-align" style="margin-bottom:2rem;" >Statistique du Centre Linguistique de Maroua par trimestre</h4>
		@php($j=0)

	@php($i=0)
	@foreach($terms as $term)
		<h4 class="center-align">Trimestre {{$term->term_num}}</h4>
	<table class="striped bordered " style="border:1px solid gray" >
		<thead style="border:1px solid gray">
		<tr style="border:1px solid gray">
			<th style="border:1px solid gray">Groupes d'utilisateurs</th>
			<th style="border:1px solid gray" class="center-align">Nombre d'apprenants</th>
			<th style="border:1px solid gray">Caisse</th>
		</tr>
		</thead>
		<tbody style="border:1px solid gray">
		<tr style="border:1px solid gray">
			<td style="border:1px solid gray">Centre Linguistique</td>
			<td style="border:1px solid gray" class="center-align">{{$studentNumber[$j]}}</td>
			<td style="border:1px solid gray"><strong>{{$studentMoney[$j]}}</strong> Francs</td>
		</tr>
		@foreach($classess[$j] as $classe)
		<tr style="border:1px solid gray">
			<td style="border:1px solid gray">{{$classe->category}} {{$classe->level}} {{$classe->module}} {{$classe->indice}}</td>

					<td style="border:1px solid gray" class="center-align"> {{count($classe->eleves)}} </td>

				<td style="border:1px solid gray"><strong>{{$amounts[$i]}}</strong> Francs</td>


		</tr>
		@php($i=$i+1)
		@endforeach
		</tbody>
	</table>

		@php($j=$j+1)
		@endforeach
</div>


@stop
