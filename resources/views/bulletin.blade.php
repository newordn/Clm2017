@extends('layout')
@section('title')
BULLETIN
@endsection
@section('body')
<!-- Evaluation 1-->
  <h3 class="center-align">Evaluation I</h3>
  <div class="container" style="margin-top:30px">
  <!-- formulaire d'inscription -->
        <form action="{{route('bulletin')}}" method="POST">
        <!-- Comprehension orale -->
          <div class="input-field">
            <input id="listening" type="text" name="listening" required>
            <label for="listening" style="color:black">COMPREHENSION ORALE/LISTENING</label>
          </div>
        <!-- Comprehension orale -->

        <!-- usage de la langue -->
          <div class="input-field">
            <input id="useOfEnglish" type="text" name="useOfEnglish" required>
            <label for="useOfEnglish" style="color:black">MANIEMENT DE LA LANGUE/USE OF ENGLISH</label>
          </div>
        <!-- usage de la langue -->

        
        <!-- writting -->
          <div class="input-field">
            <input id="writting" type="text" name="writting" required>
            <label for="writting" style="color:black">EXPRESSION ECRITE/WRITTING</label>
          </div>
        <!-- writting -->
  	

        <!-- reading -->
          <div class="input-field">
            <input id="ComprehensionEcrite" type="text" name="reading" required>
            <label for="ComprehensionEcrite" style="color:black">COMPREHENSION ECRITE/ READING COMPREHENSION</label>
          </div>
        <!-- reading -->


  		<!-- speaking-->
         <div class="input-field">
            <input id="speaking" type="text" name="speaking" required>
            <label for="speaking" style="color:black">EXPRESSION ORALE/SPEAKING</label>
          </div>
        <!-- speaking-->

        
        <!-- eleve_id -->
          <input type="hidden" name="id" value="{{$id}}">
        <!-- eleve_id -->

        
  </div>
<!--Evaluation 1 -->

<!-- Evaluation 2-->
  <h3 class="center-align">Evaluation II</h3>
  <div class="container" style="margin-top:30px;margin-bottom: 6rem;">
  <!-- formulaire d'inscription -->
        <!-- Comprehension orale -->
          <div class="input-field">
            <input id="listening" type="text" name="listening1">
            <label for="listening" style="color:black">COMPREHENSION ORALE/LISTENING</label>
          </div>
        <!-- Comprehension orale -->

        <!-- usage de la langue -->
          <div class="input-field">
            <input id="useOfEnglish" type="text" name="useOfEnglish1">
            <label for="useOfEnglish" style="color:black">MANIEMENT DE LA LANGUE/USE OF ENGLISH</label>
          </div>
        <!-- usage de la langue -->

        
        <!-- writting -->
          <div class="input-field">
            <input id="writting" type="text" name="writting1">
            <label for="writting" style="color:black">EXPRESSION ECRITE/WRITTING</label>
          </div>
        <!-- writting -->
    

        <!-- reading -->
          <div class="input-field">
            <input id="ComprehensionEcrite" type="text" name="reading1">
            <label for="ComprehensionEcrite" style="color:black">COMPREHENSION ECRITE/ READING COMPREHENSION</label>
          </div>
        <!-- reading -->

      <!-- speaking-->
         <div class="input-field">
            <input id="speaking" type="text" name="speaking1">
            <label for="speaking" style="color:black">EXPRESSION ORALE/SPEAKING</label>
          </div>
        <!-- speaking-->

        
        <!-- csrf -->
          <input type="hidden" name="_token" value="{{ csrf_token() }}" >
        <!--csrf-->
        <!-- eleve_id -->
          <input type="hidden" name="id" value="{{$id}}">
        <!-- eleve_id -->
       
        <!-- course book --> 
           <h3 class="center-align">LIVRES DES COURS / COURSE BOOK</h3>
          <div class="center-align">
            <!-- Dropdown Structure -->
            <select name="book" id="book">
              <option selected>ENERGY 1</option>
              <option >ENERGY 2</option>
              <option >ENERGY 3</option>
              <option >ENERGY 4</option>
              <option >NEW TOTAL ENGLISH STARTER</option>
              <option >NEW TOTAL ENGLISH ELEMENTARY</option>
              <option >NEW TOTAL ENGLISH PRE-INTERMEDIATE</option>
              <option >NEW TOTAL ENGLISH INTERMEDIATE</option>
              <option >NEW TOTAL ENGLISH UPPER-INTERMEDIATE</option>
              <option >NEW TOTAL ENGLISH ADVANCED</option>
              <option >EAYDS ELEMENTARY</option>
              <option >EAYDS BEGINNER</option>
            </select>
          </div>
        <!-- course book -->

        <!-- Decision --> 
          <div class="center-align">
            <h3 class="center-align">DECISION/DECISION</h3>
            <!-- Dropdown Structure -->
            <select name="decision" id="decision">
              <option selected>PROMU-PROMOTED</option>
              <option>PROMU EXCEPTIONNELLEMENT-PROMOTED EXCEPTIONALLY</option>
              <option>REPRENDRE-REPEAT</option>
            </select>
          </div>
        <!-- Decision -->

        <!--submit -->
          <div class="input-field right-align">
            <button class="btn-floating btn-large green"><i class="fa fa-check"></i></button>
          </div>
        <!--submit-->
        </form>
   <!-- formulaire d'inscription -->
  </div>
<!--Evaluation 2 -->


 @stop

 @section('footer')
 footer
 @endsection
