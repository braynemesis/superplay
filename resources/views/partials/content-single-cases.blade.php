@php $modulo = App::getAcfModule('imagem_apps_site') @endphp
<article @php post_class() @endphp>
  <div class="container entry-content single-cases_content">
    <div class="row">
      <div class="col-12 col-md-5">
        @php $img = wp_get_attachment_image(get_field('icone')['id'], 'full', "", array( "class" => "" )) @endphp
        <div class="single-cases_content_image-icon {!! (strlen($img) <= 0) ? 'empty' : '' !!}">
          {!! $img !!}
        </div>
        <div class="single-cases_content_description d-block d-md-none">{!! get_field('descricao_header') !!}</div>
        @if ($modulo)
        {!! wp_get_attachment_image($modulo['imagem']['id'], 'full', "", array( "class" => "img-fluid d-block d-md-none single-cases_content_image-middle" )) !!}
        @endif
        @php the_content() @endphp
      </div>
    </div>
  </div>
  @php echo App\get_acf_content() @endphp
</article>
