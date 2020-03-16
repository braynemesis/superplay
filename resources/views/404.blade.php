@extends('layouts.app')

@section('content')

  <div class="errorContent404 container">
    <header class="text-center">
      <h1 class="page-title">
        Ops
        <span>Você parece ter se perdido...</span>
      </h1>
    </header><!-- .page-header -->

    <div class="page-content text-center">
      <span class="number404">404</span>
      <a href="/" class="btn">Voltar para "Home"</a>
    </div><!-- .page-content -->
  </div>
@endsection
