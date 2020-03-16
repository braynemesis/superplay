<section class="three-columns">
    <div class="container stretch">
        <div class="row">
            @while (has_sub_field('colunas'))
                @php $image = get_sub_field('imagem') @endphp
                <div class="col-12 col-md-4 d-flex align-items-stretch three-columns_col">
                    <div class="three-columns_content">
                        <figure class="three-columns_content_image">
                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                        </figure>
                        <h2 class="three-columns_content_title">{!! the_sub_field('titulo') !!}</h2>
                        <p class="three-columns_content_text">{!! the_sub_field('texto') !!}</p>
                    </div>
                </div>
            @endwhile
        </div>
    </div>
</section>