@extends("user._parts.nav_top_basic")

@section('title')
<a class="navbar-brand" href="#pablo">Level 3</a>

@endsection

@section('specific_links')
    <ul class="navbar-nav 2lv_links">
        <li  class="nav-item">
            <a class="nav-link" href="#">test 1</a>
        </li>
        <li  class="nav-item">
            <a class="nav-link " href="#">test 2</a>
        </li>

    </ul>
@endsection


<script>
$(".nav-link").click(function(){
      
       
      console.log("test");
      //var html="./content/"+this.name+".blade.php";
      //$("#content").load(this.name);

})

  </script>