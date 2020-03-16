@php $color = App::getColor(); @endphp
<section class="title-2-columns-text-image" @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>
    <div class="container">
        <h1 class="title-2-columns-text-image_title">
            <span>{!! the_sub_field('titulo_linha_1') !!}</span>
            <span>{!! the_sub_field('titulo_linha_2') !!}</span>
        </h1>
        <div class="row">
            <div class="col-12 col-md-5">
                <p class="title-2-columns-text-image_text">{!! the_sub_field('texto') !!}</p>
            </div>
            <div class="col-12 col-md-6 offset-md-1">
                <div class="title-2-columns-text-image_image-container">
                    @php $image = get_sub_field('imagem') @endphp
                    <figure class="title-2-columns-text-image_image">
                        {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>