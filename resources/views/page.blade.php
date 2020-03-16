@extends('layouts.app')

@section('featured-image')
  @include('partials.page-featured-image')
@endsection

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @if(!get_field('nao_exibir_titulo'))
      @include('partials.page-header')
    @endif
    @include('partials.content-page')
  @endwhile
@endsection
