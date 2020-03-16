@php
  $pageColor = App::getColor();
  $color = ($pageColor != null) ? 'style="--background-color-category: ' . $pageColor . ';"' : '';
@endphp
<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1 col-lg-7 offset-lg-1">
        <h1 {!! $color !!}>{!! App::title() !!}</h1>
      </div>
    </div>
  </div>
</div>