@php
    $categories = get_categories( array(
        'hide_empty' => 1,
        'hierarchical' => true,
        'meta_key'  => 'ordem',
        'orderby'   => 'meta_value',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key'     => 'exibir',
                'value'   => true,
                'compare' => '=',
            ),
        )
    ) );
@endphp

<section class="project-cases">
    <div class="container stretch">
        <h1 class="project-cases_title">{!! the_sub_field('titulo') !!}</h1>
        <div class="project-cases_tabs-container">
            <ul class="nav nav-tabs project-cases_tabs-container_tabs" id="pills-tab" role="tablist">
                @for ($i = 0; $i < count($categories); $i++)
                <li class="nav-item project-cases_tabs-container_tabs_tab-label">
                    <a class="project-cases_tabs-container_tabs_tab-label_a {!! ($i == 0) ? 'active' : '' !!}" id="pills-{{ $categories[$i]->slug }}-tab" data-toggle="tab" href="#pills-{{ $categories[$i]->slug }}" role="tab" aria-controls="pills-{{ $categories[$i]->slug }}" aria-selected="{!! ($i == 0) ? true : false !!}" style="border-color: {!! get_field('cor', 'category_'. $categories[$i]->term_id) !!};">{!! $categories[$i]->name !!}</a>
                </li>
                @endfor
            </ul>
            <div class="tab-content project-cases_tabs-container_tab-contents" id="pills-tabContent">
                @for ($i = 0; $i < count($categories); $i++)
                    <div class="tab-pane fade {!! ($i == 0) ? 'show active' : '' !!}" id="pills-{{ $categories[$i]->slug }}" role="tabpanel" aria-labelledby="pills-{{ $categories[$i]->slug }}-tab">
                        <div class="owl-carousel owl-theme project-cases_owl-carousel">
                            @php
                                $args = array(
                                    'post_type'              => array( 'cases', 'podcasts' ),
                                    'post_status'            => array( 'publish' ),
                                    'order'                  => 'desc',
                                    'orderby'                => 'post_date',
                                    'posts_per_page'         => '0',
                                    'cat'                    => $categories[$i]->term_id
                                );
                                $query = new WP_Query( $args );
                            @endphp
                            @php $index = 0 @endphp
                            @while ($query->have_posts())
                                @php $query->the_post() @endphp
                                @php $image = get_field('imagem_do_carousel') @endphp
                                @php $url = get_sub_field('link') @endphp
                                <div class="item d-flex align-items-stretch">
                                    <div class="project-cases_tabs-container_tab-contents_tab-item">
                                        <a href="{{ get_permalink() }}">
                                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid project-cases_tabs-container_tab-contents_tab-item_image" )) !!}
                                        </a>
                                        <div class="project-cases_tabs-container_tab-contents_tab-item_summary">
                                            <a href="{{ get_permalink() }}" class="project-cases_tabs-container_tab-contents_tab-item_summary_link--image"><h2 class="project-cases_tabs-container_tab-contents_tab-item_summary_title">{!! get_the_title() !!}</h2></a>
                                            <p class="project-cases_tabs-container_tab-contents_tab-item_summary_text">{!! substr(get_field('texto_carousel'), 0, 315) !!} {!! (strlen(get_field('texto_carousel')) > 315) ? '...' : '' !!}</p>
                                            <a class="project-cases_tabs-container_tab-contents_tab-item_summary_link" href="{{ get_permalink() }}">Ver mais<i></i></a>
                                        </div>
                                    </div>
                                </div>
                                @php $index ++ @endphp
                                @php wp_reset_postdata() @endphp
                            @endwhile
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>