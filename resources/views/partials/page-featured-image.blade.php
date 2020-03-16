@php 
  $id = App::getID();
  $color = App::getColor();
@endphp
@if (has_post_thumbnail($id))
<div class="container-fluid page-featured-image">
  <div class="page-featured-image_content"
    @php echo ($color) ? 'style="--background-color-category: ' . $color . ';"' : '' @endphp
  >
    <div class="page-featured-image_content-image">
      {!! wp_get_attachment_image(get_post_thumbnail_id($id), 'full', "", array( "class" => "" )) !!}
    </div>
  </div>
</div>
@endif