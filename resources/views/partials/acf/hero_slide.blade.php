<section class="hero-slide">
    <div id="hero-slide_carousel" class="carousel slide" data-ride="carousel">
        @php $slides = count(get_sub_field('slides')) @endphp
        @if($slides > 1)
            <ol class="container carousel-indicators">
            @for ($i = 0; $i < $slides; $i++)
                <li data-target="#hero-slide_carousel" data-slide-to="{{ $i }}" {!! ($i == 0) ? 'class="active"' : '' !!}></li>
            @endfor
            </ol>
        @endif
        <div class="carousel-inner">
            @php $index = 0 @endphp
            @while(has_sub_field('slides'))
                @php $url = get_sub_field('link') @endphp
                <div class="carousel-item hero-slide_item {!! ($index ==0) ? 'active' : null !!}" style="background-image: url('{!! get_sub_field('imagem_desktop') !!}'), url('{!! get_sub_field('imagem_mobile') !!}')">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="hero-slide_title">
                                    <span class="hero-slide_title--linha1">{!! get_sub_field('titulo_linha_1') !!}</span>
                                    <span class="hero-slide_title--linha2">{!! get_sub_field('titulo_linha_2') !!}</span>
                                </h2>
                            </div>
                            <div class="col-6 col-lg-5 col-xl-4">
                                <p class="hero-slide_text">{!! get_sub_field('texto') !!}</p>
                                <a class="hero-slide_link" href="{{ $url['url'] }}" {!! ($url['target'])? 'target="' . $url['target'] . '"' : '' !!}>{!! $url['title'] !!}<i></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @php $index++ @endphp
            @endwhile
        </div>
        <div class="col-12 hero-slide_content_scroll-down">
            <button id="go-bottom" type="button" class="btn btn-link">
                <img width="50" heigth="50" class="scroll-down_image" src="@asset('images/scroll_down.png')" alt="Scroll Down" />
            </button>
        </div>
    </div>
</section>