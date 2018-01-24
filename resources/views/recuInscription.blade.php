@extends('layout')
@section('title')
RECU D'INSCRIPTION
@stop

@section('body')
	<!-- impression du recu d'inscription -->
		<div class=" center-align card" style="font-size:40px;margin-top:50px;padding:10px;background-color: rgb(87,100,144);">
		Vous pouvez a présent télécharger le recu d'inscription en appuyant sur ce bouton <a href="/pdf_inscription/{{$id}}" class="btn blue"><i class="fa fa-download"></i></a>.
		</div>
	<!-- impression du recu d'inscription -->
	<!-- modification de l'inscription -->
		<div class=" center-align card" style="font-size:40px;margin-top:10px;padding:10px;background-color: rgb(200,100,144);">
		Vous pouvez effectuer des modifications sur l'inscription en appuyant sur ce bouton <a href="/inscription/modify/{{$id}}" class="btn green"><i class="fa fa-pencil"></i></a>.
		</div>
	<!-- modification de l'inscription -->
</div>
@stop

@section('footer')
footer_home
@stop
