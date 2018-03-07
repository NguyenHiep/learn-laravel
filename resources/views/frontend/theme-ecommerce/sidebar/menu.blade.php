@if(count($categories))
<!-- Catalog Categories - start -->
<div class="section-sb-current">
  @foreach($categories as $category)
    @if($category->parent_id === 0)
      <h3><a href="{{ route('product.category', $category->slug) }}">{{ $category->name }}<span id="section-sb-toggle" class="section-sb-toggle"><span class="section-sb-ico"></span></span></a></h3>
      <ul class="section-sb-list" id="section-sb-list">
        <li class="categ-1">
          <a href="catalog-list.html">
            <span class="categ-1-label">Knitwear</span>
          </a>
        </li>
        <li class="categ-1">
          <a href="catalog-list.html">
            <span class="categ-1-label">Dresses</span>
          </a>
        </li>
        <li class="categ-1 has_child">
          <a href="catalog-list.html">
            <span class="categ-1-label">Bags</span>
            <span class="section-sb-toggle"><span class="section-sb-ico"></span></span>
          </a>
          <ul>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Shoulder Bags</span>
              </a>
            </li>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Falabella</span>
              </a>
            </li>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Becks</span>
              </a>
            </li>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Clutches</span>
              </a>
            </li>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Travel Bags</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="categ-1 has_child">
          <a href="catalog-list.html">
            <span class="categ-1-label">Accessories</span>
            <span class="section-sb-toggle"><span class="section-sb-ico"></span></span>
          </a>
          <ul>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Sunglasses</span>
              </a>
            </li>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Tech Cases</span>
              </a>
            </li>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Jewelry</span>
              </a>
            </li>
            <li class="categ-2">
              <a href="catalog-list.html">
                <span class="categ-2-label">Stella</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="categ-1">
          <a href="catalog-list.html">
            <span class="categ-1-label">Coats & Jackets</span>
          </a>
        </li>
      </ul>
    @endif
  @endforeach
</div>
<!-- Catalog Categories - end -->
@endif