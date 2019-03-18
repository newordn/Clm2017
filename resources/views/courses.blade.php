@extends('layout')
@section('title')
    Cours
@endsection
@section('body')
    <div class="center-align" style="margin-top:15px">
        <a class="waves-effect waves-light btn blue " href="{{'/'}}"><i class="fa fa-backward"></i> Retour</a>
    </div>
    <div class="container" style="margin-top: 2rem">
        <table class="bordered highlight">
            <thead>
                <th>Intitulé des cours</th>
                <th>Format</th>
                <th class="center-align">Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>English for beginneer</td>
                    <td>Video</td>
                    <td class="center-align"><a class="btn btn-primary">Ouvrir</a></td>
                </tr>
                <tr>
                    <td>English for beginneer</td>
                    <td>Video</td>
                    <td class="center-align"><a class="btn btn-primary">Ouvrir</a></td>
                </tr>
                <tr>
                    <td>English for beginneer</td>
                    <td>Video</td>
                    <td class="center-align"><a class="btn btn-primary">Ouvrir</a></td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection