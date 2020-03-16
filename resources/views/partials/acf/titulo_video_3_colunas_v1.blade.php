<section id="video" class="title-video-3-columns-v1 video">
  <div class="container stretch">
    <h1 class="title-video-3-columns-v1_title">
      <span class="title-video-3-columns-v1_title-line1">@php the_sub_field('titulo_linha_1') @endphp</span>
      <span class="title-video-3-columns-v1_title-line2">@php the_sub_field('titulo_linha_2') @endphp</span>
    </h1>

    <div class="title-video-3-columns-v1_video">
      <div class="title-video-3-columns-v1_video-container">
        @php $video_preview = get_sub_field('video_preview') @endphp
        @php $video = get_sub_field('video') @endphp
        <a href="#video" id="stop" class="wow fadeInUp animated" data-wow-delay="0.7s" title="Interrompa a exibição do vídeo" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
          <img src="@asset('images/stop.svg')" alt="Interromper o vídeo" title="Interromper o vídeo">
          Interromper o vídeo
        </a>
        <video id="promo-video" class="video preview" preload="auto" width="320" height="240" autoplay="" loop="" muted="">
          <source src="{{ $video_preview['url'] }}" type="{{ $video_preview['mime_type'] }}">
        </video>
        <a href="#video" id="play" title="Assista ao vídeo" class="wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
          <img src="@asset('images/play.png')" alt="Assista ao vídeo" title="Assista ao vídeo" class="img-fluid">
        </a>
      </div>
      <div class="title-video-3-columns-v1_video-play">É só dar play</div>
    </div>

    <div class="row title-video-3-columns-v1_columns">
      @while (has_sub_field('colunas'))
        @php $image = get_sub_field('imagem') @endphp
        @php $url = get_sub_field('link') @endphp
        <div class="col-12 col-sm-4 d-flex align-items-stretch title-video-3-columns-v1_column">
          <div class="title-video-3-columns-v1_column-content">
            <figure>
              <img
                class="img-fluid title-video-3-columns-v1_column-image"
                src="@php echo wp_get_attachment_image_url( $image['id'], 'full' ) @endphp"
                srcset="@php echo wp_get_attachment_image_srcset( $image['id'], 'full' ) @endphp"
                sizes="@php echo wp_get_attachment_image_sizes( $image['id'], 'full' ) @endphp"
              />
            </figure>
            <h2 class="title-video-3-columns-v1_column-title">
              @php the_sub_field('titulo') @endphp
              <span class="title-video-3-columns-v1_column-title title-video-3-columns-v1_column-title--small">@php the_sub_field('texto') @endphp </span>
            </h2>
          </div>
        </div>
      @endwhile
    </div>
  </div>
</section>
<script>
  jQuery('#play').click(function () {
    jQuery('#video .title-video-3-columns-v1_video-container').append('<video class="video video-sound wow fadeInUp" data-wow-delay="0.7s" preload="auto" width="320" height="240" autoplay="" controls><source src="@php echo $video["url"] @endphp" type="{{ $video["mime_type"] }}"></video>');
    jQuery('#video .title-video-3-columns-v1_video-container video.preview').addClass('invisible');
    jQuery('#stop').addClass('visible');
    jQuery('#play').addClass('invisible');
  });

  jQuery('#stop').click(function () {
    jQuery('.video-sound').remove();
    jQuery('#video .title-video-3-columns-v1_video-container video.preview').removeClass('invisible');
    jQuery('#stop').removeClass('visible');
    jQuery('#play').removeClass('invisible');
  });
</script>