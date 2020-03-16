<section class="blocks-2-columns">
    <div class="container">
        <div class="row">
            @php $index = 0 @endphp
            @while (has_sub_field('blocos'))
                @php $image = get_sub_field('imagem') @endphp
                @php $url = get_sub_field('link') @endphp
                <div class="col-12 col-md-4 {!! ($index % 2 != 0) ? 'offset-md-2' : 'offset-md-1' !!} d-flex align-items-stretch blocks-2-columns_column">
                    <div class="blocks-2-columns_column-content">
                        <figure class="blocks-2-columns_column-image">
                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                        </figure>
                        <h2 class="blocks-2-columns_column-title">@php the_sub_field('titulo') @endphp </h2>
                        <p class="blocks-2-columns_column-text">@php the_sub_field('texto') @endphp </p>
                    </div>
                </div>
                @php $index++ @endphp
            @endwhile
        </div>
    </div>
</section>