@extends('frontend.theme-ecommerce.template')

@section('title', 'Chào mừng bạn đến với CMS E-commerce laravel Nguyễn Hiệp')
@section('description', 'Cung cấp sỉ và lẻ quần áo')
@section('keywords', 'Quần áo online, áo thun online, quần kaki online')

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      <ul class="b-crumbs">
        <li>
          <a href="{{ route('home') }}">
            Trang chủ
          </a>
        </li>
        
        <li>
          <span>Sản phẩm khuyến mãi</span>
        </li>
      </ul>
      <h1 class="main-ttl"><span>Khuyến mãi</span></h1>
      <!-- Catalog Sidebar - start -->
      <div class="section-sb">
        
        <!-- Catalog Categories - start -->
        <div class="section-sb-current">
          <h3><a href="catalog-list.html">Women <span id="section-sb-toggle" class="section-sb-toggle"><span class="section-sb-ico"></span></span></a></h3>
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
        </div>
        <!-- Catalog Categories - end -->
        
        <!-- Filter - start -->
        <div class="section-filter">
          <button id="section-filter-toggle" class="section-filter-toggle" data-close="Hide Filter" data-open="Show Filter">
            <span>Show Filter</span> <i class="fa fa-angle-down"></i>
          </button>
          <div class="section-filter-cont">
            <div class="section-filter-price">
              <div class="range-slider section-filter-price" data-min="0" data-max="1000" data-from="200" data-to="800" data-prefix="$" data-grid="false"></div>
            </div>
            <div class="section-filter-item">
              <p class="section-filter-ttl">Style <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <p class="section-filter-field">
                  <input id="section-filter-checkbox2-1" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox2-1">Work</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox2-2" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox2-2">Vintage</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox2-3" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox2-3">Cute</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox2-4" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox2-4">Novelty</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox2-5" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox2-5">Brief</label>
                </p>
              </div>
            </div>
            <div class="section-filter-item opened">
              <p class="section-filter-ttl">Material <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <p class="section-filter-field">
                  <input id="section-filter-checkbox3-1" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox3-1">Cotton</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox3-2" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox3-2">Spandex</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox3-3" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox3-3">Polyester</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox3-4" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox3-4">Acetate</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox3-5" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox3-5">Microfiber</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox3-6" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox3-6">Silk</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox3-7" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox3-7">Fur</label>
                </p>
              </div>
            </div>
            <div class="section-filter-item opened">
              <p class="section-filter-ttl">Color <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <ul class="section-filter-color">
                  <li class="active"><img src="img/color/red.jpg" alt="Red"></li>
                  <li><img src="img/color/blue.jpg" alt="Blue"></li>
                  <li><img src="img/color/green.jpg" alt="Green"></li>
                  <li><img src="img/color/yellow.jpg" alt="Yellow"></li>
                  <li><img src="img/color/purple.jpg" alt="Purple"></li>
                </ul>
              </div>
            </div>
            <div class="section-filter-item opened">
              <p class="section-filter-ttl">Decoration <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <div class="section-filter-select">
                  <select data-placeholder="Decoration" class="chosen-select">
                    <option>Pattern</option>
                    <option>Pockets</option>
                    <option>Button</option>
                    <option>Beading</option>
                    <option>LOGO</option>
                    <option>Spliced</option>
                    <option>Letter</option>
                    <option>Pleated</option>
                    <option>Appliques</option>
                    <option>Bow</option>
                    <option>Criss-Cross</option>
                    <option>Crystal</option>
                    <option>Draped</option>
                    <option>Embroidery</option>
                    <option>Feathers</option>
                    <option>Fur</option>
                    <option>Flowers</option>
                    <option>Lace</option>
                    <option>Pearls</option>
                    <option>Ruched</option>
                    <option>Ruffles</option>
                    <option>Sashes</option>
                    <option>Ribbons</option>
                    <option>Sequined</option>
                    <option>Tassel</option>
                    <option>Rivet</option>
                    <option>Hole</option>
                    <option>Hollow Out</option>
                    <option>Embroidered Flares</option>
                    <option>Cuffs</option>
                    <option>Patches</option>
                    <option>Fake Zippers</option>
                    <option>Bleached</option>
                    <option>Ripped</option>
                    <option>Washed</option>
                    <option>Patchwork</option>
                    <option>Scratched</option>
                    <option>Side Stripe</option>
                    <option>None</option>
                    <option>Character</option>
                    <option>Other</option>
                    <option>Badge</option>
                    <option>Offset printing</option>
                    <option>Patch pocket</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="section-filter-item opened">
              <p class="section-filter-ttl">Manufacturer country <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <div class="section-filter-select">
                  <select data-placeholder="Manufacturer country" class="chosen-select" multiple>
                    <optgroup label="EUROPE">
                      <option>Albania</option>
                      <option>Andorra</option>
                      <option>Armenia</option>
                      <option>Austria</option>
                      <option>Azerbaijan</option>
                      <option>Belarus</option>
                      <option>Belgium</option>
                      <option>Bosnia and Herzegovina</option>
                      <option>Bulgaria</option>
                      <option>Croatia</option>
                      <option>Cyprus</option>
                      <option>Czech Republic</option>
                      <option>Denmark</option>
                      <option>Estonia</option>
                      <option>Finland</option>
                      <option>France</option>
                      <option>Georgia</option>
                      <option>Germany</option>
                      <option>Greece</option>
                      <option>Hungary</option>
                      <option>Iceland</option>
                      <option>Ireland</option>
                      <option>Italy</option>
                      <option>Latvia</option>
                      <option>Liechtenstein</option>
                      <option>Lithuania</option>
                      <option>Luxembourg</option>
                      <option>Macedonia</option>
                      <option>Malta</option>
                      <option>Moldova</option>
                      <option>Monaco</option>
                      <option>Montenegro</option>
                      <option>Netherlands</option>
                      <option>Norway</option>
                      <option>Poland</option>
                      <option>Portugal</option>
                      <option>Romania</option>
                      <option>San Marino</option>
                      <option>Serbia</option>
                      <option>Slovakia</option>
                      <option>Slovenia</option>
                      <option>Spain</option>
                      <option>Sweden</option>
                      <option>Switzerland</option>
                      <option>Ukraine</option>
                      <option>United Kingdom</option>
                      <option>Vatican City</option>
                    </optgroup>
                    <optgroup label="ASIA">
                      <option>Afghanistan</option>
                      <option>Bahrain</option>
                      <option>Bangladesh</option>
                      <option>Bhutan</option>
                      <option>Brunei</option>
                      <option>Burma (Myanmar)</option>
                      <option>Cambodia</option>
                      <option>China</option>
                      <option>East Timor</option>
                      <option>India</option>
                      <option>Indonesia</option>
                      <option>Iran</option>
                      <option>Iraq</option>
                      <option>Israel</option>
                      <option>Japan</option>
                      <option>Jordan</option>
                      <option>Kazakhstan</option>
                      <option>Korea, North</option>
                      <option>Korea, South</option>
                      <option>Kuwait</option>
                      <option>Kyrgyzstan</option>
                      <option>Laos</option>
                      <option>Lebanon</option>
                      <option>Malaysia</option>
                      <option>Maldives</option>
                      <option>Mongolia</option>
                      <option>Nepal</option>
                      <option>Oman</option>
                      <option>Pakistan</option>
                      <option>Philippines</option>
                      <option>Qatar</option>
                      <option>Russian Federation</option>
                      <option>Saudi Arabia</option>
                      <option>Singapore</option>
                      <option>Sri Lanka</option>
                      <option>Syria</option>
                      <option>Tajikistan</option>
                      <option>Thailand</option>
                      <option>Turkey</option>
                      <option>Turkmenistan</option>
                      <option>United Arab Emirates</option>
                      <option>Uzbekistan</option>
                      <option>Vietnam</option>
                      <option>Yemen</option>
                    </optgroup>
                    <optgroup label="N. AMERICA">
                      <option>Antigua and Barbuda</option>
                      <option>Bahamas</option>
                      <option>Barbados</option>
                      <option>Belize</option>
                      <option>Canada</option>
                      <option>Costa Rica</option>
                      <option>Cuba</option>
                      <option>Dominica</option>
                      <option>Dominican Republic</option>
                      <option>El Salvador</option>
                      <option>Grenada</option>
                      <option>Guatemala</option>
                      <option>Haiti</option>
                      <option>Honduras</option>
                      <option>Jamaica</option>
                      <option>Mexico</option>
                      <option>Nicaragua</option>
                      <option>Panama</option>
                      <option>Saint Kitts and Nevis</option>
                      <option>Saint Lucia</option>
                      <option>Saint Vincent and the Grenadines</option>
                      <option>Trinidad and Tobago</option>
                      <option>United States</option>
                    </optgroup>
                    <optgroup label="S. AMERICA">
                      <option>Argentina</option>
                      <option>Bolivia</option>
                      <option>Brazil</option>
                      <option>Chile</option>
                      <option>Colombia</option>
                      <option>Ecuador</option>
                      <option>Guyana</option>
                      <option>Paraguay</option>
                      <option>Peru</option>
                      <option>Suriname</option>
                      <option>Uruguay</option>
                      <option>Venezuela</option>
                    </optgroup>
                    <optgroup label="AFRICA">
                      <option>Algeria</option>
                      <option>Angola</option>
                      <option>Benin</option>
                      <option>Botswana</option>
                      <option>Burkina</option>
                      <option>Burundi</option>
                      <option>Cameroon</option>
                      <option>Cape Verde</option>
                      <option>Central African Republic</option>
                      <option>Chad</option>
                      <option>Comoros</option>
                      <option>Congo</option>
                      <option>Congo</option>
                      <option>Djibouti</option>
                      <option>Egypt</option>
                      <option>Equatorial Guinea</option>
                      <option>Eritrea</option>
                      <option>Ethiopia</option>
                      <option>Gabon</option>
                      <option>Gambia</option>
                      <option>Ghana</option>
                      <option>Guinea</option>
                      <option>Guinea-Bissau</option>
                      <option>Ivory Coast</option>
                      <option>Kenya</option>
                      <option>Lesotho</option>
                      <option>Liberia</option>
                      <option>Libya</option>
                      <option>Madagascar</option>
                      <option>Malawi</option>
                      <option>Mali</option>
                      <option>Mauritania</option>
                      <option>Mauritius</option>
                      <option>Morocco</option>
                      <option>Mozambique</option>
                      <option>Namibia</option>
                      <option>Niger</option>
                      <option>Nigeria</option>
                      <option>Rwanda</option>
                      <option>Sao Tome and Principe</option>
                      <option>Senegal</option>
                      <option>Seychelles</option>
                      <option>Sierra Leone</option>
                      <option>Somalia</option>
                      <option>South Africa</option>
                      <option>South Sudan</option>
                      <option>Sudan</option>
                      <option>Swaziland</option>
                      <option>Tanzania</option>
                      <option>Togo</option>
                      <option>Tunisia</option>
                      <option>Uganda</option>
                      <option>Zambia</option>
                      <option>Zimbabwe</option>
                    </optgroup>
                    <optgroup label="OCEANIA">
                      <option>Australia</option>
                      <option>Fiji</option>
                      <option>Kiribati</option>
                      <option>Marshall Islands</option>
                      <option>Micronesia</option>
                      <option>Nauru</option>
                      <option>New Zealand</option>
                      <option>Palau</option>
                      <option>Papua New Guinea</option>
                      <option>Samoa</option>
                      <option>Solomon Islands</option>
                      <option>Tonga</option>
                      <option>Tuvalu</option>
                      <option>Vanuatu</option>
                    </optgroup>
                  </select>
                </div>
              </div>
            </div>
            <div class="section-filter-item">
              <p class="section-filter-ttl">Pattern Type <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <p class="section-filter-field">
                  <input id="section-filter-checkbox4-1" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox4-1">Solid</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox4-2" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox4-2">Patchwork</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox4-3" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox4-3">Dot</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox4-4" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox4-4">Print</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox4-5" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox4-5">Character</label>
                </p>
              </div>
            </div>
            <div class="section-filter-item">
              <p class="section-filter-ttl">Fit Type <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <p class="section-filter-field">
                  <input id="section-filter-checkbox5-1" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox5-1">Loose</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox5-2" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox5-2">Skinny</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox5-3" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox5-3">Regular</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox5-4" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox5-4">Straight</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox5-5" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox5-5">Boot Cut</label>
                </p>
              </div>
            </div>
            <div class="section-filter-item opened">
              <p class="section-filter-ttl">Fabric Type <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <p class="section-filter-field">
                  <input id="section-filter-radio1-1" value="on" type="radio" name="section-filter-radio1">
                  <label class="section-filter-radio" for="section-filter-radio1-1">Velour</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-radio1-2" value="on" type="radio" name="section-filter-radio1">
                  <label class="section-filter-radio" for="section-filter-radio1-2">Batik</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-radio1-3" value="on" type="radio" name="section-filter-radio1">
                  <label class="section-filter-radio" for="section-filter-radio1-3">Chiffon</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-radio1-4" value="on" type="radio" name="section-filter-radio1">
                  <label class="section-filter-radio" for="section-filter-radio1-4">Broadcloth</label>
                </p>
              </div>
            </div>
            <div class="section-filter-item">
              <p class="section-filter-ttl">Wash <i class="fa fa-angle-down"></i></p>
              <div class="section-filter-fields">
                <p class="section-filter-field">
                  <input id="section-filter-checkbox6-1" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox6-1">Colored</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox6-2" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox6-2">Light</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox6-3" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox6-3">Medium</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox6-4" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox6-4">Stonewashed</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox6-5" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox6-5">White</label>
                </p>
                <p class="section-filter-field">
                  <input id="section-filter-checkbox6-6" value="on" type="checkbox">
                  <label class="section-filter-checkbox" for="section-filter-checkbox6-6">Distrressed</label>
                </p>
              </div>
            </div>
            <div class="section-filter-buttons">
              <input class="btn btn-themes" id="set_filter" name="set_filter" value="Apply filter" type="button">
              <input class="btn btn-link" id="del_filter" name="del_filter" value="Reset" type="button">
            </div>
          </div>
        </div>
        <!-- Filter - end -->
      
      </div>
      <!-- Catalog Sidebar - end -->
      <!-- Catalog Items | Gallery V1 - start -->
      <div class="section-cont">
        
        <!-- Catalog Topbar - start -->
        <div class="section-top">
          
          <!-- View Mode -->
          <ul class="section-mode">
            <li class="section-mode-gallery active"><a title="View mode: Gallery" href="{{ route('product.promotion', ['mode' => 'gallery']) }}"></a></li>
            <li class="section-mode-list"><a title="View mode: List" href="{{ route('product.promotion', ['mode' => 'list']) }}"></a></li>
            <li class="section-mode-table"><a title="View mode: Table" href="{{ route('product.promotion', ['mode' => 'table']) }}"></a></li>
          </ul>
          
          <!-- Sorting -->
          <div class="section-sortby">
            <p>default sorting</p>
            <ul>
              <li>
                <a href="#">sort by popularity</a>
              </li>
              <li>
                <a href="#">low price to high</a>
              </li>
              <li>
                <a href="#">high price to low</a>
              </li>
              <li>
                <a href="#">by title A <i class="fa fa-angle-right"></i> Z</a>
              </li>
              <li>
                <a href="#">by title Z <i class="fa fa-angle-right"></i> A</a>
              </li>
              <li>
                <a href="#">default sorting</a>
              </li>
            </ul>
          </div>
          
          <!-- Count per page -->
          <div class="section-count">
            <p>12</p>
            <ul>
              <li><a href="#">12</a></li>
              <li><a href="#">24</a></li>
              <li><a href="#">48</a></li>
            </ul>
          </div>
        
        </div>
        <!-- Catalog Topbar - end -->
        <div class="prod-items section-items">
          @foreach($products as $product)
            <div class="prod-i">
              <div class="prod-i-top">
                <a href="{{ route('product.show', $product->slug) }}" class="prod-i-img">
                  @if(!empty($product->pictures))
                    <img src="{{ asset(UPLOAD_PRODUCT.$product->pictures)}}" alt="{{ $product->name }}" class="img-responsive" title="{{ $product->name }}"/>
                  @else
                    <img src="http://placehold.it/250x350" alt="{{ $product->name }}" title="{{ $product->name }}">
                  @endif
                </a>
                <p class="prod-i-info">
                  <a href="javascript:void(0)" class="prod-i-favorites" data-id="{{ $product->id }}"><span>Yêu thích</span><i class="fa fa-heart"></i></a>
                  <a href="javascript:void(0)" class="qview-btn prod-i-qview" data-id="{{ $product->id }}"><span>Xem nhanh</span><i class="fa fa-search"></i></a>
                  <a class="prod-i-compare" href="javascript:void(0)" data-id="{{ $product->id }}"><span>So sánh</span><i class="fa fa-bar-chart"></i></a>
                </p>
                <a href="javascript:void(0)" class="prod-i-buy">Thêm vào giỏ hàng</a>
                <p class="prod-i-properties-label"><i class="fa fa-info"></i></p>
        
                <div class="prod-i-properties">
                  {!! $product->short_description !!}
                </div>
                {{-- <div class="prod-sticker">
                   <p class="prod-sticker-1">Mới</p>
                   <br><p class="prod-sticker-2">Hot</p>
                 </div>--}}
              </div>
              <h3>
                <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
              </h3>
              <p class="prod-i-price">
                <b>{{ format_price($product->price) }}</b>
                <del>{{ format_price($product->price) }}</del>
              </p>
            </div>
          @endforeach
        </div>
        
        <!-- Pagination - start -->
        <ul class="pagi">
          <li class="active"><span>1</span></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li class="pagi-next"><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
        </ul>
        <!-- Pagination - end -->
      </div>
      <!-- Catalog Items | Gallery V1 - end -->
      
      
    </section>
  </main>
  <!-- Main Content - end -->
@endsection