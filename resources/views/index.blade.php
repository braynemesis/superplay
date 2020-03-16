@extends('layouts.app')

@section('featured-image')
  @include('partials.page-featured-image')
@endsection

@section('content')
  @include('partials.page-header')
  @include('partials.scroll_down')
  @include('partials.tags')
  @include('partials.content-featured')
  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $args = array(
      'post_type'              => array( 'post' ),
      'post_status'            => array( 'publish' ),
      'order'                  => 'desc',
      'orderby'                => 'post_date',
      'posts_per_page'         => '4',
      'paged'                  => $paged
    );
    $query = new WP_Query( $args );
  @endphp

  @if ($query->have_posts())
    @php $index = 0 @endphp
    @while ($query->have_posts())
      @php $query->the_post() @endphp
      @if (get_post_type() == 'post')
        @if ($index % 2 == 0)
          @include('partials.content-'.get_post_type())
        @else
          @include('partials.content-inverted-'.get_post_type())
        @endif
        @php $index ++ @endphp
      @else
        @include('partials.content-'.get_post_type())
      @endif
    @endwhile

    <div class="pagination">
      <div class="container">
        <div class="row">
          <div class="col pagination_label-link">{!! get_previous_posts_link() !!}</div>
          <div class="col pagination_numbers-link d-none d-md-block">
            {!! App\pagination_number($query) !!}
          </div>
          <div class="col pagination_label-link pagination_label-link--right">{!! get_next_posts_link() !!}</div>
        </div>
      </div>
    </div>
  @endif
@endsection
