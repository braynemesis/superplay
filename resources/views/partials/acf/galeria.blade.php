<section class="gallery">
    <div class="container">
        @php $images = get_sub_field('fotos') @endphp
        <!-- ### start of the gallery definition ### -->
        <div id="nanogallery2">gallery_made_with_nanogallery2</div>
        <!-- ### end of the gallery definition ### -->
    </div>
    <script>
        jQuery('#nanogallery2').nanogallery2({
          galleryDisplayTransition: 'none',
          galleryDisplayTransitionDuration: 1500,
          galleryDisplayMode: 'pagination',
          galleryMaxRows: 2,
          thumbnailAlignment: 'center',
          thumbnailHeight: 400,
          thumbnailWidth: 'auto',
          thumbnailGutterWidth: 6,
          thumbnailGutterHeight: 6,
          thumbnailBorderHorizontal: 1,
          thumbnailBorderVertical: 1,
          thumbnailDisplayTransition: 'slideLeft',
          thumbnailDisplayTransitionDuration: 400,
          thumbnailDisplayInterval: 60,
          galleryTheme : { 
            thumbnail: { titleShadow : 'none', descriptionShadow : 'none', titleColor: '#fff', borderColor: '#fff' },
            navigationBreadcrumb: { background : '#3C4B5B' },
            navigationFilter: { background : '#2E7C7F', backgroundSelected: '#19676B', color: '#eee' },
          },
          items: [
            @foreach($images as $image)
              @php $image_array = wp_get_attachment_image_src($image['id'], 'full') @endphp
              @php $alt = trim( strip_tags( get_post_meta( $image['id'], '_wp_attachment_image_alt', true ) ) ); @endphp
              { src: '{!! $image_array[0] !!}', srct: '{!! $image_array[0] !!}', title: '{{ $alt }}' },
            @endforeach
          ],
        });
    </script>
</section>