@php
    $args = array(
        'post_type'      => array( 'jobs' ),
        'post_status'    => array( 'publish' ),
        'order'          => 'desc',
        'orderby'        => 'post_date',
        'posts_per_page' => '0'
    );
    $query = new WP_Query( $args );
@endphp
<section class="module-jobs">
    <div class="container">
        <h1 id="trabalhe-conosco" class="module-jobs_title">{!! the_sub_field('titulo') !!}</h1>
        @if ($query->have_posts())
            <div class="owl-carousel owl-theme module-jobs_carousel">
                @while ($query->have_posts())
                    @php $query->the_post() @endphp
                    @php $image = get_field('icone') @endphp
                    <div class="module-jobs_carousel_item">
                        <div class="module-jobs_carousel_item_title-icon-container">
                            <div class="module-jobs_carousel_item_title-container">
                                <a class="module-jobs_carousel_item_title" href="{{ get_permalink() }}">
                                    <h3>
                                        {!! get_the_title() !!}
                                        <span>{!! the_field('tipo_de_vaga') !!}</span>
                                    </h3>
                                </a>
                            </div>
                            <div class="module-jobs_carousel_item_icon-container">
                                <figure class="module-jobs_carousel_item_icon">
                                    {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                                </figure>
                            </div>
                        </div>
                        <h4>Descrição:</h4>
                        <div class="module-jobs_carousel_item_description">
                            {!! mb_substr(get_field('descricao'), 0, 310) !!} {!! (strlen(get_field('descricao')) > 310) ? '...' : '' !!}
                        </div>
                        <a class="module-jobs_carousel_item_link" href="{{ get_permalink() }}">Candidatar-se<i></i></a>
                    </div>
                    @php wp_reset_postdata() @endphp
                @endwhile
            </div>
        @endif

        {!! do_shortcode(get_sub_field('shortcode')) !!}
    </div>
</section>