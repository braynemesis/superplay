@extends('layouts.app')

@section('featured-image')
  @include('partials.page-featured-image')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header-single')
    @include('partials.content-single-'.get_post_type())
  @endwhile
  @include('partials.content-featured')
@endsection
