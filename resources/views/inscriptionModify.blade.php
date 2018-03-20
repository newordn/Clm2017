@extends('inscriptionLayout')
@section('routeInscriptionModification')
"{{route('inscriptionModifyPost')}}"
@stop

@section('last_name')
value="{{$eleve->last_name}}"
@stop

@section('first_name')
value="{{$eleve->first_name}}"
@stop

@section('payment')
value="{{$account->payment}}"
@stop

@section('somme_versee')
value="{{$account->amount_paid}}"
@stop

@section('category')
value="{{$classe->category}}"
@stop

@section('level')
value="{{$classe->level}}"
@stop

@section('fees')
value="{{$account->fees}}"
@stop

@section('module')
value="{{$classe->module}}"
@stop

@section('trimestre')
value="{{$account->trimestre}}"
@stop
@section('id')
value="{{$eleve->id}}"
@stop