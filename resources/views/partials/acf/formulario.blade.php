<section>
  <div class="container">
    <div class="titulo-form">
      <h3> @php the_sub_field('titulo_form_1') @endphp </h3> <span>
      <h3> @php the_sub_field('titulo_form_2') @endphp </h3>
    </div>
  </div>

  <div class="container">
    <form class="form form-contact">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="group">
            <input type="text"  placeholder="Nome" required>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
          <div class="group">
            <input type="text"  placeholder="Empresa" required>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
          <div class="group">
            <input type="text"  placeholder="Cargo" required>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
          <div class="group">
            <input type="text" placeholder="Telefone" required>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="group group-txt" style  ="margin-bottom: 0em !important;">
            <textarea placeholder="Qual o seu objetivo?"></textarea>
            <span class="highlight"></span>
            <span class="bar"></span>
          </div>
          <div class="div-btn">
            <input class="btn btn-primary" type="submit" value="Enviar">
          </div>
        </div>
      </div>
    </form>
  </div>
</section>