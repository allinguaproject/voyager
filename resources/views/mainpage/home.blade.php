@extends('layouts.app')


@section('cs_scripts')

   <link href="{{ asset('css/login.css') }}" rel="stylesheet">


@endsection

@section('content')

@include("_parts.nav_top")





<div class="container-fluid jumbo_main">

    <div class="row">
    <div class="col-md-6">
        
          <h1 > Grammatik spielend </br>lernen</h1>
          <a href="{{route('alt')}}" >zur alten ansicht</a>
    </div>
    <div class="col-md-6"><div id="dices"></div>
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
      <a href="{{route('login.social','facebook')}}" class="brick_a"> Level 2</a>

    </div>
    <div class="col-md-4">
      <div id="level3_brick"></div>
      <a href="" class="brick_a"> Level 3</a>

    </div>
    
  </div>
</div>

<div class="container membership_overview">
 <div class="row">
   <div class="col-md-12">
     <h2> Mitgliedschaften</h2>
   </div>
 </div>
 <div class="row">
   <div class="col-md-4"><h3>Basis</h3></div>
   <div class="col-md-4"><h3>Profi</h3></div>
   <div class="col-md-4"><h3>Spezialist</h3></div>

 </div>
 <div class="row"></div>

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
