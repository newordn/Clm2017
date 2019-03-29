@extends('layout')
@section('title')
    INSCRIPTION
@endsection
@section('body')

    <h3 class="center-align">Formulaire de modification d'une inscription</h3>
    <div class="container" style="padding : 4rem">
        <!-- si il ya une erreur on la notifie ici en haut -->
        <h3 style="color:red" class="center-align"></h3>
        <!-- formulaire d'inscription -->
        <form action="{{route('inscriptionModifyPost')}}" method="POST">
            <!-- nom -->
            <div class="input-field">
                <input id="last_name" type="text" name="last_name"  value="{{$eleve->last_name}}" required>
                <label for="last_name" style="color:black">NOM/SURNAME</label>
            </div>
            <!-- nom -->

            <!-- prenom -->
            <div class="input-field">
                <input id="first_name" type="text"  name="first_name" value="{{$eleve->first_name}}" required>
                <label for="first_name" style="color:black">PRÉNOM/FIRST NAME</label>
            </div>
            <!-- prenom -->

            <!-- mode de paiement -->
            <div class="center-align" >
                <label for="payment"><strong>MODE DE PAIEMENT/ MODE OF PAYMENT</strong></label>
                <select  name="payment" id="payment" value="{{$account->payment}}">
                    <option value="Comptant/Cash payment" selected> Comptant/Cash payment</option>
                    <option value="Virement Bancaire/Bank Transfer">Virement Bancaire/Bank Transfer</option>
                    <option value="Chèque/Cheque">Chèque/Cheque</option>
                    <option value="Autres/Others">Autres/Others</option>
                </select>
            </div>
            <!-- mode de paiement -->


            <!-- specification de paiement -->
            <div class="center-align" >
                <label for="paymentSpec">SPECIFICATION DE PAIEMENT</label>
                <input type="text" value="{{$account->paymentSpec}}" name="paymentSpec" id="paymentSpec" placeholder="Somme totale">
            </div>
            <!-- specification de paiement -->

            <!-- somme versee -->
            <div class="input-field center-align">
                <label for="somme_versee" style="color:black">SOMME VERSÉE/AMOUNT PAID</label>
                <input id="somme_versee" type="text" name="amount_paid" value="{{$account->amount_paid}}" required>
            </div>
            <!-- somme versee -->

            <!-- csrf -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" >
            <!--csrf-->
            <!-- id -->
            <input type="hidden" name="id" value="{{$eleve->id}}" >
            <!-- id -->

            <input type="hidden" name="trimestre" value="{{$termId}}" >
            <input type="hidden" name="level" value="{{$classe->level}}">
            <input type="hidden" name="category" value="{{$classe->category}}">
            <input type="hidden" name="amount" value="{{$classe->amount}}">
            <input type="hidden" name="module" value="{{$classe->module}}">
            <!--submit -->
            <div class="input-field right-align">
                <button class="btn-floating btn-large green"><i class="fa fa-check"></i></button>
            </div>
            <!--submit-->
        </form>
        <!-- formulaire d'inscription -->
    </div>
@stop
@section('footer')
    footer
@endsection