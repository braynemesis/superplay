<section class="title-text-rows" style="background-color: {!! the_sub_field('cor_do_modulo') !!}; color: {!! the_sub_field('cor_do_texto') !!};">
    <div class="container">
        <h1 class="title-text-rows_title">{!! the_sub_field('titulo') !!}</h1>
        <p class="title-text-rows_text">{!! the_sub_field('texto') !!}</p>
        @php $index = 0 @endphp
        @while (has_sub_field('linhas'))
            <div class="row">
                @php $image = get_sub_field('imagem') @endphp
                <div class="col-12 col-md-6 title-text-rows_col {!! ($index % 2 == 0)? 'order-md-12' : null; !!}">
                    <h2 class="title-text-rows_content_title d-block d-md-none">{!! the_sub_field('titulo') !!}</h2>
                    <figure class="title-text-rows_content_image">
                        {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                    </figure>
                </div>
                <div class="col-12 col-md-6 title-text-rows_col">
                    <div class="title-text-rows_content {!! ($index % 2 != 0)? 'text-md-right' : null; !!}">
                        <h2 class="title-text-rows_content_title d-none d-md-block">{!! the_sub_field('titulo') !!}</h2>
                        <p class="title-text-rows_content_text">{!! the_sub_field('texto') !!}</p>
                    </div>
                </div>
            </div>
            @php $index++ @endphp
        @endwhile
    </div>
</section>