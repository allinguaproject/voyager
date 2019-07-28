<div id="app">
    @include("user._parts.nav_top_l2")
    
<div class="container-fluid">
<p class="sidebar_underTitle">Übungswürfel </p> 

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
      
       
      console.log("test 2");

      var html="./level/"+this.name;

      //var html="./content/"+this.name+".blade.php";
      $("#content").load(html);

})




</script>