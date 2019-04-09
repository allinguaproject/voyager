<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Lingophil') }}</title>

    <!-- Styles -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/lex_style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
</head>
<body>
    <div id="app">

      @yield('nav')


        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    <!-- Scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/partial.js') }}"></script>
    <!-- Custom scripts for this page
    <script src="{{ asset('js/sb-admin-datatables.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-charts.min.js') }}"></script>
  -->



<script type="text/javascript">
  String.prototype.strcmp = function(s) {
      if (this < s) return -1;
      if (this > s) return 1;
      return 0;
  }

   $("#testbtn").click(function() {

     myObj = {
    "solution": [
        { "line":[ "gefällt", "" ] },
        { "line":[ "nimmt", "zu" ] },
        { "line":[ "sehe", "an" ] }
    ]
  }

  inputFields1= $('.practice');
  inputFields0= $('.practice_field1');

  for (i = 0; i < myObj.solution.length; i++) {
    //$('.test').innerHTML += "<p>test dies</p>";
      if( inputFields0[i].value.strcmp(myObj.solution[i].line[0])==0 )
         {
            //inputFields0[i].css("background-color","green");
          //  inputFields1[i].css("background-color","green");
          inputFields0[i].style.backgroundColor="green";
          }
          else{
            inputFields0[i].style.backgroundColor="red";

          }
          if( inputFields1[i].value.strcmp(myObj.solution[i].line[1])==0 )
             {
                //inputFields0[i].css("background-color","green");
              //  inputFields1[i].css("background-color","green");
              inputFields1[i].style.backgroundColor="green";
              }
              else{
                inputFields1[i].style.backgroundColor="red";

              }

  }

  });


  
</script>

@yield('js')

</body>
</html>
