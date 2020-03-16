<section class="title-text-columns">
    <div class="container stretch">
        <h1 class="title-text-columns_title">{!! the_sub_field('titulo') !!}</h1>
        <p class="title-text-columns_text">{!! the_sub_field('texto') !!}</p>
        <div class="row">
            @while (has_sub_field('colunas'))
                @php $image = get_sub_field('imagem') @endphp
                <div class="col-6 col-md-6 col-lg-3 d-flex align-items-stretch title-text-columns_col">
                    <div class="title-text-columns_content">
                        <figure class="title-text-columns_content_image">
                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                        </figure>
                        <h2 class="title-text-columns_content_text">{!! the_sub_field('titulo') !!}</h2>
                    </div>
                </div>
            @endwhile
        </div>
    </div>
</section>