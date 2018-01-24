@extends('layout')
@section('title')
RECU D'INSCRIPTION
@stop

@section('body')
<div class="container center-align" style="font-size:50px;margin-top:50px">
Vous pouvez a présent télécharger le recu d'inscription en appuyant sur ce bouton <a href="/pdf_inscription/{{$id}}" class="btn blue"><i class="fa fa-download"></i></a>.
</div>
@stop

@section('footer')
footer_home
@stop