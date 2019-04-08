@extends('layout')
@section('title')
    CLASS
@endsection
@section('body')

    <h3 class="center-align">Formulaire de modification d'une classe</h3>
    <div class="container" style="padding : 4rem">
        <!-- formulaire de modification d'une classe -->

        <form method="post" action="{{url('/update_class')}}">
            <!--categorie -->
            <div class="center-align">
                <label for="category"><strong>CATÉGORIE/CATEGORY</strong></label>
                <!-- Dropdown Structure -->
                <div>
                    <div class="row">
                        <div class="col s12">
                            <select name="category" id="category" value="{{$classe->category}}">
                                <option value="Juniors" selected>Juniors</option>
                                <option value="Adults" >Adults</option>
                                <option value="Adultes" >Adultes</option>
                                <option value="Special">Special</option>
                                <option value="One-to-one">One-to-One</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- categorie -->
            <!-- niveau -->
            <div class="center-align">
                <label for="niveau"><strong>NIVEAU/LEVEL</strong></label>
                <!-- Dropdown Structure -->
                <select name="level" id="niveau" value="{{$classe->level}}" >
                    <option selected>Débutant</option>
                    <option>Foundation</option>
                    <option>Elémentaire</option>
                    <option>Elementary</option>
                    <option>Pré Intermédiaire</option>
                    <option>Lower Intermediate</option>
                    <option>Intermédiaire</option>
                    <option>Intermediate</option>
                    <option>Avancé</option>
                    <option>Upper Intermediate</option>
                    <option>Supérieur</option>
                    <option>Advanced</option>
                </select>
            </div>
            <!-- niveau -->
            <!-- module -->
            <div class="center-align">
                <label for="module"><strong>MODULE/MODULE</strong></label>
                <select id="module" name="module" value="{{$classe->module}}">
                    <option  value="A1">A1</option>
                    <option  value="A2">A2</option>
                    <option  value="A3">A3</option>
                    <option  value="A4">A4</option>
                    <option  value="A5">A5</option>
                    <option  value="A6">A6</option>
                    <option  value="B1">B1</option>
                    <option  value="B2">B2</option>
                    <option  value="B3">B3</option>
                    <option  value="B4">B4</option>
                    <option  value="B5">B5</option>
                    <option  value="B6">B6</option>
                    <option value = "Advanced Continuation">Advanced Continuation</option>
                    <option value = "Perfectionnement">Perfectionnement</option>
                </select>
            </div>
            <!-- module -->
            <!-- indice -->
            <div class="center-align">

                <label for="indice"><strong>INDICE DE LA CLASSE</strong></label>
                <select name="indice" id="indice" value="{{$classe->indice}}" >
                    <option selected>&nbsp;</option>
                    <option>EEV</option>
                    <option>LEV</option>
                </select>
            </div>
            <!-- indice -->
            <!-- start of module -->
            <div class=" center-align">
                <label for="start_of_module"><strong>DEBUT DU MODULE</strong></label>
                <input type="date" name="start_of_module" value="{{$classe->start_of_module}}">
            </div>
            <!-- start of module -->
            <!-- Frais des cours -->
            <div class="input-field">
                <input type="text" name="amount" id="amount" value="{{$classe->amount}}">
                <label for="amount" style="color:black">FRAIS DES COURS/TUITION FEES</label>
            </div>
            <!-- Frais des cours -->
            <!-- term id-->
            <input type="hidden" id="termId" name="termId" value="{{$termId}}">
            <!-- term id-->
            <!-- csrf -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
            <!--csrf-->
            <input type="hidden" name="classId" value="{{$classe->id}}">
            <div class="right-align">
            <button href="#!" class=" waves-effect waves-green green btn-flat" type="submit"><i class="fa fa-check"></i></button>
            </div>
        </form>
        <!-- formulaire de modification d'une classe -->
    </div>
@stop
@section('footer')
    footer
@endsection