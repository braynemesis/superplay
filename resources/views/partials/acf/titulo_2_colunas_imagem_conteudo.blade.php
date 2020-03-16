<section class="title-2-columns-image-content" style="background-color: {!! the_sub_field('cor_do_modulo') !!}; color: {!! the_sub_field('cor_do_texto') !!};">
    <div class="container">
        <h1 class="title-2-columns-image-content_title">{!! the_sub_field('titulo_modulo') !!}</h1>
        <div class="row">
            <div class="col-12 col-md-4 offset-md-1">
                @php $image = get_sub_field('imagem') @endphp
                <figure class="title-2-columns-image-content_image">
                    {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                </figure>
            </div>
            <div class="col-12 col-md-6 offset-md-1">
                <div class="title-2-columns-image-content_content">
                    <h2 class="title-2-columns-image-content_content_title">{!! the_sub_field('titulo') !!}</h2>
                    <p class="title-2-columns-image-content_content_text">{!! the_sub_field('texto') !!}</p>
                    @php $url = get_sub_field('link') @endphp
                    <a
                        class="button title-2-columns-image-content_content_link"
                        href="{{ $url['url'] }}"
                        {!! ($url['target'])? 'target="' . $url['target'] . '"' : '' !!}
                        style="--title-2-columns-image-content-bg: {!! the_sub_field('cor_do_link') !!};
                               color: {!! the_sub_field('cor_do_texto_do_link') !!};"
                    >{!! $url['title'] !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>