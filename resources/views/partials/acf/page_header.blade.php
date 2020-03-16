@php
  $title = null;
  $text = null;
  $color = '';
  $colTitle = 'col-md-7';
  $styleTitle = '';
  $colText = 'col-md-5';

  $pageColor = App::getColor();
  $color = ($pageColor != null) ? 'style="--background-color-category: ' . $pageColor . ';"' : '';

  if (get_sub_field('titulo')) {
    $title = get_sub_field('titulo');
    if (get_sub_field('titulo_grande')) {
      $colTitle = 'col-md-8';
      $styleTitle = 'page-header_title--small';
    }
  }

  if (get_sub_field('texto')) {
    $text = get_sub_field('texto');
    $colText = 'col-md-8';
  }

  if(get_sub_field('titulo') && get_sub_field('texto')) {
    $colTitle = 'col-xl-7';
    $colText = 'col-xl-5'; 
  }
@endphp
<div class="page-header">
  <div class="container">
    <div class="row">
        @if ($title)
        <div class="col-12 {{$colTitle}}">  
          <h1 class="{{ $styleTitle }}" {!! $color !!}>{!! $title !!}</h1>
        </div>
        @endif
        @if ($text)
        <div class="col-12 !!$colText}}">
          <p>{!! $text !!}</p>
        </div>
        @endif
    </div>
  </div>
</div>