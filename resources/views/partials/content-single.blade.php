@php
  $pageColor = App::getColor();
  $color = ($pageColor != null) ? 'style="--background-color-category: ' . $pageColor . ';"' : '';
@endphp
<article @php post_class() @endphp {!! $color !!}>
  <div class="container content-single">
    <div class="row">
      <div class="col-12 col-md-10 offset-md-1">
        @include('partials.scroll_down')
        @include('partials.tags')
        <div class="entry-content">
          @php the_content() @endphp
          <?php echo sharethis_inline_buttons(); ?>
        </div>
		  <?php echo do_shortcode( '[contact-form-7 id="1895" title=""]' ); ?>
        <footer>
          {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
        </footer>
      </div>
    </div>
  </div>
</article>
<style>

.circle-2:after {
    content: "";
    width: 10em;
    height: 1.6em;
    background-color: #fdef4d;
    color: #fdef4d;
    position: absolute;
    left: -30px;
    z-index: -1;
    bottom: -35px;
}


.circle-2 {
    position: relative;
	margin-bottom: 0.4em !important;
}

.newsletter-subscript .btn-dark{
	background-color: #000;
    font-family: Gilroy,sans-serif;
    font-weight: 700;
    color: #fff;
    padding: 0.4em 1.2em;
    border-radius: 0;
	transition: all 0.2s;
}

.newsletter-subscript .btn-dark:hover{
opacity: 0.7;	
}
.newsletter-subscript {
    border: 1px solid black;
    padding: 3em 1em 0em 1em;
    background: white;
    font-family: Gilroy,sans-serif;
}

.newsletter-subscript .wpcf7-text {
    border: 1px solid black;
    border-radius: 0;
    padding: 1em;
    font-family: Gilroy,sans-serif;
}

.newsletter-subscript .wpcf7-text::placeholder {
    color: black;
}
.newsletter-subscript .wpcf7-text:focus{
box-shadow: none !important;
}

@media (max-width: 900px){

.newsletter-subscript{
    margin: 1em;
    padding-bottom: 2em;
}
.circle-2{
padding-top: 1em
}
}
</style>