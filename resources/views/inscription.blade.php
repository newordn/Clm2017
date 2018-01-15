@extends('layout')
@section('title')
INSCRIPTION
@endsection
@section('body')
  
  <div class="container container_color container_margin ">
    <!-- formulaire d'inscription -->
      <form action="{{route('inscriptionPost')}}" method="POST">
      <!-- nom -->
        <div class="input-field">
          <input id="last_name" type="text" name="last_name"  required>
          <label for="last_name" style="color:black">NOM/SURNAME</label>
        </div>
      <!-- nom -->

      <!-- prenom -->
        <div class="input-field">
          <input id="first_name" type="text"  name="first_name" required>
          <label for="first_name" style="color:black">PRÉNOM/FIRST NAME</label>
        </div>
      <!-- prenom -->
   
      <!-- mode de paiement -->
          <div class="center-align" >
            <label for="payment"><strong>MODE DE PAIEMENT/ MODE OF PAYMENT</strong></label> 
            <select  name="payment" id="payment">
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
          <input id="somme_versee" type="number" name="amount_paid" required>
        </div>
      <!-- somme versee -->

      <!--categorie -->
        <div class=" center-align">
          <label for="category"><strong>CATÉGORIE/GATEGORY</strong></label>
          <!-- Dropdown Structure -->
          <select name="category" id="category">
            <option selected>Juniors/Juniors</option>
            <option>Adultes/Adults</option>
          </select>
        </div>
      <!-- categorie -->
      <!-- niveau -->
        <div class="center-align">
         <label for="niveau"><strong>NIVEAU/LEVEL</strong></label>
          <!-- Dropdown Structure -->
          <select name="level" id="niveau">
            <option selected>Débutant</option>
            <option>Foundation</option>
            <option>Elémentaire</option>
            <option>Elementary</option>
            <option>Pré Intermédiaire</option>
            <option>Lower Intermediate</option>
            <option>Intermédiaire</option>
            <option>Intermediate</option>
            <option>Supérieur</option>
            <option>Upper</option>
            <option>Perfectionnement</option>
            <option>Advanced</option>
          </select>
        </div>
      <!--niveau-->
      <!-- Frais des cours -->
        <div class="input-field">
          <input type="number" name="fees" required>
          <label for="fees" style="color:black">FRAIS DES COURS/TUITION FEES</label>
        </div>
      <!-- Frais des cours -->
      <!-- module -->
        <div class="input-field">
          <input id="module" type="text"  name="module" required>
          <label for="module" style="color:black">MODULE/MODULE</label>
        </div>
      <!-- module -->
      <!-- trimestre -->
        <div class="input-field">
          <input id="trimestre" type="number"  name="trimestre" required>
          <label for="trimestre" style="color:black">TRIMESTRE/TERM</label>
        </div>
      <!-- trimestre -->

      
      <!-- csrf -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" >
      <!--csrf-->
      
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