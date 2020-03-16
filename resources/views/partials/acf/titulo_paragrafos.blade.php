<section class="title-paragraph">
    <div class="container">
        <div class="row">
            <div class="col-12 {!! (get_sub_field('alinhar_titulo_com_texto')) ? 'col-md-6 offset-md-2' : '' !!}"><h1 class="title-paragraph_title">{!! the_sub_field('titulo') !!}</h1></div>
            @php $index = 0 @endphp
            @while (has_sub_field('paragrafos'))
                <div class="title-paragraph_col col-12 col-md-6 {!! ($index % 2 == 0) ? 'offset-md-2' : 'offset-md-4' !!}">
                    <p class="title-paragraph_text">@php the_sub_field('texto') @endphp </p>
                </div>
                @php $index++ @endphp
            @endwhile
        </div>
    </div>
</section>