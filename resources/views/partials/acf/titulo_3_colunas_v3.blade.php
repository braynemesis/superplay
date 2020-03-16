<section class="title-3-columns-v1 text-center justify-content-center d-flex" style="background-color: #F8F8F8;">
  <div class="container stretch">
    <h1 class="title-3-columns-v1_title" style="margin-bottom: 30px;">@php the_sub_field('titulo') @endphp</h1>
    <p style="font-size: 24px; color: #A5A5A5; font-weight: 500;">@php the_sub_field('subtitulo') @endphp</p>
    <div class="row pt-5">
        @while (has_sub_field('colunas'))
          @php $image = get_sub_field('imagem') @endphp
          @php $url = get_sub_field('link') @endphp
          <div class="col-12 col-lg-4 d-flex align-items-stretch title-3-columns-v1_column">
            <div class="title-3-columns-v1_column-content">
              <figure style="margin-bottom: 35px;">
                {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid title-3-columns-v1_column-image" )) !!}
              </figure>
              <h2 class="title-3-columns-v1_column-title" style="font-size: 20px; color: #707171;">@php the_sub_field('titulo') @endphp </h2>
            </div>
          </div>
        @endwhile
    </div>
  </div>
</section>