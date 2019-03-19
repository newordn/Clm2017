@extends('layout')
@section('body')

	<div class="center-align" style="margin-bottom: 1rem;">
		<a class="btn-large blue" href="{{'/showClass/'. $termId. '/'.$classe->category. '/' .$classe->level. '/' .$classe->module}}">Retour</a>
	</div>
<div class="container" style="margin-bottom: 10rem" >

	<table class="striped bordered " style="border:1px solid gray" >

		<tr>

			<td><strong>NOM/SURNAME</strong></td>
			<td>{{$student->last_name}}</td>
		</tr>
		<tr>
			<td><strong>PRÉNOM/FIRST NAME</strong></td>
			<td>{{$student->first_name}}</td>

		</tr>
		<tr>
			<td><strong>CATÉGORIE/GATEGORY</strong></td>

			<td>{{$classe->category}}</td>

		</tr>
		<tr>
			<td><strong>NIVEAU/LEVEL</strong></td>
			<td>{{$classe->level}}</td>
		</tr>

		<tr>
			<td><strong>INDICE DE LA CLASSE</strong></td>
			<td>{{$classe->indice}}</td>
		</tr>
		<tr>
			<td><strong>MODE DE PAIEMENT/ MODE OF PAYMENT</strong></td>

			<td>{{$account->payment}}</td>
		</tr>
		<tr>
			<td><strong>SPECIFICATION DU PAIEMENT</strong></td>

			<td>{{$account->paymentSpec}}</td>
		</tr>
		<tr>
			<td><strong>SOMME VERSÉE/AMOUNT PAID</strong></td>
			<td>{{$account->amount_paid}}</td>
		</tr>
		<tr>
			<td><strong>FRAIS DES COURS/TUITION FEES</strong></td>
			<td>{{$classe->amount}}</td>
		</tr>
		<tr>
			<td><strong>MODULE/MODULE</strong></td>
			<td>{{$classe->module}}</td>
		</tr>
		<tr>
			<td><strong>TRIMESTRE/TERM</strong></td>
			<td>{{$termId}}</td>
		</tr>
		<tr>
			<td><strong>ABSENCES </strong></td>
			<td>{{count($student->absences)}}</td>
		</tr>
		<tr>
			<td><strong>ARRIÉRÉS D{{ucwords('û')}}S/Fees Owed :</strong> </td>
			<td>{{$classe->amount-$account->amount_paid}}</td>
		</tr>
		<tr>
			<td><strong>ACTIONS</strong> </td>
			<td>
				<a href="/pdf_inscription/{{$student->id}}" class="btn blue"><i class="fa fa-download"></i></a>
				<a href="/inscription/modify/{{$student->id}}" class="btn green"><i class="fa fa-pencil"></i></a>
			</td>
		</tr>
	</table>
	</div>
@stop
@section('footer')
        footer_home
        @stop