@extends('layout')
@section('title')
CLASS/CLASSES
@endsection
@section('body')
	<div class="container">
		<h2 class="center-align">Les classes</h2>
		<div class="row">
		@foreach($classes as $class)
			<div class="card col s6  ">
				<div class="card-content">
					<span class="card-title">{{$class->level}} {{$class->category}} {{$class->module}}  {{$class->indice}}</span>
					<p>Date de début : {{$class->start_of_module}} </p>
				</div>
				<div class="card-action">
					<a class="btn-large waves-effect waves-light blue" href="{{'/showClass/'.$termId.'/' .$class->category . '/' . $class->level .'/'. $class->module}}">Ouvrir</a>
					<a class="btn-large waves-effect waves-light red" href="{{'/update_class/'.$termId.'/' .$class->category . '/' . $class->level .'/'. $class->module}}">Modifier</a>
				</div>
			</div>

	@endforeach
		</div>

	</div>
	<div style="position:fixed;bottom:3rem;right:1rem">
		<a href="#classCreationModal" class="btn-floating modal-trigger btn-large waves-effect waves-light blue">
			<i class="fa fa-plus"></i>
		</a>
	</div>
	 <!-- Modal Structure -->
  <div id="classCreationModal" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Ouvrir une classe</h4>
      <form method="post" action="{{url('/new_class')}}">
		  <!--categorie -->
		  <div class="center-align">

					  <label for="category"><strong>CATÉGORIE/CATEGORY</strong></label>
					  <!-- Dropdown Structure -->
			  			<div>
							<div class="row">
								<div class="col s8">
							  <select name="category" id="category">
								  <option value="Juniors" selected>Juniors</option>
								  <option value="Adults" >Adults</option>
								  <option value="Adultes" >Adultes</option>
								  <option value="Special">Special</option>
								  <option value="One-to-one">One-to-One</option>
							  </select>
								</div>
								<div class="col s4">
						  <input name="category_suffix" value="" class="input-field">
								</div>
							</div>
					  </div>
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
				  <option value="Advanced Continuation">Advanced Continuation</option>
				  <option value="Perfectionnement">Perfectionnement</option>
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



		  <!-- start of module -->
		  <div class=" center-align">
			  <label for="start_of_module"><strong>DEBUT DU MODULE</strong></label>
			  <input type="date" name="start_of_module"  placeholder="2019-04-03">
		  </div>
		  <!-- start of module -->

		  <!-- Frais des cours -->
		  <div class="input-field">
			  <input type="text" name="amount" id="amount" >
			  <label for="amount" style="color:black">FRAIS DES COURS/TUITION FEES</label>
		  </div>
		  <!-- Frais des cours -->

		  <!-- term id-->
		  	<input type="hidden" name="term_id" value="{{$termId}}">
		  <!-- term id-->
		  <!-- csrf -->
		  <input type="hidden" name="_token" value="{{ csrf_token() }}" >
		  <!--csrf-->

			  <div class="modal-footer">
				  <button href="#!" class=" waves-effect waves-green green btn-flat" type="submit"><i class="fa fa-check"></i></button>

				  <a href="#!" class=" modal-close waves-effect waves-green btn-flat red"><i class="fa fa-close"></i></a>
			  </div>
      </form>
    </div>
  </div>
@stop
@section('footer')
footer_home
@endsection
