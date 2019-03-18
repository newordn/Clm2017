@extends('layout')
@section('title')
CLASS/CLASSES
@endsection
@section('body')

	<div class="container row">
		<h2 class="center-align">Les trimestres</h2>

		<div class="center-align" style="margin-top:15px">
			<a class="waves-effect waves-light btn blue " href="{{'/'}}"><i class="fa fa-backward"></i> Retour</a>
		</div>
		@foreach($terms as $term)

				<div class="card col s4 "
				@if(!$term->status) style="background-color:rgb(200,200,200)" @endif>
					<div class="card-content">
						<span class="card-title">Trimestre {{$term->term_num}}</span>
						<p>Date de début : {{$term->start_term}} </p>
						<p>Date de fin: {{$term->end_term}}</p>
					</div>
					<div class="card-action">
						@if($term->status)
						<a class="btn-large waves-effect waves-light blue" href="{{'/term/'.$term->id}}">Ouvrir</a>
						@else
							<a class="btn-large waves-effect waves-light blue modal-trigger" href="{{'#accessRightModal'.$term->id}}">Ouvrir</a>

							<!-- Modal Structure -->
							<div id="{{'accessRightModal'.$term->id}}" class="modal">
								<div class="modal-content">
									<h4 class="center-align">Vous devez être le directeur</h4>
									<form method="post" action="{{'/open_term/'.$term->id}}">
										<input type="text" placeholder="Login" name="login">
										<input type="text" placeholder="Mot de passe" name="password">
										<!-- csrf -->
										<input type="hidden" name="_token" value="{{ csrf_token() }}" >
										<!--csrf-->
										<div class="right-align">
											<button type="button" class="btn-large  waves-effect waves-light red ">
												<i class="fa fa-close"></i>
											</button>
											<button type="submit" class="btn-large  waves-effect waves-light green ">
												<i class="fa fa-check"></i>
											</button>
										</div>
									</form>
								</div>
							</div>


						@endif
							<div id="{{'accessCloseModal'.$term->id}}" class="modal">
								<div class="modal-content">
									<h4 class="center-align">Vous devez être le directeur</h4>
									<form method="post" action="{{'/close_term/'.$term->id}}">
										<input type="text" placeholder="Login" name="login">
										<input type="text" placeholder="Mot de passe" name="password">
										<!-- csrf -->
										<input type="hidden" name="_token" value="{{ csrf_token() }}" >
										<!--csrf-->
										<div class="right-align">
											<button type="button" class="btn-large  waves-effect waves-light red ">
												<i class="fa fa-close"></i>
											</button>
											<button type="submit" class="btn-large  waves-effect waves-light green ">
												<i class="fa fa-check"></i>
											</button>
										</div>
									</form>
								</div>
							</div>
						<a class="btn-large waves-effect waves-light red modal-trigger" href="{{'#accessCloseModal'.$term->id}}">Fermer</a>
					</div>
				</div>
		@endforeach
	</div>
	<div style="position:fixed;bottom:3rem;right:1rem">
		<a href="#termCreationModal" class="btn-floating modal-trigger btn-large waves-effect waves-light blue">
			<i class="fa fa-plus"></i>
		</a>
	</div>


	 <!-- Modal Structure -->
  <div id="termCreationModal" class="modal">
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
			  <button href="#" class=" waves-effect waves-green green btn-flat" type="submit"><i class="fa fa-check"></i></button>

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
