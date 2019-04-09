@extends('layouts.app')


@section('cs_scripts')

   <link href="{{ asset('css/game.css') }}" rel="stylesheet">


@endsection

@section('content')
@include("_parts.nav_top")

<div class="container-fluid game-background">
    <h1 class="main_title"> Level 1</h1>
    <div class="row gaming_box">
        <div class="col-md-8  col-md-offset-2 play_box" id="prac_content">
            <div id="test">
                <h3 class="practiceTitle">@{{ title }} </h3>
               
                <div v-if="type ==='line_practice'" class="Ptable">
                <table class="Ptable_Inside" >
                <tr>
                    <th v-for="head in header">
                        <div v-if="head === 'NULL'">
                       
                        </div>
                        <div v-else>
                            @{{ head }}
                        </div>
                          
                        
                    </th> 
                </tr><tr>
                <td v-for="(item,index) in items.fields">
                        <div v-if="item">
                            <input type="text" class="solution" v-model="testInput"> 
                        </div>
                        <div v-else>
                            @{{ items.phrase[items.id2field[index]] }}
                        </div>

                </td>  
                </tr>
                </table>
                    
                    
                </div>
                <div v-else class="Ptable">
                <table class="Ptable_Inside">
                    <tr>
                    <th v-for="head in header">
                        <div v-if="head === 'NULL'">
                       
                       </div>
                       <div v-else>
                           @{{ head }}
                       </div>                        
                    </th> 
                    </tr>
                    <tr>
                    <td v-for="(item,index) in items.columns">
                        <div v-if="index === 0">
                            @{{ item }}            
                        </div>
                        <div v-else>
                            <input type="text" class="solution" v-model="testInput[index]" > 
                        </div>   
                    </td>
                    </tr>  
                </table>                
                </div>
                    
            </div>   
           
            <div id="example-1" class="BtnFrame">
                <button v-on:click="count" class="SubmitBtn">Check</button>
            </div>
        </div>

    </div>
    <div class="row ">
        <div class="col-md-4 col-md-offset-4 message_box">
        <div class="error_box">
            <h3 style="text-align:center;">
                Leider falsch.
                </br>
                Probiere es nochmal.
            </h3>
        </div>
        <div class="correct_box">
            <h3 style="text-align:center;">
               Prima.</br> Ab zur nächsten Aufgabe
            </h3>
        </div>
        </div>

    </div>

</div>

@endsection


@section('js_scripts')
<script>
var cacheArray;
var dataArray;
var countError;
var InputArray;

$(document).ready(function(){
    Vue.set(example1,'counter',0);
    Vue.set(practice,'testInput',[]);
    practice.setPrac(0);

});
var example1 = new Vue({
  el: '#example-1',
   data: {
    counter: 0
  },
  methods:{
     count : function(event){
        practice.checkInput();

                     

    }

  }
})

