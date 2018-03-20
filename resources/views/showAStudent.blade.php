@extends('layout')
@section('body')
<div class="container card" style="margin:auto;">
	<strong class="btn">NOM/SURNAME:</strong> <button class="btn blue">{{$student->last_name}}</button><br/>
	<strong class="btn">PRÉNOM/FIRST NAME:</strong>
	<button class="btn blue">{{$student->first_name}}</button><br/>
	<strong class="btn">CATÉGORIE/GATEGORY:</strong><button class="btn blue">{{$classe->category}}</button><br/>
	<strong class="btn">NIVEAU/LEVEL:</strong><button class="btn blue">{{$classe->level}}</button><br/>
	<strong class="btn">MODE DE PAIEMENT/ MODE OF PAYMENT:</strong><button class="btn blue">{{$account->payment}}</button><br/>
	<strong class="btn">SOMME VERSÉE/AMOUNT PAID:</strong><button class="btn blue">{{$account->amount_paid}}</button><br/>
	<strong class="btn">FRAIS DES COURS/TUITION FEES:</strong><button class="btn blue">{{$account->fees}}</button><br/>
	<strong class="btn">MODULE/MODULE:</strong><button class="btn blue">{{$classe->module}}</button><br/>
	<strong class="btn">TRIMESTRE/TERM:</strong><button class="btn blue">{{$account->trimestre}}</button><br/>
	<strong class="btn"> ASSIDUITÉE/ATTENDANCE :</strong><button class="btn blue">{{$account->absence}}</button><br/>
	<strong class="btn">ARRIÉRÉS D{{ucwords('û')}}S/Fees Owed :</strong><button class="btn blue">{{$account->fees-$account->amount_paid}}</button><br/>
	<div class="center-align">
		 <a href="/pdf_inscription/{{$student->id}}" class="btn blue"><i class="fa fa-download"></i></a>
		<a href="/inscription/modify/{{$student->id}}" class="btn green"><i class="fa fa-pencil"></i></a>
	</div>
</div>
@stop
@section('footer')
        footer_home
        @stop