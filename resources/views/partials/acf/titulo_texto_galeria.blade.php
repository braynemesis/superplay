<section class="title-text-gallery">
  <div class="container">
    <div class="row">
      @if (get_sub_field('titulo'))
        <div class="col-12">
          <h1 class="title-text-gallery_title">@php the_sub_field('titulo') @endphp</h1>
        </div>
      @endif
      
      @if (get_sub_field('texto'))
        <div class="col-12 col-md-8 offset-md-2">
          <p class="title-text-gallery_text">@php the_sub_field('texto') @endphp</p>
        </div>
      @endif
    </div>

    @if (get_sub_field('galeria'))
    <div class="row title-text-gallery_gallery">
      @php $images = get_sub_field('galeria'); @endphp
      @foreach($images as $image)
        <div class="col-6 col-md-2">
          <figure class="title-text-gallery_gallery-image">
            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
          </figure>
        </div>
      @endforeach
    </div>
    @endif
  </div>
</section>