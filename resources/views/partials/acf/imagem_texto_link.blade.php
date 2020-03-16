@php $color = App::getColor() @endphp
@php $image = get_sub_field('imagem') @endphp
@php $url = get_sub_field('link') @endphp

<section class="image-text-link" @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="image-text-link_image-container">
                    <figure>
                        {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                    </figure>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="image-text-link_text-link-container">
                    <p>@php the_sub_field('texto') @endphp </p>
                    <a href="{{ $url['url'] }}" {!! ($url['target'])? 'target="' . $url['target'] . '"' : '' !!}>{!! $url['title'] !!}</a>
                </div>
            </div>
        </div>
    </div>
</section>