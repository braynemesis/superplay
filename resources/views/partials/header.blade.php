@php
  $class = (!array_search('single-cases', get_body_class())) ? 'navbar--big' : 'navbar--cases';
  $style = 'style="';

  $style .= (get_field('cor_do_header')) ? '--background-color-header: ' . get_field('cor_do_header') . '; ' : '';
  $style .= (get_field('cor_do_texto_do_header')) ? '--color-header: ' . get_field('cor_do_texto_do_header') . '; ' : '';
  $style .= (get_field('cor_do_hover_do_texto_do_header')) ? '--background-color-hover-header: ' . get_field('cor_do_hover_do_texto_do_header') . ';' : '';
  $style .= '"';
@endphp
<header>
  <nav
    class="navbar fixed-top navbar-expand-md navbar--custom {{ $class }}"
    {!! $style !!}
  >
    <div class="container-fluid container--custom">
      @php App\the_navbar_brand() @endphp
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="hamburger hamburger--close">
          <span class="bar"></span>
          <span class="bar"></span>
          <span class="bar"></span>
        </span>
      </button>
      <div id="bs-example-navbar-collapse-1" class="navbar-collapse collapse">
        @php
          wp_nav_menu( array(
            'theme_location' => 'primary_navigation',
            'depth'           => 2,
            'container'       => 'div',
            'container_class' => 'navbar-content ml-auto',
            'container_id'    => 'navbar-content',
            'menu_class'      => 'navbar-nav',
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
          ));
        @endphp
      </div>
    </div>
  </nav>
</header>