@php
  $args = array(
    'post_type' => array('post'),
    'post_status' => array('publish'),
    'order' => 'desc',
    'orderby' => 'post_date',
    'posts_per_page' => '4',
    'meta_query' => array(
      array(
        'key'     => 'post_em_destaque',
        'value'   => '1',
        'compare' => '=',
      ),
    )
  );
  $query = new WP_Query($args);
@endphp
<section class="content-featured">
  <div class="container">
    <h1 class="content-featured_title">Destaques</h1>
    <div class="owl-carousel owl-carousel--content-featured owl-theme">
      @if($query->have_posts())
        @while ($query->have_posts())
          @php
            $query->the_post();
            $tags = get_the_tags(get_the_ID());
          @endphp
          <div class="content-featured_col item">
            <div class="content-featured_content">
              <div class="content-featured_content-container-image">
                @if (has_post_thumbnail(get_the_ID()))
                  <a href="{!! get_permalink(get_the_ID()) !!}" alt="{!! esc_attr(get_the_title()) !!}">
                    {!! wp_get_attachment_image(get_post_thumbnail_id(get_the_ID()), 'full', "", array( "class" => "img-fluid content-featured_content-image" )) !!}
                  </a>
                @endif
              </div>
              <div class="content-featured_content-summary d-flex">
                <h4 class="content-featured_content-summary_title d-flex">
                  <a href="{!! get_permalink(get_the_ID()) !!}" alt="{!! esc_attr(get_the_title()) !!}">
                    {!! substr(get_the_title(), 0, 65) !!} {!! (strlen(get_the_title()) > 65) ? '...' : '' !!}
                  </a>
                </h4>
                @if (has_tag())
                <ol class="content-featured_content-summary_tags">
                  @php 
                    $repeat = 2;
                    if (count($tags) < 2) {
                      $repeat = count($tags);
                    } else {
                      if ((strlen($tags[0]->name) + strlen($tags[1]->name)) > 25) {
                        $repeat = 1;
                      }
                    }
                    $subinit = 25;
                  @endphp
                  @for ($i = 0; $i < $repeat; $i++)
                    <li>{!! mb_substr($tags[$i]->name, 0, $subinit) !!} {!! (strlen($tags[$i]->name) > $subinit) ? '...' : '' !!}</li>
                    @php $subinit -= ($subinit + 4) @endphp
                  @endfor
                </ol>
                @endif
              </div>
            </div>
          </div>
          @php wp_reset_postdata(); @endphp
        @endwhile
      @endif
    </div>
  </div>
</section>