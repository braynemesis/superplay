@php $color = App::getColor(); @endphp
<section class="hero-v2" @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>
    <div class="hero-v2_content" style="background: {{$color}};     height: 90vh;">
        <div class="container d-flex align-items-center">       
            <div class="row align-items-center">
                <div class="col-12 col-md-5">
                    <h1 class="hero-v2_content_title" style="color: white">
                        <span class="hero-v2_content_title_line--one">{!! the_sub_field('titulo_linha_1') !!}</span>
                        <span class="hero-v2_content_title_line--two">{!! the_sub_field('titulo_linha_2') !!}</span>
                    </h1>
                </div>
                <div class="col-12 col-md-7">
                    @php $image = get_sub_field('imagem') @endphp
                    {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid hero-v2_content_image" )) !!}
                </div>
                <div class="col-12 hero-v2_content_scroll-down">
                    <button id="go-bottom" type="button" class="btn btn-link">
                        <img width="50" heigth="50" class="scroll-down_image" src="@asset('images/scroll_down.png')" alt="Scroll Down" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

