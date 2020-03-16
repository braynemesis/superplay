@php
  $args = array(
    'post_type' => array('depoimentos'),
    'post_status' => array('publish'),
    'order' => 'desc',
    'orderby' => 'post_date',
    'posts_per_page' => '3'
  );
  $query = new WP_Query($args);
@endphp
<section class="title-gallery-testimonials">
    <div class="container">
        <h1 class="title-gallery-testimonials_title">
            <span>{!! the_sub_field('titulo_linha_1') !!}</span>
            <span>{!! the_sub_field('titulo_linha_2') !!}</span>
        </h1>
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 d-flex align-items-stretch title-gallery-testimonials_gallery-col">
                <div class="row title-gallery-testimonials_gallery">
                    @php $images = get_sub_field('galeria') @endphp
                    @foreach($images as $image)
                        <div class="col-6 col-lg-4">
                            <figure class="title-gallery-testimonials_gallery-image">
                                {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                            </figure>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-1 d-flex align-items-stretch">
                @if ($query->have_posts())
                    <div id="testimonials_carousel" class="carousel slide title-gallery-testimonials_carousel" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @for ($i = 0; $i < $query->found_posts; $i++)
                                <li data-target="#testimonials_carousel" data-slide-to="{{ $i }}" class="{!! ($i == 0) ? 'active' : null !!}"></li>
                            @endfor
                        </ol>
                        <div class="carousel-inner" style="background-image: url(@asset('images/quotes.png'))">
                            @php $index = 0 @endphp
                            @while ($query->have_posts())
                                @php $query->the_post() @endphp
                                @php $categories = get_the_category(get_the_ID()); @endphp
                                @php $color = get_field('cor', 'category_'. $categories[0]->term_id); @endphp
                                <div class="carousel-item {!! ($index == 0) ? 'active' : null !!}">
                                    <p>{!! substr(get_the_content(), 0, 280) !!}<p>
                                    <h2 @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>{!! get_the_title() !!},</h2>
                                    <h3>{!! the_field('cargo') !!}</h3>
                                </div>
                                @php $index ++ @endphp
                                @php wp_reset_postdata() @endphp
                            @endwhile
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>