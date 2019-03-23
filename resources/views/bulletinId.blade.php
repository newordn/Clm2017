@extends('layout')
@section('title')
    IDENTIFIANT BULLETIN
@endsection

@section('body')
    <div class="container center-align" style="font-size:50px;margin-top:50px">
        Veuillez noter cet identifiant et le faire parvenir au responsable des impressions
        <br>
        <strong>Identifiant: {{$bulletinId}}</strong>
    </div>
@stop

@section('footer')
    footer_home
@stop
