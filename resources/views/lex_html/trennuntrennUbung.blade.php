<h1>Trennbar oder untrennbar</h1>

<div id="test">
<p>test</p>
</div>

<form class="" action="index.html" method="post">

  <p>Das neue Kleid <input type="text" name="" value="" class="practice_field1"> mir  <input type="text" name="" value="" class="practice">.(gefallen) </p>

  <p> Anna <input type="text" name="" value="" class="practice_field1"> ständig  <input type="text" name="" value="" class="practice">.(zunehmen) </p>

  <p> Ich <input type="text" name="" value="" class="practice_field1"> mir die neue Wohnung  <input type="text" name="" value="" class="practice">.(ansehen) </p>

  <p> Die Zeit <input type="text" name="" value="" class="practice_field1"> so schnell  <input type="text" name="" value="" class="practice">.(vergehen) </p>

  <p> Ich <input type="text" name="" value="" class="practice_field1"> dir  <input type="text" name="" value="" class="practice">.(vergeben) </p>

  <p> Hier <input type="text" name="" value="" class="practice_field1"> eine neue Siedlung <input type="text" name="" value="" class="practice">.(entstehen) </p>

 <button type="button" name="button" id="testbtn"> Prüfen</button>
</form>





<script>
$("#testbtn").click(function(){

 $.ajax({
  url: "{{route('getSolutions',1)}}",
  type: 'GET',
  success: function(res) {
    res.each(function(index,value){
      console.log("test");
    });
  }
  
 });

});
</script>
