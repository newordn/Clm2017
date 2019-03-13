@extends('layout')
@section('title')
CLASS/CLASSES
@endsection
@section('body')

	<div class="container row">
		<h2 class="center-align">Les trimestres</h2>
		@foreach($terms as $term)

				<div class="card col s4 margin-right "
				@if(!$term->status) style="background-color:rgb(200,200,200)" @endif>
					<div class="card-content">
						<span class="card-title">Trimestre {{$term->term_num}}</span>
						<p>Date de début : {{$term->start_term}} </p>
						<p>Date de fin: {{$term->end_term}}</p>
					</div>
					<div class="card-action">

						<a class="btn-large waves-effect waves-light blue" href="{{route('class')}}">Ouvrir</a>
						<a class="btn-large waves-effect waves-light red" href="{{'/close_term/'.$term->id}}">Fermer</a>
					</div>
				</div>

		@endforeach
	</div>
	<div style="position:fixed;bottom:3rem;right:1rem">
		<a href="#classCreationModal" class="btn-floating modal-trigger btn-large waves-effect waves-light blue">
			<i class="fa fa-plus"></i>
		</a>
	</div>
	 <!-- Modal Structure -->
  <div id="classCreationModal" class="modal">
    <div class="modal-content">
      <h4 class="center-align">Ouvrir un trimestre</h4>
      <form method="post" action="{{route('termSave')}}">
      	<h5>Choississez le numéro du trimestre</h5>
      	 <select name="term_num">
      	 	<option value="1">1</option>
      	 	<option value="2">2</option>
      	 	<option value="3">3</option>
      	 	<option value="4">4</option>
      	 </select>
      	 <h5>La période du trimestre </h5>
      	 <label for="startDate">De</label>
      	 <input type="date" name="start_term" id="startDate" value="2019-01-01">


      	 <label for="endDate">A</label>
      	 <input type="date" name="end_term" id="endDate" value="2019-04-01">
		  <div class="modal-footer">
			  <button href="#!" class=" waves-effect waves-green green btn-flat" type="submit"><i class="fa fa-check"></i></button>

			  <a href="#!" class=" modal-close waves-effect waves-green btn-flat red"><i class="fa fa-close"></i></a>
		  </div>

		  <!-- csrf -->
		  <input type="hidden" name="_token" value="{{ csrf_token() }}" >
		  <!--csrf-->
      </form>
    </div>

  </div>
@stop
@section('footer')
footer_home
@endsection
