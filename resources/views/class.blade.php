@extends('layout')
@section('title')
CLASS/CLASSES
@endsection
@section('body')
	<div class="container">
		<h2 class="center-align">Les classes</h2>
		<div class="row">
		@foreach($classes as $class)
			<div class="card col s4 margin-right ">
				<div class="card-content">
					<span class="card-title">{{$class->level}} {{$class->category}} {{$class->module}}</span>
					<p>Date de début : {{$class->start_of_module}} </p>

				</div>
				<div class="card-action">
					<a class="btn-large waves-effect waves-light blue" href="{{'/term/'.$termId}}">Ouvrir</a>
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
		  <!-- Frais des cours -->
		  <div class="input-field">
			  <input type="text" name="amount" id="amount">
			  <label for="amount" style="color:black">FRAIS DES COURS/TUITION FEES</label>
		  </div>
		  <!-- Frais des cours -->
		  <!-- module -->
		  <div class="input-field">
			  <input id="module" type="text"  name="module">
			  <label for="module" style="color:black">MODULE/MODULE</label>
		  </div>
		  <!-- module -->
		  <!--categorie -->
		  <div class=" center-align">
			  <label for="category"><strong>CATÉGORIE/GATEGORY</strong></label>
			  <!-- Dropdown Structure -->
			  <select name="category" id="category" @yield('category')>
				  <option selected>Juniors/Juniors</option>
				  <option>Adultes/Adults</option>
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

			  <!-- start of module -->
			  <div class=" center-align">
				  <label for="start_of_module"><strong>Début du module</strong></label>
				  <input type="date" name="start_of_module" value="2019-04-03">
			  </div>
			  <!-- start of module -->
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
