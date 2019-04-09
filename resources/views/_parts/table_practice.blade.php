<table width="auto">
    
        @if( $practice["content"]["part"]=="head")
        
        @endif

        @if($practice["content"]["part"]=="body" AND $practice["content"]['purpose']=="solution")
        <tr class="row">        
            @foreach($practice["content"]["columns"] as $key=>$column)
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
  
</table>