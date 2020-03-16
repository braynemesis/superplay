<section class="title-shortcode rellax-wrapper">
    <div class="container">
        <h1 class="title-shortcode_title">
            <span>{!! the_sub_field('titulo_linha_1') !!}</span>
            <span>{!! the_sub_field('titulo_linha_2') !!}</span>
        </h1>

        {!! do_shortcode(get_sub_field('shortcode')) !!}

        <!-- <div class="title-shortcode_email-phone">
            <a class="title-shortcode_email" href="mailto:{{ the_sub_field('e-mail') }}">{{ the_sub_field('e-mail') }}</a>
            <span class="title-shortcode_divider d-none d-md-inline">|</span>
            <a class="title-shortcode_phone d-inline-flex d-md-none" href="tel:{{ the_sub_field('telefone') }}">{{ the_sub_field('telefone') }}</a>
            <span class="title-shortcode_phone d-none d-md-inline-flex">{{ the_sub_field('telefone') }}</span>
        </div> -->
    </div>
</section>