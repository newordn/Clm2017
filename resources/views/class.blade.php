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
					<a class="btn-large waves-effect waves-light blue" href="{{'/showClass/'.$termId. '/' .$class->category . '/' . $class->level .'/'. $class->module}}">Ouvrir</a>
					<a class="btn-large waves-effect waves-light red" href="{{'/term/'.$termId}}">Modifier</a>
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
		  <div class=" input-field">
			  <label for="category" style="color:black">CATÉGORIE/GATEGORY</label>
			  <!-- Dropdown Structure -->
			  <input name="category" id="category" type="text">

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
		  <div class="input-field">
			  <input id="module" type="text"  name="module">
			  <label for="module" style="color:black">MODULE/MODULE</label>
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
			  <input type="date" name="start_of_module" value="2019-04-03">
		  </div>
		  <!-- start of module -->

		  <!-- Frais des cours -->
		  <div class="input-field">
			  <input type="text" name="amount" id="amount">
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
