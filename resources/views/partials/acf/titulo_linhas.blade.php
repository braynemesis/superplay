@php $color = App::getColor(); @endphp
<section class="title-rows" @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>
  <div class="container">
    <h1 class="title-rows_title">@php the_sub_field('titulo') @endphp</h1>
    @php $index = 0 @endphp
    @while (has_sub_field('linhas'))
      @php $image = get_sub_field('imagem') @endphp
      <div class="title-rows_row-content rellax-wrapper {!! ($index % 2 ==0) ? '' : 'title-rows_row-content--inverted'!!}">
        <div class="row align-items-center">
          <div class="col-12 col-lg-5 {!! ($index % 2 ==0) ? '' : 'offset-lg-1 order-lg-12'!!} title-rows_row-content_col">
            <div class="title-rows_row-content_image">
              <figure class="title-rows_row-image">
                {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
              </figure>
              <div class="rellax title-rows_row-content_shape {!! ($index % 2 ==0) ? 'title-rows_row-content_shape--circle' : 'title-rows_row-content_shape--square'!!}" data-rellax-zindex="-1" data-rellax-min="10"></div>
            </div>
          </div>
          <div class="col-11 col-lg-6 {!! ($index % 2 ==0) ? 'offset-lg-1' : 'offset-xs-1'!!} title-rows_row-content_col">
            <div class="title-rows_row-content_summary">
              <h2 class="title-rows_row-content_summary_title">@php the_sub_field('titulo') @endphp </h2>
              <p class="title-rows_row-content_summary_text">@php the_sub_field('texto') @endphp </p>
            </div>
          </div>
        </div>
      </div>
      @php $index ++ @endphp
    @endwhile
  </div>
</section>