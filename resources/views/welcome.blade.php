@extends('layout')
        @section('body')
        	@php($loginOrSign="login")
			@include('loginForm')
                <div class="conteneur">
               <div class="row">
                   <div class="col s6 right-align">
                       <a href="{{route('courses')}}"><div class="cercle  blue"><strong>COURSES/COURS</strong></div></a>
                   </div>

                   <div class="col s6 left-align">
                       <a href="{{route('terms')}}"><div class="cercle  yellow"><strong>TRIMESTRE/TERMS</strong></div></a>
                   </div>
               </div>
               <div class="row">

                   <div class="col s6 right-align">
                       <a href="{{url('administration')}}"> <div class="cercle red"><strong>ADMINISTRATION/ADMINISTRATION</strong></div></a>
                   </div>
                   <div class="col s6 left-align">
                       <a href="{{route('tresorerie')}}"><div class="cercle green"><strong>STATISTIQUES/INSIGHTS</strong></div></a>
                   </div>
               </div>
                </div>

        @stop
        @if( ( Session::get('authentificated')=='no') or (empty(Session::get('authentificated'))))
           @section('showLogin')
           	<script type="text/javascript">$('.modal').modal({dismissible:false});$('#loginModal').modal('open');</script>
           @endsection
         @endif
