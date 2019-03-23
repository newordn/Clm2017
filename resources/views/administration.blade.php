@extends('layout')
@section('body')


<div class="center-align" style="margin-top:15px">
	<a class="waves-effect waves-light btn blue " href="{{'/'}}"><i class="fa fa-backward"></i> Retour</a>
</div>
@php($loginOrSign="/signIn")
@include('loginForm')
<!-- list of users -->
<div class="row padding" >
		<table class="striped bordered">
			<thead>
			<th class="center-align">Nom de l'utilisateur</th>
			<th>Droit</th>
			<th class="center-align">Actions</th>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td class="center-align">{{$user->login}}</td>
					<td >{{$user->right}}</td>
					<td class="center-align">
						<a class="btn-large blue modal-trigger" href="{{'#accessRight'.$user->id}}" >Attribuer des droits</a>
						<a class="btn-large red" href="{{url('/delete/')}}/{{$user->id}}">Supprimer</a>
					</td>
				</tr>

				<!-- Modal Structure -->
				<div id="{{'accessRight'.$user->id}}" class="modal right-align">
					<div class="modal-content">
						<h4 class="center-align">Donner le droit de </h4>
						<form method="post" action="{{route('setRight')}}">
							<select name="right">
								<option value="admin" >ADMINISTRATEUR</option>
								<option value="register" >REGISSEUR</option>
								<option value="normal" selected>ENSEIGNANT</option>
							</select>

							<!-- csrf -->
							<input type="hidden" name="_token" value="{{ csrf_token() }}" >
							<!--csrf-->
							<input type="hidden" value="{{$user->id}}" name="id">
							<button type="submit" class="btn green"><i class="fa fa-check"></i></button>
							<a  class="btn red modal-close"><i class="fa fa-close"></i></a>
						</form>
					</div>
				</div>
			@endforeach
			</tbody>
		</table>


			</div>
</div>
<!-- list of users -->
@endsection

<div style="position:fixed;bottom:3rem;right:1rem">
	<a href="#loginModal" class="btn-floating modal-trigger btn-large waves-effect waves-light blue">
		<i class="fa fa-plus"></i>
	</a>
</div>

@section('footer')
footer_home
@stop
