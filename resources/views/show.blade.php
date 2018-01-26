@extends('layout')

@section('body')
<div class="row center-align">
	<div class="col s10 "><h4>{{count($students)}} APPRENANT(E)S.</h4></div>
	<div class="col s2"><button class="btn blue">Imprimer</button></div>
</div>
<div class=" row center-align" style="margin-top:20px;margin-left::;0px;">
@foreach($students as $student)
<div class="card col s2" style="margin-right: 10px;height: 300px;"><strong class="btn">NOM/SURNAME</strong> {{$student->last_name}}<br/><strong class="btn">PRÉNOM/FIRST NAME</strong>
{{$student->first_name}}<br/><strong class="btn">MATRICULE </strong>{{$student->matricule}}<br/>
<strong class="btn">ABSENCES</strong><br/>{{count($student->absences)}}<br/>
<a class="btn blue" href="/bulletin/{{$student->id}}"><i class="fa fa-address-card-o"></i></a><a href="/absence/{{$student->id}}" class="btn brown"><i class="fa fa-eye"></i></a></div>
@endforeach
</div>
@stop
@section('footer')
footer_home
@stop
