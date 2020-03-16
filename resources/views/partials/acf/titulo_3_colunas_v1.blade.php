<section class="title-3-columns-v1">
  <div class="container stretch">
    <h1 class="title-3-columns-v1_title">@php the_sub_field('titulo') @endphp</h1>
    <div class="row">
      @while (has_sub_field('colunas'))
        @php $image = get_sub_field('imagem') @endphp
        @php $url = get_sub_field('link') @endphp
        <div class="col-12 col-lg-4 d-flex align-items-stretch title-3-columns-v1_column">
          <div class="title-3-columns-v1_column-content">
            <figure>
              {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid title-3-columns-v1_column-image" )) !!}
            </figure>
            <h2 class="title-3-columns-v1_column-title">@php the_sub_field('titulo') @endphp </h2>
            <p class="title-3-columns-v1_column-text">@php the_sub_field('texto') @endphp </p>
            <a class="title-3-columns-v1_column-link" href="{{ $url['url'] }}" {!! ($url['target'])? 'target="' . $url['target'] . '"' : '' !!}>{{ $url['title'] }}<i></i></a>
          </div>
        </div>
      @endwhile
    </div>
  </div>
</section>