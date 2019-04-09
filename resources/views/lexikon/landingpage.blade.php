@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-1">
    <h2>Label</h2>

  </div>
</div>
<div class="row">
  @include('_parts.nav_left_lex')

  <div class="col-md-10" >
    <div class="LexContent">
      <h2>content</h2>

    </div>
  </div>
</div>
@endsection

