@php $image = get_sub_field('imagem') @endphp
@php $url = get_sub_field('site') @endphp

<section class="imagem_apps_site">
    <div class="container imagem_apps_site_content">
        @if ($image)
        {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid d-none d-md-block imagem_apps_site_content_image" )) !!}
        @endif
        @if (get_sub_field('apple_store') || get_sub_field('android_store'))
        <div class="imagem_apps_site_content_store-container">
            <h2>Baixe o app:</h2>
            @if (get_sub_field('apple_store'))
            <a class="imagem_apps_site_content_store_link imagem_apps_site_content_store_link--apple" href="{{ get_sub_field('apple_store') }}" target="_blank">
                <img width="320" heigth="130" src="@asset('images/appstore.png')" alt="Baixar na App Store" />
            </a>
            @endif
            @if (get_sub_field('android_store'))
            <a class="imagem_apps_site_content_store_link imagem_apps_site_content_store_link--android" href="{{ get_sub_field('android_store') }}" target="_blank">
                <img width="320" heigth="130" src="@asset('images/googlestore.png')" alt="Disponível no Google Play" />
            </a>
            @endif
        </div>
        @endif
        @if ($url)
        <div class="imagem_apps_site_content_link-container">
            <h2>Acesse:</h2>
            <a href="{{ $url['url'] }}" {!! ($url['target'])? 'target="' . $url['target'] . '"' : '' !!}>{!! $url['title'] !!}</a>
        </div>
        @endif
    </div>
</section>