@extends('layout')
@section('title')
    Cours
@endsection
@section('body')
    <div class="center-align" style="margin-top:15px">
        <a class="waves-effect waves-light btn blue " href="{{'/'}}"><i class="fa fa-backward"></i> Retour</a>
    </div>

    <div class="conteneur">
        <div class="row">
            <div class="col s6 right-align">
                <a href="{{url('/courses/french')}}"><div class="cercle  green"><strong>FRENCH COURSES</strong></div></a>
            </div>

            <div class="col s6 left-align">
                <a href="{{url('/courses/english')}}"><div class="cercle  yellow"><strong>ENGLISH COURSES</strong></div></a>
            </div>
        </div>
        <a href="{{ url('/course/robots.txt') }}" target="_blank"> Click to open image </a>

    </div>
@endsection