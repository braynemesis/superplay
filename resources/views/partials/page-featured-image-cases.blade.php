@php $id = App::getID() @endphp
@php $image = get_field('imagem_mobile') @endphp
<section class="single-cases_page-header">
  <div class="container">
    <div class="single-cases_page-header_title-type">
      <div class="row">
        <div class="col-12 col-md single-cases_page-header_title-type_title">
          <h1>{!! get_the_title() !!}</h1>
        </div>
        <div class="col-12 col-md single-cases_page-header_title-type_type">
          <h2>{!! get_field('tipo_de_case') !!}</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-9 col-md-6 d-flex">
        <div>
          {!! wp_get_attachment_image(get_field('logo')['id'], 'full', "", array( "class" => "img-fluid single-cases_page-header_logo" )) !!}
          <div class="single-cases_page-header_description d-none d-md-block">{!! get_field('descricao_header') !!}</div>
        </div>
      </div>
      <div class="col-3 col-md-5 offset-md-1 d-flex">
        <div class="single-cases_page-header_image">
          {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "d-block d-md-none" )) !!}
          {!! wp_get_attachment_image(get_post_thumbnail_id($id), 'full', "", array( "class" => "d-none d-md-block" )) !!}
        </div>
      </div>
    </div>
    <div class="clear-fix"></div>
    <div class="single-cases_page-header_scroll-down d-none d-md-block">
      <button id="go-bottom" type="button" class="btn btn-link">
        <img width="50" heigth="50" class="single-cases_page-header_scroll-down_image" src="@asset('images/scroll_down_white.png')" alt="Scroll Down" />
      </button>
    </div>
  </div>
  <div class="single-cases_background-page-header"
  {!! (get_field("cor_do_header")) ? 'style="--background-color-header: ' . get_field('cor_do_header') . ';"' : ''; !!}
  ></div>
</section>