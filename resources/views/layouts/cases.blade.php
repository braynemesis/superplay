<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  @php 
    $bc = '';
    foreach (get_body_class() as $class) {
      $bc .= $class . ' ';
    }
    $categories = get_the_category(get_the_ID());
    if (!empty($categories)) {
      foreach ($categories as $category) {
        $bc .= $category->slug;
      }
    }
  @endphp
  <body id="top" class="{!! $bc !!}">
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap" role="document">
      <div class="content">
        <main class="main">
          @yield('featured-image')
          @yield('content')
        </main>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
