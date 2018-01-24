@extends('layout')

@section('body')
<div class="row center-align" style="margin-top:20px">
@foreach($students as $student)
<div class="card col s2" style="margin-right: 10px;height: 150px;"><strong>Nom/Last Name:</strong> {{$student->last_name}}<br/><strong>Prenom/ First Name</strong> :
{{$student->first_name}}<br/><strong>Matricule:</strong>{{$student->matricule}}<br/><a class="btn blue" href="/bulletin/{{$student->id}}"><i class="fa fa-address-card-o"></i></a><a href="/absence/{{$student->id}}" class="btn brown"><i class="fa fa-eye"></i></a></div>
@endforeach
</div>
@stop
@section('footer')
footer_home
@stop
