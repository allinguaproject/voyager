<h3>{{$title}}</h3>
<button id="checkSolution" class="checkSolution">Eingaben </br>Prüfen</button>



<table width="auto">
    
    @foreach($table as $tablerow)
        @if($tablerow['part']=="head")
        <tr class="head">   
            <th></th>
     
            @foreach($tablerow['columns'] as $key=> $column)

            @if($column=="NULL")
                <th>  </th>
            @else
                <th> {{$column}} </th>
            @endif
                
            @endforeach
        </tr>
       @endif
       @if($tablerow['purpose']=="zwischenzeile")
        <tr class="zwischenzeile">   
            <th></th>
     
            @foreach($tablerow['columns'] as $key=> $column)

            @if($column=="NULL")
                <th>  </th>
            @else
                <th> {{$column}} </th>
            @endif
                
            @endforeach
        </tr>
       @endif
        @if($tablerow['part']=="body" AND $tablerow['purpose']=="solution")
        <tr class="row">        
            @foreach($tablerow['columns'] as $key=>$column)
            @if($key==0)
                <th> {{$column}} </th>
            @else
                <td> 
                    <input type="text" class="input" id="">
                    <span style="display:none;" class="solution">{{$column}}</span>           

                </td>          
            @endif
            
            @endforeach
            <td class="checksign" style="display:none;"><img src="{{route('get.image','check.png')}}" alt="" style="height:15px;width:auto;margin-left:10px;"></td>
            <td class="wrongsign" style="display:none;"><img src="{{route('get.image','error.png')}}" alt="" style="height:15px;width:auto;margin-left:10px;"></td>

        </tr>
        @endif
       
  
    @endforeach
</table>
<script>
$( ".input" ).change(function() {
    var index=$(".input").index(this);
    allTrue=true;
        var input=$($(".row").get(index)).find(".input");
        var solution=$($(".row").get(index)).find(".solution");
        $(solution).each(function( id_sol, val_sol ){
            console.log($($(solution).get(id_sol)).text());
            console.log($($(input).get(id_sol)).val());
            var sol_string=$($(solution).get(id_sol)).text();
            sol_string=sol_string.replace(/\s/g, '');
            sol_string=sol_string.toLowerCase();
            var inp_string=$($(input).get(id_sol)).val();
            inp_string=inp_string.replace(/\s/g, '');
            inp_string=inp_string.toLowerCase(); 
 
            if(sol_string!=inp_string){
                allTrue=false;
            }else{
            }
        });
        if(!allTrue){
            $($(".wrongsign").get(index-1)).css("display","");           
            $($(".checksign").get(index-1)).css("display","none");          

        }else{
            $($(".checksign").get(index-1)).css("display","");  
            $($(".wrongsign").get(index-1)).css("display","none");           

        }
});
$(".checkSolution").click(function(){
    //console.log("test");
    var allTrue=true;

    $(".row").each(function( index, value ){
        //console.log("test row");
        allTrue=true;
        var input=$($(".row").get(index)).find(".input");
        var solution=$($(".row").get(index)).find(".solution");
        $(solution).each(function( id_sol, val_sol ){
            console.log($($(solution).get(id_sol)).text());
            console.log($($(input).get(id_sol)).val());
            var sol_string=$($(solution).get(id_sol)).text();
            sol_string=sol_string.replace(/\s/g, '');
            sol_string=sol_string.toLowerCase();
            var inp_string=$($(input).get(id_sol)).val();
            inp_string=inp_string.replace(/\s/g, '');
            inp_string=inp_string.toLowerCase(); 
 
            if(sol_string!=inp_string){
                allTrue=false;
            }else{
                $($(input).get(id_sol)).css("background-color","#B4EDB8") 
            }
        });
        if(!allTrue){
            $($(".wrongsign").get(index-1)).css("display","");           
            $($(".checksign").get(index-1)).css("display","none");          

        }else{
            $($(".checksign").get(index-1)).css("display","");  
            $($(".wrongsign").get(index-1)).css("display","none");           

        }
    });
});
</script>