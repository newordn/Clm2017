@extends('layout')

@section('body')
<div class="row  center-align">
	<div class="col s12 ">
			<h4><strong>{{$level}} {{$category}} {{$module}}</strong></h4>
		<h5>Montant des cours: <strong>{{$amount}}</strong> Fcfa; <strong>{{count($students)}}</strong> APPRENANT(E)S.</h5>
		</div>
</div>
<div class="row">

	<div class=" col s10 left-align"><a href="/pdf_liste_students/" class="btn blue">Imprimer</a></div>
	<div class=" col s2 right-align"><a href="/pdf_liste_students/" class="btn blue">Cours</a></div>

</div>
<div class=" row container center-align" style="margin-bottom: 4rem;">

		<table class="striped bordered " style="border:1px solid gray" >
			<thead style="border:1px solid gray">
			<tr >
				<th style="border:1px solid gray">Noms et Prénoms</th>
				<th style="border:1px solid gray">Matricule</th>
				<th style="border:1px solid gray">Absences</th>
				<th style="border:1px solid gray" class="center-align">Actions</th>
			</tr>
			</thead>
			<tbody >
			@foreach($students as $student)
			<tr >
				<td style="border:1px solid gray">{{$student->last_name}} {{$student->first_name}}</td>
				<td style="border:1px solid gray">{{$student->matricule}}</td>
				<td style="border:1px solid gray">{{count($student->absences)}}
					<a href="{{'/absence/'.$student->id}}" class="btn brown">
						<i class="fa fa-eye"></i>
					</a></td>
				<td class="center-align">
					<a class="btn blue" href="{{'/bulletin/'.$student->id}}">
						<i class="fa fa-address-card-o"></i>
					</a>
					<a href="{{'/search/'.$student->id}}" class="btn green">
						<i class="fa fa-search"></i>
					</a>
					<a href="{{'/forward/'.$student->id}}" class="btn blue">
						<i class="fa fa-forward"></i>
					</a>
				</td>
			</tr>

			@endforeach
			</tbody>
		</table>


</div>


<div style="position:fixed;bottom:3rem;right:1rem">
	<a href="#studentCreationModal" class="btn-floating modal-trigger btn-large waves-effect waves-light blue">
		<i class="fa fa-plus"></i>
	</a>
</div>


<!-- Modal Structure -->
<div id="studentCreationModal" class="modal">
	<div class="modal-content">
		<h4 class="center-align">Inscrire un(e) apprenant(e)</h4>
		<form method="post" action="{{route('inscriptionPost')}}">
			<!-- nom -->
				<div class="center-align">
					<label for="last_name" style="color:black">NOM/SURNAME</label>
					<input id="last_name" type="text" name="last_name" placeholder="ABBA">

				</div>
				<!-- nom -->

				<!-- prenom -->
				<div class="center-align">
					<label for="first_name" style="color:black">PRÉNOM/FIRST NAME</label>
					<input id="first_name" type="text"  name="first_name" @yield('first_name') placeholder="SALI">

				</div>
				<!-- prenom -->

				<!-- mode de paiement -->
				<div class="center-align" style="margin-bottom: 1rem;">
					<label for="payment">MODE DE PAIEMENT/ MODE OF PAYMENT</label>
					<select  name="payment" id="payment" @yield('payment')>
						<option value="Comptant/Cash payment" selected> Comptant/Cash payment</option>
						<option value="Virement Bancaire/Bank Transfer">Virement Bancaire/Bank Transfer</option>
						<option value="Chèque/Cheque">Chèque/Cheque</option>
						<option value="Autres/Others">Autres/Others</option>
					</select>
				</div>
				<!-- mode de paiement -->


			<!-- mode de paiement -->
			<div class="center-align" >
				<label for="paymentSpec">SPECIFICATION DE PAIEMENT</label>
				<input type="text" name="paymentSpec" id="paymentSpec" placeholder="Somme totale">
			</div>
			<!-- mode de paiement -->

				<!-- somme versee -->
				<div class=" center-align">
					<label for="somme_versee" style="color:black">SOMME VERSÉE/AMOUNT PAID</label>
					<input id="somme_versee" type="text" name="amount_paid" placeholder="25000" required>
				</div>
				<!-- somme versee -->

				<input type="hidden" name="trimestre" value="{{$termId}}" >
				<input type="hidden" name="level" value="{{$level}}">
				<input type="hidden" name="category" value="{{$category}}">
				<input type="hidden" name="amount" value="{{$amount}}">
				<input type="hidden" name="module" value="{{$module}}">

				<!-- csrf -->
				<input type="hidden" name="_token" value="{{ csrf_token() }}" >
				<!--csrf-->
				<!--submit -->
				<div class="input-field right-align">
					<button class="btn-floating btn-large green"><i class="fa fa-check"></i></button>
				</div>
				<!--submit-->
		</form>
	</div>
</div>
@stop
