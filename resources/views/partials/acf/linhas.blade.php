@php $color = App::getColor(); @endphp
<section class="module-rows">
@php $index = 0; $leftInit = (get_sub_field('inicia_da_esquerda')) ? 1 : 0; @endphp
@while (has_sub_field('linhas'))
    @php $image = get_sub_field('imagem') @endphp
    <div class="module-rows_row-content {!! ($index % 2 == $leftInit) ? '' : 'module-rows_row-content--inverted' !!}">
        <div class="container stretch">
            <div class="row align-items-center">
                <div class="col-11 col-md-5 order-last d-flex align-items-stretch {!! ($index % 2 == $leftInit) ? 'offset-md-1 order-md-first' : 'offset-md-1 order-md-last' !!}">
                    <div class="module-rows_row-content_summary">
                        <h2 class="module-rows_row-content_summary_title">{!! get_sub_field('titulo') !!}</h2>
                        <p class="module-rows_row-content_summary_text">{!! get_sub_field('texto') !!}</p>
                    </div>
                </div>
                <div class="col-12 col-md-5 d-flex align-items-stretch {!! ($index % 2 == $leftInit) ? 'offset-md-1' : '' !!}">
                    <div class="module-rows_row-content_image">
                        <figure class="module-rows_row-image">
                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid" )) !!}
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @php $index ++ @endphp
@endwhile
</section>