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
      <div class="col-md-7">
          <iframe height="480px" width="100%" frameborder="no" scrolling="no" seamless src="{{get_field('codigo_embed')}}"></iframe>
          <p class="text pt-3" style="font-size: 16px; line-height: 2em; ">Acompanhe-nos nas seguintes plataformas:</p>
          <div class="row ml-0">
                @while (has_sub_field('podcasts_icons'))
                    @php $image = get_sub_field('imagem') @endphp
                    @php $url = get_sub_field('link') @endphp
                        <a href="{{$url}}" target="_blank" class="pr-3 podcast-icons" />
                        <img src="{{$image}}" class="img-fluid" width="40" height="40" />
                        </a>
              @endwhile      
          </div>
      </div>
    </div>
  </div>
  @php echo App\get_acf_content() @endphp
</article>
<style>
.navbar{
  background: {{get_field('cor_do_header')}}
}
.podcast-icons{
  transition: all 0.2s ease-in-out;
}
.podcast-icons:hover{
  transform: scale(0.9);
}
.navbar-brand{
      border: 2px solid white;
      background: none !important;
      background-color: none;
}
a.nav-link {
    color: {{get_field('cor_do_texto_do_header')}} !important;
}

</style>