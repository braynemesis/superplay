@php $color = App::getColor(); @endphp
<section class="title-center-text" @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 offset-md-3">
                <h1 class="title-center-text_title">{!! the_sub_field('titulo') !!}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col col-md-6 offset-md-6">
                <div class="title-center-text_text">{!! the_sub_field('texto') !!}</div>
            </div>
        </div>
    </div>
</section>