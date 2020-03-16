@php
  $color = App::getColor();
  $bloco1 = get_sub_field('bloco_1');
  $bloco2 = get_sub_field('bloco_2');
  $bloco3 = get_sub_field('bloco_3');
  $bloco4 = get_sub_field('bloco_4');
  $bloco5 = get_sub_field('bloco_5');
  $bloco6 = get_sub_field('bloco_6');
@endphp
<section class="flowchart" @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>
  <div class="module-rows_row-content">
    <div class="container">
      <div class="row">
        <div class="col col-12 col-md-5 offset-md-2">
          <div class="module-rows_row-content_summary">
            <h2 class="module-rows_row-content_summary_title">{!! $bloco1['titulo'] !!}</h2>
            <p class="module-rows_row-content_summary_text">{!! $bloco1['texto'] !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="flowchart-steps rellax-wrapper">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-5 offset-md-7 col-step col-step--2">
          <div class="col-step_content">
            <div class="before"></div>
            <h3>{!! $bloco2['titulo'] !!}</h3>
          </div>
        </div>

        <div class="col-12 col-md-5 offset-md-7 col-step col-step--3">
          <div class="col-step_content">
            <div class="before"></div>
            <h3>{!! $bloco3['titulo'] !!}</h3>
          </div>
        </div>

        <div class="col-12 col-md-5 offset-md-7 col-step col-step--4">
          <div class="col-step_content">
            <div class="before"></div>
            <h3>{!! $bloco4['titulo'] !!}</h3>
          </div>
        </div>

        <div class="col-12 col-md-5 offset-md-1 col-step col-step--5">
          <div class="col-step_content">
            <div class="before"></div>
            <h3>{!! $bloco5['titulo'] !!}</h3><p>{!! $bloco5['texto'] !!}</p>
          </div>
        </div>

        <div class="w-100 d-none d-md-block"></div>

        <div class="col-12 col-md-5 offset-md-3 col-step col-step--6">
          <div class="col-step_content">
            <div class="rellax before" data-rellax-min="25"></div>
            <h3>{!! $bloco6['titulo'] !!}</h3><p>{!! $bloco6['texto'] !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>