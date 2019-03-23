@extends('layout')

@section('body')
<div class="row  center-align">
	<div class="col s12 ">
			<h4><strong>{{$level}} {{$category}} {{$module}}</strong></h4>
		<h5>Montant des cours: <strong>{{$amount}}</strong> Fcfa; <strong>{{count($students)}}</strong> APPRENANT(E)S.</h5>
		</div>
</div>
<div class="row">

	<div class=" col s10 left-align"><a href="/pdf_liste_students/{{$classeId}}" class="btn blue">Imprimer</a></div>
	<div class=" col s2 right-align"><a href="/courses" class="btn blue">Cours</a></div>

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
				<td style="border:1px solid gray">{{count($student->absences)}} &nbsp;&nbsp;
					<a href="{{'/absence/'.$student->id}}" class="btn red">
						<i class="fa fa-eye-slash"></i>
					</a>
					<a href="{{'/presence/'.$student->id}}" class="btn blue ">
						<i class="fa fa-eye"></i>
					</a>
				</td>
				<td class="center-align">
					<a class="btn blue" href="{{'/bulletin/'.$student->id}}">
						<i class="fa fa-address-card-o"></i>
					</a>
					<a href="{{'/search/'.$student->id}}" class="btn green">
						<i class="fa fa-search"></i>
					</a>
					<a href="{{'#forwardingModal'. $student->id}}" class="btn blue  modal-trigger">
						<i class="fa fa-forward"></i>
					</a>
				</td>
				<div id="{{'forwardingModal'. $student->id}}" class="modal">
					<div class="modal-content">
						<h5 class="center-align">Transferer un apprenant dans une autre classe</h5>
						<form method="post" action="{{'/forward/'.$student->id}}">
							<!--categorie -->
							<div class="center-align">
								<label for="category"><strong>CATÉGORIE/CATEGORY</strong></label>
								<!-- Dropdown Structure -->
								<select name="category" id="category">
									<option value="Juniors" selected>Juniors</option>
									<option value="Adults" >Adults</option>
									<option value="Adultes" >Adultes</option>
									<option value="Special">Special</option>
									<option value="One-to-one">One-to-One</option>
								</select>

							</div>
							<!-- categorie -->

							<!-- niveau -->
							<div class="center-align">
								<label for="niveau"><strong>NIVEAU/LEVEL</strong></label>
								<!-- Dropdown Structure -->
								<select name="level" id="niveau" >
									<option selected>Débutant</option>
									<option>Foundation</option>
									<option>Elémentaire</option>
									<option>Elementary</option>
									<option>Pré Intermédiaire</option>
									<option>Lower Intermediate</option>
									<option>Intermédiaire</option>
									<option>Intermediate</option>
									<option>Avancé</option>
									<option>Upper Intermediate</option>
									<option>Supérieur</option>
									<option>Advanced</option>
									<option>Perfectionnement</option>
									<option>Advanced Continuation</option>

								</select>
							</div>
							<!-- niveau -->


							<!-- module -->
							<div class="center-align">
								<label for="module"><strong>MODULE/MODULE</strong></label>
								<select id="module" name="module">
									<option  value="A1">A1</option>
									<option  value="A2">A2</option>
									<option  value="A3">A3</option>
									<option  value="A4">A4</option>
									<option  value="A5">A5</option>
									<option  value="A6">A6</option>
									<option  value="B1">B1</option>
									<option  value="B2">B2</option>
									<option  value="B3">B3</option>
									<option  value="B4">B4</option>
									<option  value="B5">B5</option>
									<option  value="B6">B6</option>
								</select>
							</div>
							<!-- module -->

							<!-- indice -->
							<div class="center-align">
								<label for="indice"><strong>INDICE DE LA CLASSE</strong></label>
								<select name="indice" id="indice" >
									<option selected>&nbsp;</option>
									<option>EEV</option>
									<option>LEV</option>
								</select>
							</div>
							<!-- indice -->

							<div class="center-align">

								<label for="trimestre"><strong>TRIMESTRE</strong></label>
								<!-- term id-->
								<input type="number" name="term_id" value="{{$termId}}">
								<!-- term id-->
							</div>
							<!-- csrf -->
							<input type="hidden" name="_token" value="{{ csrf_token() }}" >
							<!--csrf-->
							<!--submit -->
							<div class="input-field right-align">
								<button class="btn-floating btn-large red modal-close"><i class="fa fa-close"></i></button>
								<button class="btn-floating btn-large green"><i class="fa fa-check"></i></button>
							</div>
							<!--submit-->
						</form>
					</div>
				</div>

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
