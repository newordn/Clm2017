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
			<th class="center-align">Actions</th>
			</thead>
			<tbody>
			@foreach($users as $user)
				<tr>
					<td class="center-align">{{$user->login}}</td>
					<td class="center-align"><a class="btn-large red" href="{{url('/delete/')}}/{{$user->id}}">Supprimer</a></td>
				</tr>
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
