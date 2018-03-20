@extends('layout')
@section('title')
INSCRIPTION
@endsection
@section('body')
  
  <div class="container container_color container_margin ">
    <!-- si il ya une erreur on la notifie ici en haut -->
    <h3 style="color:red" class="center-align">@yield('error')</h3>
    <!-- formulaire d'inscription -->
      <form action=@yield('routeInscriptionModification') method="POST">
      <!-- nom -->
        <div class="input-field">
          <input id="last_name" type="text" name="last_name"  @yield('last_name') required>
          <label for="last_name" style="color:black">NOM/SURNAME</label>
        </div>
      <!-- nom -->

      <!-- prenom -->
        <div class="input-field">
          <input id="first_name" type="text"  name="first_name" @yield('first_name') required>
          <label for="first_name" style="color:black">PRÉNOM/FIRST NAME</label>
        </div>
      <!-- prenom -->
   
      <!-- mode de paiement -->
          <div class="center-align" >
            <label for="payment"><strong>MODE DE PAIEMENT/ MODE OF PAYMENT</strong></label> 
            <select  name="payment" id="payment" @yield('payment')>
              <option value="Comptant/Cash payment" selected> Comptant/Cash payment</option>
              <option value="Virement Bancaire/Bank Transfer">Virement Bancaire/Bank Transfer</option>
              <option value="Chèque/Cheque">Chèque/Cheque</option>
              <option value="Autres/Others">Autres/Others</option>
            </select>
          </div>
      <!-- mode de paiement -->
      
      <!-- somme versee -->
        <div class="input-field center-align">
          <label for="somme_versee" style="color:black">SOMME VERSÉE/AMOUNT PAID</label>
          <input id="somme_versee" type="text" name="amount_paid" @yield('somme_versee') required>
        </div>
      <!-- somme versee -->

      <!--categorie -->
        <div class=" center-align">
          <label for="category"><strong>CATÉGORIE/GATEGORY</strong></label>
          <!-- Dropdown Structure -->
          <select name="category" id="category" @yield('category')>
            <option selected>Juniors/Juniors</option>
            <option>Adultes/Adults</option>
          </select>
        </div>
      <!-- categorie -->
      <!-- niveau -->
        <div class="center-align">
         <label for="niveau"><strong>NIVEAU/LEVEL</strong></label>
          <!-- Dropdown Structure -->
          <select name="level" id="niveau" @yield('level')>
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
            <option>Perfectionnement</option>
            <option>Advanced Continuation</option>
            
          </select>
        </div>
      <!--niveau-->
      <!-- Frais des cours -->
        <div class="input-field">
          <input type="text" name="fees" @yield('fees') required>
          <label for="fees" style="color:black">FRAIS DES COURS/TUITION FEES</label>
        </div>
      <!-- Frais des cours -->
      <!-- module -->
        <div class="input-field">
          <input id="module" type="text"  name="module" @yield('module') required>
          <label for="module" style="color:black">MODULE/MODULE</label>
        </div>
      <!-- module -->
      <!-- trimestre -->
        <div class="input-field">
          <input id="trimestre" type="text"  name="trimestre" @yield('trimestre') required>
          <label for="trimestre" style="color:black">TRIMESTRE/TERM</label>
        </div>
      <!-- trimestre -->

      
      <!-- csrf -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
      <!--csrf-->
      <!-- id -->
        <input type="hidden" name="id" @yield('id') >
      <!-- id -->
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