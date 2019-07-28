<div id="app">
    @include("user._parts.nav_top_l1")
<div class="container-fluid">

<div id="subcontent">
</div>
</div>
</div>
   





<script>

var level2 = new Vue({
    el:"#app",
    data:{
        selected: 1
    },       

})


$(".sub-link").click(function(){
      
       
      console.log(this.name);
      //var html="./content/"+this.name+".blade.php";
      var html="level/"+this.name;
      $("#subcontent").load(html);

})




</script>

<style>
.container-fluid{
   
    height:100%;
}

</style>