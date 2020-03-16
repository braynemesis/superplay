@php
    $args = array(
        'post_type'      => array( 'podcasts' ),
        'post_status'    => array( 'publish' ),
        'order'          => 'desc',
        'orderby'        => 'post_date',
        'posts_per_page' => '4'
    );
    $query = new WP_Query( $args );
@endphp
<section class="module-jobs" style="margin-top: -15px; padding: 6rem 0;">
    <div class="container">
    <div class="row">
    <div class="col-12 pl-lg-0">
<h1 class="title-3-columns-v1_title" style="margin-bottom: 30px;color: white">Nossos Shows</h1>
    </div>
    </div>
        @if ($query->have_posts())
            <div class="row">

                @while ($query->have_posts())
                    @php $query->the_post() @endphp
                    @php $image = get_field('imagem_do_carousel') @endphp
        <div class="col-md-6" style="background: #363636; padding: 1.3em">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{$image['url']}}" alt="imagem" class="img-fluid">
                </div>
                <div class="col-md-6 d-flex flex-column" style="justify-content: space-evenly">
                    <p style="font-size: 19px;font-weight: bold;">{{the_title()}} </p>
                    <p>{{the_field('texto_do_card')}} </p>
                   <a class="project-cases_tabs-container_tab-contents_tab-item_summary_link link_href" href="{{the_permalink()}}">Ver mais<i></i></a>
                    <div class="platforms_icons">
                    @while (has_sub_field('podcasts_icons'))
                    @php $icon = get_sub_field('imagem') @endphp
                    @php $url = get_sub_field('link') @endphp
                        <a href="{{$url}}" target="_blank" class="pr-3 podcast-icons">
                        <img src="{{$icon}}" class="img-fluid" width="30" height="30" />
                        </a>
              @endwhile   
              </div>
                </div>
            </div>
        </div>
                 
                    @php wp_reset_postdata() @endphp
                @endwhile
            </div>
        @endif
        {!! do_shortcode(get_sub_field('shortcode')) !!}
    </div>
</section>

<style>

.link_href{

    position: relative;
    font-size: 0.9em;
    color: white;
    bottom: 0;
    top: 0;
    left: 0;
    margin-bottom: 1em;
    transition: all 0.2s ease-in-out;
}
.link_href:hover{
    text-decoration: none;
    outline: none;
    color: #fff;
    -webkit-filter: brightness(90%);
    filter: brightness(90%);
}
.link_href i{
    color: white;
}
.title-3-columns-v1_title{
    max-width: 100%;
}
.title-3-columns-v1_column-content{
    width: 100%;
}
</style>