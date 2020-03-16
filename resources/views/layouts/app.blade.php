<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  @php 
    $bc = '';
    foreach (get_body_class() as $class) {
      $bc .= $class . ' ';
    }
    if (get_field('cor_da_pagina')) {
      $bc .= 'body--' . get_field('cor_da_pagina');
    }
  @endphp
  <body id="top" class="{!! $bc !!}">
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap" role="document">
      <div class="content">
        @yield('featured-image')
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
