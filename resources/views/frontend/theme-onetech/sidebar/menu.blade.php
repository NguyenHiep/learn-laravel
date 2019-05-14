@if(count($categories))
<div class="section-sb-current">
  @foreach($categories as $category)
    @if($category->parent_id === 0)
      <h3><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}<span id="section-sb-toggle{{ $loop->index }}" class="section-sb-toggle"><span class="section-sb-ico"></span></span></a></h3>
      <ul class="section-sb-list" id="section-sb-list{{ $loop->index }}">
        @foreach($categories as $sub_category_lv1)
          @if($sub_category_lv1->parent_id === $category->id)
          <li class="categ-1">
            <a href="{{ route('category.show', $sub_category_lv1->slug) }}">
              <span class="categ-1-label">{{ $sub_category_lv1->name }}</span>
            </a>
          </li>
          @endif
        @endforeach
      </ul>
    @endif
  @endforeach
</div>
@endif