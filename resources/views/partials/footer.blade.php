<div class="container return-top">
  <div class="row">
    <div class="col-12">
      <button id="go-top" type="button" class="btn btn-link">
        <img width="30" heigth="17" src="@asset('images/chevronup.png')" alt="Seta apontando para cima" />
        <span>Voltar ao topo</span>  
      </button>
    </div>
  </div>
</div>
<footer id="footer" class="footer">
  <div class="container d-block d-md-none">
    <div class="row">
      <div class="col-12 footer_logo footer_logo--mobile">
        @php dynamic_sidebar( 'sidebar-footer-logo' ); @endphp
      </div>
      <div class="col-6">
        @php dynamic_sidebar( 'sidebar-footer-menu' ); @endphp
        @php dynamic_sidebar( 'sidebar-footer-menu-social' ); @endphp
      </div>
      <div class="col-6 footer_img footer_img--mobile">
        @php dynamic_sidebar( 'sidebar-footer-info' ); @endphp
        @php dynamic_sidebar( 'sidebar-footer-image' ); @endphp
      </div>
    </div>
  </div>
  <div class="container d-none d-md-block">
    <div class="row">
      <div class="col col-3">
        <div>
          @php dynamic_sidebar( 'sidebar-footer-logo' ); @endphp
          @php dynamic_sidebar( 'sidebar-footer-menu-social' ); @endphp
        </div>
      </div>
      <div class="col col-3">
        <div>
          @php dynamic_sidebar( 'sidebar-footer-menu' ); @endphp
        </div>
      </div>
      <div class="col col-4">
        <div>
          @php dynamic_sidebar( 'sidebar-footer-info' ); @endphp
        </div>
      </div>
      <div class="col col-2 footer_img">
        <div>
          @php dynamic_sidebar( 'sidebar-footer-image' ); @endphp
        </div>
      </div>
    </div>
  </div>
</footer>