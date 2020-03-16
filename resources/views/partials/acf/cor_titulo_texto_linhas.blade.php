<section class="color_title_text_rows" style="background-color: {!! get_sub_field('cor') !!}">
    <div class="container">
        <div class="title-and-description">
            <div class="row">
                <div class="col"><h4>{!! get_sub_field('titulo') !!}</h4></div>
            </div>
            <div class="row">
                <div class="col">
                    <p>{!! get_sub_field('texto') !!}</p>
                </div>
            </div>
        </div>
        <div class="info-elements">
            @php $index = 0 @endphp
            @while (has_sub_field('linhas'))
                @if($index % 2 == 0)
                    <div class="row left">
                        <div class="col-12 col-md-6">
                            <h2>{!! get_sub_field('titulo') !!}</h2>
                            <p>{!! get_sub_field('texto') !!}</p>
                        </div>
                        <div class="col-12 col-md-6">
                            @php $image = get_sub_field('imagem') @endphp
                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid title-3-columns-v1_column-image" )) !!}
                        </div>
                    </div>
                @else
                    <div class="row right">
                        <div class="col-12 col-md-6">
                            @php $image = get_sub_field('imagem') @endphp
                            {!! wp_get_attachment_image($image['id'], 'full', "", array( "class" => "img-fluid title-3-columns-v1_column-image" )) !!}
                        </div>
                        <div class="col-12 col-md-6">
                            <h2>{!! get_sub_field('titulo') !!}</h2>
                            <p>{!! get_sub_field('texto') !!}</p>
                        </div>
                    </div>
                @endif
                @php $index ++ @endphp
            @endwhile
        </div>
    </div>
</section>