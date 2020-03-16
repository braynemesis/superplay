<section>
  <div class="container">
    <div class="marcas">
      <div class="titulo-marcas">
        <h3> @php the_sub_field('titulo_marcas_1') @endphp </h3>
        <h3> @php the_sub_field('titulo_marcas_2') @endphp </h3>
      </div>
      <div class="row">
        @while (has_sub_field('imagens_marcas'))
        <div class="col-6 col-sm-4">
          @php $image = get_sub_field('imagem') @endphp
          {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid image-text-link__image" )) !!}
        </div>
        @endwhile
      </div>
    </div>
  </div>
</section>