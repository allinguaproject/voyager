<nav class="navbar fixed-top-smt flex-nowrap">
    <a href="/" class="navbar-brand">Top</a>
    <ul class="navbar-nav flex-row">
        <li class="nav-item active">
            <a class="nav-link px-2" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-2" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-2" href="#">Link</a>
        </li>
    </ul>
    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbar2">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<nav class="navbar navbar-expand-md bg-light">
    <div class="navbar-collapse collapse pt-2 pt-md-0" id="navbar2">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
        </ul>
    </div>
</nav>

<script>
$(".nav-link").click(function(){
      
       
      console.log("test");
      //var html="./content/"+this.name+".blade.php";
      //$("#content").load(this.name);

})

  </script>