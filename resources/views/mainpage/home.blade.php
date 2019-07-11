@extends('layouts.app')


@section('cs_scripts')

   <link href="{{ asset('css/login.css') }}" rel="stylesheet">


@endsection

@section('content')

@include("_parts.nav_top")





<div class="container-fluid jumbo_main">
  <div class="row">
    <div class="col-md-4">
      <img style="height:30%;margin-top:-20px;"src="{{ URL::to('/') }}/images/claw3_cl.png" alt="">
    </div>
    <div class="col-md-4">
        <h1>Lingmer</h1>
        <h2>Grammatik spielend lernen</h2>

    </div>
    <div class="col-md-4">
      <div class="row">
     <div class="col-md-offset-4 col-md-8"><img style="height:30%;margin-top:160px;" src="{{ URL::to('/') }}/images/Capa_1.png" alt="">
     </div></div>
    </div>
  </div>
  
  <div class="row">
    <div class="col-md-12">

    </div>
  </div>


</div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 id="chooseLevel_bricks"> Probiere ein Level aus </h2>
    </div>
  </div>
  <div class="row">
    

    <div class="col-md-4">
      <div id="level1_brick"></div>
      <a href="{{route('play.game',1)}}" class="brick_a"> Level 1</a>
    </div>
    <div class="col-md-4">
      <div id="level2_brick"></div>
      <a href="" class="brick_a"> Level 2</a>

    </div>
    <div class="col-md-4">
      <div id="level3_brick"></div>
      <a href="{{route('user.landingpage')}}" class="brick_a"> Level 3</a>

    </div>
    
  </div>

      <div class="row membership_overview">
        <div class="col-md-12">
          <h2> Mitgliedschaften</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-2">
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Basis</h5>
              <div class="card_img_container">
                <img class="card-img-top"  style="width: 50%;display:inline-block;height:200px;"src="{{ URL::to('/') }}/images/paper_plane_green.png" alt="Card image cap">
              </div>
        
              <p class="card-text">In der Basis-Mitgliedschaft haben Sie Zugang zu allen Lerneinheiten und Übungen</p>
              <p class="card-text"><a href="#" class="card-link">Jetzt Registrieren</a></p>
            </div>
          </div>
    
    
        </div>
        <div class="col-md-4">
          <div class="card" style="width:100%;">
            <div class="card-body">
              <h5 class="card-title">Premium</h5>
              <div class="card_img_container">
                <img class="card-img-top" style="width: 50%;display:inline-block;height:200px;" src="{{ URL::to('/') }}/images/rocket_prem.png" alt="Card image cap">
              </div>

              <p class="card-text">Momentan gibt es keine Premium-Mitgliedschaft.</p>
              <p class="card-text"><a href="#" class="card-link">Jetzt Registrieren</a></p>
            </div>        
          </div>
        </div>
      </div>
      
     

      <div class="row membership_overview">
        <div class="col-md-12">
          <h2>Über uns</h2>
          <h3> Wir sind gerade am Anfang und wollen weit hinaus</h3>

        </div>
      </div>

      <div class="row membership_overview">
        <div class="col-md-1">
          <img style="height:250px;position:relative;left:-400px;top:100px;display:block;float:bottom;"src="{{ URL::to('/') }}/images/rocketstart.png" alt="">
        </div>   
        <div class="col-md-10">
            <h2> Wohin wir wollen </h2>
            <h3> Wir sind gerade am Anfang und wollen hoch hinaus</h3>
        </div>
        <div class="col-md-1">
            <img style="height:350px;position:relative;left:100px;top:150px;display:block;float:bottom;"src="{{ URL::to('/') }}/images/moonlanding2.png" alt="">
        </div>
      </div>

 


  <div class="row support_row">
    <div class="col-md-12">
      <h2>Unterstützt uns</h2>
      <h3>Wir versuchen euch die bestmögliche Plattform zum Lernen zu geben. Aber </h3>

    </div>
  </div>
</div> 


 <div class="container-fluid footer">
 <div class="row">
  
 </div>
 </div>

 @include("log_reg.modal")




@endsection


@section('js_scripts')

<script>
// Get the modal
$("#login").click(function(){
  console.log("log Form beantragt");
  $($(".modal_background").get(0)).css("display","block");
  $($(".modal").get(0)).css("display","block");
  $($(".modal").get(0)).load("{{route('load.html','login.html')}}");
 
})

$("#register").click(function(){
  console.log("log Form beantragt");
  $($(".modal_background").get(0)).css("display","block");
  $($(".modal").get(0)).css("display","block");
  $($(".modal").get(0)).load("{{route('load.html','register.html')}}");

})
</script>

@endsection
