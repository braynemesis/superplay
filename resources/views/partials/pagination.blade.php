<div class="pagination">
  <div class="container">
    <div class="row">
      <div class="col pagination_label-link">{!! get_previous_posts_link() !!}</div>
      <div class="col pagination_numbers-link d-none d-md-block">
        {!! App\pagination_number() !!}
      </div>
      <div class="col pagination_label-link pagination_label-link--right">{!! get_next_posts_link() !!}</div>
    </div>
  </div>
</div>