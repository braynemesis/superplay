@if (has_tag())
@php $tags = App::getTags() @endphp
<section class="container section-tags">
  <h1 class="section-tags_title">Tags</h1>
  <ol class="section-tags_tags">
    @php $count = 0 @endphp
    @foreach ($tags as $tag)
      @if($count > 15) @break @endif
      <li>
        <a href="{!! get_tag_link($tag->term_id) !!}">{!! $tag->name !!}</a>
      </li>
      @php $count++ @endphp
    @endforeach
  </ol>
  @if (count($tags) > 15)
    <div class="section-tags_tags-btn-container">
      <button type="button" class="section-tags_tags-btn" data-toggle="modal" data-target="#exampleModal">Ver todas</button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="modal-title" id="exampleModalLabel">Tags</h5>
            <ol class="section-tags_tags section-tags_tags--modal">
              @foreach ($tags as $tag)
                <li>
                  <a href="{!! get_tag_link($tag->term_id) !!}">{!! $tag->name !!}</a>
                </li>
              @endforeach
            </ol>
          </div>
        </div>
      </div>
    </div>
  @endif
</section>
@endif