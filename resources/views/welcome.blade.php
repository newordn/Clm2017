@extends('layout')
        @section('body')
        	@php($loginOrSign="login")
			@include('loginForm')
			
           <div class="conteneur">
                 <a href="{{route('inscription')}}"><div class="cercle green"><strong>INSCRIPTION/INSCRIPTION</strong></div></a>
               <a href="{{url('administration')}}"> <div class="cercle red"><strong>ADMINISTRATION/ADMINISTRATION</strong></div></a> <a href="{{route('class')}}"><div class="cercle class yellow"><strong>CLASSES/CLASS</strong></div></a>
            </div>
        @stop
        @if( ( Session::get('authentificated')=='no') or (empty(Session::get('authentificated'))))
           @section('showLogin')
           	<script type="text/javascript">$('.modal').modal({dismissible:false});$('#loginModal').modal('open');</script>
           @endsection
         @endif
        @section('footer')
        footer_home
        @stop

       
          
              