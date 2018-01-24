@extends('layout')
@section('body')

<div class="center-align" style="margin-top:15px">
	<a class="waves-effect waves-light btn  left-align" href="{{route('tresorerie')}}">TRESORERIE</a>
	<a class="waves-effect waves-light btn blue modal-trigger" href="#loginModal"><i class="fa fa-plus"></i></a>
</div>
@php($loginOrSign="/signIn")
@include('loginForm')
<!-- list of users -->
<div class="row padding" >
	@foreach($users as $user)
		<div class="card col s4 center-align">
		<i><strong>Login: </strong></i>	<button class="btn">{{$user->login}}</button		<i><strong>Password:</strong></i>	<button class="btn">{{$user->password}}</button>
	
	<a href="{{url('/delete/')}}/{{$user->id}}"><i class="fa fa-times" style="color:red"></i></a>

			</div>
	@endforeach
</div>
<!-- list of users -->
@endsection
@section('footer')
footer_home
@endsection
