@extends('layout')
@section('body')
<div class="container" style="margin-bottom: 10rem" >
	<table class="striped bordered " style="border:1px solid gray" >

		<tr>

			<td>NOM/SURNAME</td>
			<td>{{$student->last_name}}</td>
		</tr>
		<tr>
			<td>PRÉNOM/FIRST NAME</td>
			<td>{{$student->first_name}}</td>

		</tr>
		<tr>
			<td>CATÉGORIE/GATEGORY</td>

			<td>{{$classe->category}}</td>

		</tr>
		<tr>
			<td>NIVEAU/LEVEL</td>
			<td>{{$classe->level}}</td>
		</tr>
		<tr>
			<td>MODE DE PAIEMENT/ MODE OF PAYMENT</td>

			<td>{{$classe->payment}}</td>
		</tr>
		<tr>
			<td>SPECIFICATION DU PAIEMENT</td>

			<td>{{$classe->paymentSpec}}</td>
		</tr>
		<tr>
			<td>SOMME VERSÉE/AMOUNT PAID</td>
			<td>{{$account->amount_paid}}</td>
		</tr>
		<tr>
			<td>FRAIS DES COURS/TUITION FEES</td>
			<td>{{$account->fees}}</td>
		</tr>
		<tr>
			<td>MODULE/MODULE</td>
			<td>{{$classe->module}}</td>
		</tr>
		<tr>
			<td>TRIMESTRE/TERM</td>
			<td>{{$account->trimestre}}</td>
		</tr>
		<tr>
			<td>ASSIDUITÉE/ATTENDANCE </td>
			<td>{{$account->absence}}</td>
		</tr>
		<tr>
			<td>ARRIÉRÉS D{{ucwords('û')}}S/Fees Owed : </td>
			<td>{{$account->fees-$account->amount_paid}}</td>
		</tr>
		<tr>
			<td>ACTIONS </td>
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