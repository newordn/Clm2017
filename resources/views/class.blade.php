@extends('layout')
@section('title')
CLASS/CLASSES
@endsection
@section('body')

	<div class="container_margin">
		<h2 class="center-align">Les classes</h2>

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
      <form>
      	<h5>Choississez le numéro du trimestre</h5>
      	 <select>
      	 	<option>1</option>
      	 	<option>2</option>
      	 	<option>3</option>
      	 	<option>4</option>
      	 </select>
      	 <h5>La période du trimestre </h5>
      	 <label for="startDate">De</label>
      	 <input type="date" id="startDate" value="2019-01-01">


      	 <label for="endDate">A</label>
      	 <input type="date" id="endDate" value="2019-04-01">
      </form>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" waves-effect waves-green green btn-flat"><i class="fa fa-check"></i></a>

      <a href="#!" class=" modal-close waves-effect waves-green btn-flat red"><i class="fa fa-close"></i></a>
    </div>
  </div>
@stop
@section('footer')
footer_home
@endsection
