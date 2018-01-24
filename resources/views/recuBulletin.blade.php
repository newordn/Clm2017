@extends('layout')
@section('title')
RECU BULLETIN
@endsection

@section('body')
<div class="container center-align" style="font-size:50px;margin-top:50px">
Vous pouvez a présent télécharger le bulletin en appuyant sur ce bouton <a href="/pdf_bulletin/{{$id}}/{{$decision}}/{{$book}}" class="btn blue"><i class="fa fa-download"></i></a>.
</div>
@stop

@section('footer')
footer_home
@stop
