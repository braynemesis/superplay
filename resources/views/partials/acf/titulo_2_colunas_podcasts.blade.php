<section class="title-4-columns">
    <div class="container stretch">
        <h1 class="title-4-columns_title">{!! the_sub_field('titulo') !!}</h1>
        <div class="row">
            @while (has_sub_field('colunas'))
                <div class="col-6 col-md-3 d-flex align-items-stretch">
                    <div class="title-4-columns_column-content">
                        @php $image = get_sub_field('imagem') @endphp
                        <figure class="title-4-columns_column-image">
                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                        </figure>
                        <h2 class="title-4-columns_column-title">{!! the_sub_field('titulo') !!}</h2>
                    </div>
                </div>
            @endwhile
        </div>
    </div>
</section>