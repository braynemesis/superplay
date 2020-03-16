@php
  $pageColor = App::getColor();
  $color = ($pageColor != null) ? 'style="--background-color-category: ' . $pageColor . ';"' : '';
@endphp
<div class="page-header">
  <div class="container">
    <h1 {!! $color !!}>{!! App::title() !!}</h1>
  </div>
</div>