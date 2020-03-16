<article @php post_class() @endphp>
  <div class="container entry-content single-jobs_content">
    <div class="row">
      <div class="col-12 single-jobs_content_title-image-container">
        <div class="single-jobs_content_title-container" style="background-image: url({!! get_field('icone')['url'] !!})">
          <h1>
            <span>{!! App::title() !!}</span>
            <span>{!! the_field('tipo_de_vaga') !!}</span>
          </h1>
        </div>
      </div>
      <div class="col-md-2 d-none d-md-block single-jobs_content_icon-container" style="background-image: url({!! get_field('icone')['url'] !!})"></div>
      <div class="col-12 col-md-8">
        <h2>Descrição</h2>
        <p>{!! the_field('descricao') !!}</p>
        <h2>Requisitos</h2>
        <p>{!! the_field('requisitos') !!}</p>
        <div class="single-jobs_content_email-container">
          <h2>Envie seu currículo para:</h2>
          <a href="mailto:{!! the_field('e-mail_de_recebimento') !!}">{!! the_field('e-mail_de_recebimento') !!}</a>
        </div>
      </div>
    </div>
  </div>
</article>
