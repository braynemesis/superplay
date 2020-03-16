<section class="title-2-columns-text-image">
    <div class="container">
        <h1 class="title-2-columns-text-image_title" style="
        text-align: left;
        font-size: 3em;
        line-height: 1.2em;
    ">
            <span>{!! the_sub_field('titulo_linha_1') !!}</span>
            <span style="margin: 0">{!! the_sub_field('titulo_linha_2') !!}</span>
        </h1>
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="title-2-columns-text-image_text" style="font-size: 22px;">{!! the_sub_field('texto') !!}</p>
            </div>
            <div class="col-12 col-md-5 offset-md-1">
                <div class="title-2-columns-text-image_image-container" style="
                background: none;
            ">
                    @php $image = get_sub_field('imagem') @endphp
                    <figure class="title-2-columns-text-image_image" style="
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    align-self: center;
                    justify-self: center;
                    margin-top: -3em;
                ">
                        {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>