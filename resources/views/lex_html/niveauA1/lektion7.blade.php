<h3>Ergänzen Sie die Endungen</h3>
<button id="checkSolution" class="checkSolution">Eingaben </br>Prüfen</button>

<table>
    <tr>
    <th></th>
        <th>Singular</th>
        <th>Plural</th>
    </tr>
    @foreach($rows as $row)
    <tr class="row">
        @foreach($row['phrase'] as $key=>$text)
            <td> {{ $text}} </td>
            @if ($row['fields'][$key] == true)
            <td> <input type="text" class="input input{{$key}}"></td>
            <td style="display:none;" class="solution solution{{$key}}"> {{ $row['solutions'][$key]}}  </td>
            
            @endif
       @endforeach
       <td class="checksign" style="display:none;"><img src="{{route('get.image','check.png')}}" alt="" style="height:15px;width:auto;margin-left:10px;"></td>
       <td class="wrongsign" style="display:none;"><img src="{{route('get.image','error.png')}}" alt="" style="height:15px;width:auto;margin-left:10px;"></td>

    </tr>
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




