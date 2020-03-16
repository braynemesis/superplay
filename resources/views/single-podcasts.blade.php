@extends('layouts.cases')

@section('featured-image')
  @include('partials.page-featured-image-podcasts')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection

