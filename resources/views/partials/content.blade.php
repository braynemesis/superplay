@php
  $id = get_the_ID();
  $tags = get_the_tags($id);
  $categories = get_the_category($id);
  $color = get_field('cor', 'category_'. $categories[0]->term_id);
@endphp
<article class="article-post">
  <div class="container">
    <div class="article-post_content">
      <div class="row">
        <div class="col-12 col-md-6 order-md-12">
          <div
            class="article-post_content-image-container"
            @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp
          >
            <div class="article-post_content-image">
              @if (has_post_thumbnail($id))
                <a href="{{ get_permalink() }}">
                  {!! wp_get_attachment_image(get_post_thumbnail_id($id), 'full', "", array( "class" => "" )) !!}
                </a>
              @endif
            </div>
          </div>
        </div>
        <div class="col-12 col-md-12 order-md-1">
          <div class="article-post_content-date-container">
            @php $date = explode(' ', get_the_date()) @endphp
            <time class="updated article-post_content-date" datetime="{{ get_post_time('c', true) }}">
              <span>{{ $date[0] }}</span>
              {!! substr($date[2], 0, 3) !!}
            </time>
          </div>
        </div>
        <div class="col-12 col-md-5 offset-md-1 order-md-11">
          <div class="article-post_content-summary-container">
            <header>
              <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
              @if (has_tag())
                <ol>
                  @foreach ($tags as $tag)
                    <li>{!! $tag->name !!}</li>
                  @endforeach
                </ol>
              @endif
            </header>
            <div class="entry-summary">
              <p>{!! substr(get_the_content(), 0, 280) . ' ...' !!}</p>
              <a href="{{ get_permalink() }}">Ver mais<i></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</article>