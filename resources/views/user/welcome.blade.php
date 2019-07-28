<!--
=========================================================
 Paper Dashboard 2 - v2.0.0
=========================================================

 Product Page: https://www.creative-tim.com/product/paper-dashboard-2
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/paper-dashboard/blob/master/LICENSE)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>
    Paper Dashboard 2 by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>

  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

  <link href="{{ asset('css/paper-dashboard.css?v=2.0.0') }}" rel="stylesheet">


  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('css/lingmer_sidebar.css') }}" rel="stylesheet">

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" id="vuesidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
       
        <a href="#" class="simple-text logo-normal">          
            <img style="margin-top:-20px;"src="{{ URL::to('/') }}/images/Lingmer_white.png" alt="">
    <!-- <div class="logo-image-big">
        
        <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li v-on:click="selected = 1" :class="{active:selected == 1}" >
            <a href="#" >
              <i class="nc-icon nc-bank"></i>
              <p>User</p>
            </a>
          </li>
          <li>
            <div class="logo"> <p style="color:white;">Unterricht</p> </div>
          </li>
          <li><a href=""></a></li>

          <li v-on:click="selected = 2" :class="{active:selected == 2}" >
            <a href="#" class="nav_link" name="level1">
              <i class="nc-icon nc-diamond"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li  v-on:click="selected = 3" :class="{active:selected == 3}">
            <a href="#"  class="nav_link" name="level2"> 
              <i class="nc-icon nc-pin-3"></i>
              <p>Level 2</p>
            </a>
          </li>
          <li  v-on:click="selected = 4" :class="{active:selected == 4}">
            <a href="#" class="nav_link" name="level3">
              <i class="nc-icon nc-bell-55"></i>
              <p>Level 3</p>
            </a>
          </li>
          <li>
            <div class="logo"> <p style="color:white;">Übungswürfel</p> </div>
          </li>
          <li><a href=""></a></li>
          <li  v-on:click="selected = 5" :class="{active:selected == 5}">
            <a href="#" class="nav_link">
              <i class="nc-icon nc-single-02"></i>
              <p>Spiel</p>
            </a>
          </li>
          
         
        </ul>


      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      
      <div id="content">
      
      </div>
      @yield('content')
     <div id="content"></div>
    </div>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">

  <canvas id="bigDashboardChart"></canvas>
  -->


  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/jquery.min.js') }}"></script>

  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

  <!--  Google Maps Plugin    -->
  <!-- Chart JS -->
  <!--  Notifications Plugin    -->
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->

  <script src="{{ asset('js/paper-dashboard.min.js?v=2.0.0') }}"></script>
  <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
  <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
  <script src="/js/app.js"></script>


  <script>


    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });

   


    var example1 = new Vue({
        el:"#vuesidebar",
        data:{
            selected: 1
        },       
        methods:{
            setActive: function(){
            console.log("gedrückt");
          // some code to filter users
        }
        }
    })




    $(".nav_link").click(function(){
      
       
        console.log(this.name);
        var html="./level/"+this.name;
        
        $("#content").load(html);

    })
  </script>

</body>

</html>
