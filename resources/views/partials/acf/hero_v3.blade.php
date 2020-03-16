@php $color = App::getColor(); @endphp
<section class="hero-v2" @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>
    <div class="hero-v2_content">
        <div class="container d-flex align-items-center">       
            <div class="row align-items-center">
                <div class="col-12 col-md-5">
                    <h1 class="hero-v2_content_title" style="color: white">
                        <span class="hero-v2_content_title_line--one">{!! the_sub_field('titulo_linha_1') !!}</span>
                        <span class="hero-v2_content_title_line--two">{!! the_sub_field('titulo_linha_2') !!}</span>
                    </h1>
                </div>
                <div class="col-12 col-md-7" style="visibility: hidden;">
                    @php $image = get_sub_field('imagem') @endphp
                    @php $image_mobile = get_sub_field('imagem_mobile') @endphp
                    {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid hero-v2_content_image" )) !!}
                </div>
                <div class="col-12 hero-v2_content_scroll-down">
                    <button id="go-bottom" type="button" class="btn btn-link">
                        <img width="50" heigth="50" class="scroll-down_image"  src="@asset('images/scroll_down_white.png')" alt="Scroll Down" />
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .wrap{
        padding-top: 0 !important;
       
    }
    .navbar{
        background: {{$color}};
    }
    .hero-v2_content{
    height: 90vh;
    background: url({{$image['url']}}), {{{$color}}};
    background-size: contain;
    background-repeat: no-repeat;
    background-position: 125% bottom, 100vw bottom;
}

@media (max-width: 600px){
     .hero-v2_content{
        background: url({{$image_mobile['url']}}), {{{$color}}};
        background-repeat: no-repeat;
        background-position: 25% bottom, 100vw bottom;
}
}
</style>

<script>
    let navbar = document.querySelector('.navbar')
    document.addEventListener('scroll', function(){ 
        if(window.scrollY > 115){
        navbar.style.background = 'white'
    } else{
        navbar.style.background = "{{$color}}"  
    }

    })  
    </script>