var practice= new Vue({
  el: '#test',
  data () {
    return {
      items: null,
      title: null,
      type: null,
      header:null,
      array: null,
      array_part:null,
      testInput: {}
    }
  },
  mounted () {
    axios
      .get( "{{route('get.game')}}")
      .then(response => {                   
            this.items = response.data[0].content,
            this.type = response.data[0].type,
            this.title = response.data[0].title,
            this.header= response.data[0].header,
            this.array_part=response.data[0],
            this.array =response;
        })

  },
  methods:{
      setPrac: function(index){
            this.items = this.array.data[index].content;
            this.type = this.array.data[index].type;
            this.title = this.array.data[index].title;
            this.header = this.array.data[index].header;
            this.array_part=this.array.data[index];

      },
      checkInput: function(){
        cacheArray= this.testInput;

        var allTrue=true;
        console.log("Ganzes Objekt" );
        console.log(typeof this.testInput);
        console.log( $.isArray(this.testInput));

        console.log("Größe: "+this.testInput.length);
        if(typeof this.testInput==="string"){
            console.log("No Array");
            $input=this.testInput.trim().toLowerCase();
            
            if(this.testInput){
                $solution=this.items.solutions[0].trim().toLowerCase();
                if(this.type=="line_practice"){
                    console.log("line practice");
                    console.log(this.testInput);
                    console.log(this.items.solutions[0]);
                   
                    if($input== $solution){
                        console.log("Korrekt");
                        var newCounter=example1.counter+1;

                        $($(".correct_box").get(0)).fadeIn(1000);
                        $($(".correct_box").get(0)).fadeOut(1000);
                        practice.setPrac(newCounter);
                        Vue.set(example1,'counter',newCounter);  
                        Vue.set(this,'testInput',[]);  
                    }else{
                        console.log("Inkorrekt");
                        $($(".error_box").get(0)).fadeIn(1000);
                        $($(".error_box").get(0)).fadeOut(1000);
                    }
                }else{
                    console.log("table practice");

                    if($input== $solution){
                        console.log("Korrekt");
                        $($(".correct_box").get(0)).fadeIn(1000);
                        $($(".correct_box").get(0)).fadeOut(1000);
                        
                    }else{
                        console.log("Inkorrekt");
                        $($(".error_box").get(0)).fadeIn(1000);
                        $($(".error_box").get(0)).fadeOut(1000);
                    }
                    
                    
                    
                }
            }
        }
        else{
            console.log("Array");
            console.log(this.items.columns.length);
            console.log(this.testInput.length);
            if(!this.testInput.length){
                console.log("input existiert nicht");
                allTrue=false;
            }
            if(this.testInput.length!=this.items.columns.length){
                console.log("Länge stimmt nicht überein");

                allTrue=false;
            }
            if(this.type=="line_practice"){
                if(this.testInput==this.items.solutions[0]){
                    console.log("Korrekt Vergleich 1");
                }else{
                    console.log(this.testInput);

                    console.log("Inorrekt Vergleich 1");
                }
            }else{
                for (var input in this.testInput) {
                    if(input){
                        console.log("Value "+this.testInput[input]);
                        console.log(this.items.columns[input]);
                        console.log(input);
                        
                        if(this.testInput[input]==this.items.columns[input]){
                        
                        }else{
                            allTrue=false;
                        }
                    }else{
                        allTrue=false;
                    }       
                
                }
                if(allTrue){
                        var newCounter=example1.counter+1;

                    $($(".play_box").get(0)).fadeIn(3000,"linear",greenBorder());
                    //$($(".play_box").get(0)).css("border-color","green");
                        practice.setPrac(newCounter);
                        Vue.set(example1,'counter',newCounter); 
                        Vue.set(this,'testInput',[]);  
                        $($(".correct_box").get(0)).fadeIn(1000);
                        $($(".correct_box").get(0)).fadeOut(1000);
                        console.log("wie erwartet");
                        console.log(newCounter);

                }else{
                    $($(".error_box").get(0)).fadeIn(1000);
                    $($(".error_box").get(0)).fadeOut(1000);

                    //$($(".play_box").get(0)).fadeIn(3000,"linear",noBorder());


                    Vue.set(this,'testInput',[]);  
                    Vue.set(this,'testInput',cacheArray); 
                    

                }
    
            }
        }






        
        
        //Vue.set(this,'testInput',[]);               

      }

  }
  
})


function greenBorder(){
    $($(".play_box").get(0)).css("border-width","10px");
    $($(".play_box").get(0)).css("border-color","green"); 
}

function redBorder(){
    $($(".play_box").get(0)).css("border-width","10px");
    $($(".play_box").get(0)).css("border-color","red"); 
    $($(".error_box").get(0)).css("display",""); 

}
function noBorder(){
    $($(".play_box").get(0)).css("border-width","10px");
    $($(".play_box").get(0)).css("border-color","white"); 
}
</script>



@endsection
