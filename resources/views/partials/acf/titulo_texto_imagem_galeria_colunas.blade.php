<section class="title-text-image-gallery-columns">
  <div class="container">
    <div class="row">
      @if (get_sub_field('titulo'))
        <div class="col-12 col-md-4 offset-md-4">
          <h1 class="title-text-image-gallery-columns_title">@php the_sub_field('titulo') @endphp</h1>
        </div>
      @endif
      
      @if (get_sub_field('texto'))
        <div class="col-12 col-md-8 offset-md-2">
          <p class="title-text-image-gallery-columns_text">@php the_sub_field('texto') @endphp</p>
        </div>
      @endif

      @php $image = get_sub_field('imagem') @endphp
      @if ($image)
        <div class="col-8 offset-2 col-md-4 offset-md-4">
          <figure class="title-text-image-gallery-columns_image">
            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
          </figure>
        </div>
      @endif
    </div>

    @if (get_sub_field('galeria'))
    <div class="row title-text-image-gallery-columns_gallery">
      @php $images = get_sub_field('galeria'); @endphp
      @foreach($images as $image)
        <div class="col-6 col-md-3">
          <figure class="title-text-image-gallery-columns_gallery-image">
            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
          </figure>
        </div>
      @endforeach
    </div>
    @endif

    @if (get_sub_field('colunas'))
    <div class="row">
      @while (has_sub_field('colunas'))
        <div class="col-12 col-sm-4 title-text-image-gallery-columns_columns">
          <h2 class="title-text-image-gallery-columns_columns-title">@php the_sub_field('titulo') @endphp<span class="title-text-image-gallery-columns_columns-title--small">@php the_sub_field('texto') @endphp</span></h2>
        </div>
      @endwhile
    </div>
    @endif
  </div>
</section>