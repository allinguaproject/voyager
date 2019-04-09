<table width="auto">

<tr>
@foreach($practice["content"]['phrase'] as $key=>$text)
            <td> {{ $text}} </td>
            @if ($practice["content"]['fields'][$key] == true)
            <td> <input type="text" class="input input{{$key}}"></td>
            @isset($practice["content"]["solutions"])

            <td style="display:none;" class="solution solution{{$key}}"> {{$practice["content"]["solutions"][$key]}}  </td>
            @endisset

            @endif
@endforeach
</tr>
</table>