@extends('layouts.lex_app')



@section('content')


<nav class="navbar">
  <div class="container-fluid">
    <div class="col-md-12 logo">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{route('home')}}">logo</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
    <div class="col-md-3">
      <a id="navilinkStart" href="#">Beginn</a>
    </div>    
    <div class="col-md-9">
      <ul class="nav navbar-nav" id="toplinks">
        <li><a class="navilink" href="#">Stufe A1</a></li>
        <li><a  class="navilink"href="#">Stufe A2</a></li>
        <li><a class="navilink" href="#">Stufe B1</a></li>
        <li><a  class="navilink"href="#">Stufe B2</a></li>
        <li><a class="navilink" href="#">Stufe C1</a></li>
        <li><a  class="navilink"href="#">Stufe C2</a></li>
      </ul>
      
    </div>   
     
  </div>
</nav>

<div class="container-fluid">





  <div class="row lexikon">
  
    <div class="col-md-3">
      <div class="vertical-menu">
   
      <div class="learnUnit">
        <a href="#" class="expandList LektionLink">Lektion 1</a>
         <ul class ="lectionList">
            <li><a href="#"  class="LektionLink">Übung 1</a></li>
            <li><a href="#"  class="LektionLink">Übung 2</a></li>
            <li><a href="#"  class="LektionLink">Übung 3</a></li>
            <li><a href="#"  class="LektionLink">Übung 4</a></li>

         </ul>
      </div>
      <div class="learnUnit">
        <a href="#" class="expandList LektionLink">Lektion 2</a>
          <ul class ="lectionList">
          <li><a href="#"  class="LektionLink">Übung 1</a></li>
          <li><a href="#"  class="LektionLink">Übung 2</a></li>
          <li><a href="#"  class="TableLink">Tabelle 1</a></li>
          <li><a href="#"  class="TableLink">Tabelle 2</a></li>
          <li><a href="#"  class="TableLink">Tabelle 3</a></li>
          <li><a href="#"  class="TableLink">Tabelle 4</a></li>
        </ul>
      </div>

    
      </div>
      
   
  </div>

  <div class="col-md-9">
      <div id="learncontent">
     
      </div>

  </div>

    
    
    

  </div>
</div>


  @endsection

  @section('js')
  <script>

  var HTMLLinks=[
        "lex_html.trennuntrenn",
        "lex_html.trennuntrennUbung",
        "lex_html.niveauA1.lektion1",
        "lex_html.niveauA1.lektion2",
        "lex_html.niveauA1.lektion3",       
        "lex_html.niveauA1.lektion4",
        "lex_html.niveauA1.lektion5",
        "lex_html.niveauA1.lektion7",

       
       
       
      ];
      var DataID=[
        0,
        0,
        0,
        0,
        0,
        0,
        0,
        1
      ];
    
    $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
    function makeBlue(listEl,indexPressed){
      $(listEl).each(function(index,element){
        if(indexPressed==index){
          $(element).css("background-color","#15A2FF");
          $(element).css("color","white");

        }else{
          $(element).css("background-color","white");
          $(element).css("color","#15A2FF");

        } 
      });
    };

    $(".navilink").on("click",function(){
      $.ajax({
        type: "POST",
        url: "/load/sidebar",
        data: {
          sidebar:"sidebars.sidebarA1",
         
        },
        success: function(data){
          console.log(data);
          $($(".vertical-menu").get(0)).html(data);

        }        
      });

    });

     $(".vertical-menu").on("click",".expandList",function(){
      console.log("lektion clicked");
      var index=$(".LektionLink").index(this);
      makeBlue($(".LektionLink"),index+1);
      var baseString="lektion";
      
      $.ajax({
        type: "POST",
        url: "/load/practice",
        data: {
          view:HTMLLinks[index],
          id:DataID[index]
        },
        success: function(data){
          //console.log(data);
          $("#learncontent").html(data);

        }        
      });


    });

    $(".vertical-menu").on("click",".LektionLink",function(){
      console.log("lektion clicked");
      var index=$(".LektionLink").index(this);
      makeBlue($(".LektionLink"),index);
      var baseString="lektion";
      
      $.ajax({
        type: "POST",
        url: "/load/practice",
        data: {
          view:HTMLLinks[index],
          id:DataID[index]
        },
        success: function(data){
          //console.log(data);
          $("#learncontent").html(data);

        }        
      });


    });

    $(".vertical-menu").on("click",".TableLink",function(){
  
      var index=$(".TableLink").index(this);
      makeBlue($(".TableLink"),index);
      var baseString="table";
      var HTMLLinks=[
        "lex_html.niveauA1.lektion8",   
        "lex_html.niveauA1.table_prototyp"   

       
      ];
      var TableID=[
        0,
        1
        
      ];
      var Titles=[
        "Konjugieren Sie",
        "Konjugieren Sie"
      ]
      $.ajax({
        type: "POST",
        url: "/load/table",
        data: {
          view:HTMLLinks[index],
          TableID:TableID[index],
          title:Titles[index]
        },
        success: function(data){
          //console.log(data);
          $("#learncontent").html(data);

        }        
      });


    });

        $(".vertical-menu").on("click",".navilink",function(){

      var index=$(".navilink").index(this);
      makeBlue($(".navilink"),index);
    });

    

    $(".vertical-menu").on("click","#helpbtn",function(){
      $("#helpdiv").css("background-color","#15A2FF");
      $("#helpbtn").css("color","white");

    });
    $(".vertical-menu").on("click",".expandList",function(){
      var index=$(".expandList").index(this);
      var elem=$(".lectionList")[index];
      if($(elem).css("display")=="none")
        $(elem).css("display","");
      else
        $(elem).css("display","none");  

      
    });

 </script>
  
  @endsection
