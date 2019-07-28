@extends("user._parts.nav_top_basic")

@section('title')
<a class="navbar-brand" href="#pablo">Level 1</a>

@endsection

@section('specific_links')
    <ul class="navbar-nav 2lv_links">
        <li  class="nav-item">
            <a class="nav-link sub-link" href="#" name="subcontent.l1_page1">Artikel</a>
        </li>
        <li  class="nav-item">
            <a class="nav-link sub-link" href="#" name="subcontent.l1_page2">Konjugation</a>
        </li>
        <li  class="nav-item">
            <a class="nav-link sub-link" href="#" name="subcontent.l1_page3">Einfacher Aussagesatz</a>
        </li>
    </ul>
@endsection
