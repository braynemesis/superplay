<section class="title-3-columns-v2">
  <div class="container stretch">
    <h1 class="title-3-columns-v2_title">@php the_sub_field('titulo') @endphp</h1>
    <div class="row">
      @while (has_sub_field('colunas'))
        @php $image = get_sub_field('imagem') @endphp
        <div class="col-12 col-lg-4 d-flex align-items-stretch title-3-columns-v2_column">
          <div class="title-3-columns-v2_column-content">
            <figure class="title-3-columns-v2_column-image">
              {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
            </figure>
            <h2 class="title-3-columns-v2_column-title">@php the_sub_field('titulo') @endphp </h2>
            <p class="title-3-columns-v2_column-text">@php the_sub_field('texto') @endphp </p>
          </div>
        </div>
      @endwhile
    </div>
  </div>
</section>