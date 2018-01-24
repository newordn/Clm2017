<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="{{asset('materialize/css/materialize.min.css')}}"  media="screen,projection"/>
      <!--My own style-->
        
      <link type="text/css" rel="stylesheet" href="{{asset('materialize/css/style.css')}}"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <title>CLM-2017 @yield('title')</title>
    </head>

    <body>

           <h1 id="toolbar">CENTRE LINGUISTIQUE DE MAROUA</h1>
          <div class="row">
           <div class="left-align col s6">
              <a class="btn btn-large btn-floating" href="/"><i class="fa fa-home"></i></a>
            </div>
            <div class="right-align col s6" >
                <h5 class="right-align"><i><strong>@if(!empty(Session::get('login'))){{Session::get('login')}} <a class="btn btn-floating red" href="{{route('logOut')}}"><i class="fa fa-sign-out"></i></a> @endif</strong></i></h5>
             </div>
      </div>
        @yield('body')
        <footer class="page-footer blue  @yield('footer')">
            <div class="page-copyright center-align">
                <i class="fa fa-copyright" aria-hidden="true"></i><em><strong>Centre Linguistique De Maroua 2017.</strong></em>

            </div>
        </footer>
    </body>
    

    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="{{asset('materialize/js/jquery-3.2.1.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('materialize/js/materialize.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/loginModal.js')}}"></script>
      @yield('showLogin')
        
  </html>
        
