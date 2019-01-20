@extends('frontend.theme-ecommerce.template')

@section('title', $record->page_title)
@section('description', $record->page_intro)
@section('keywords', $record->page_keyword)

@section('content')
  <main>
    <section class="container stylization maincont">
      <div class="contacts-map allstore-gmap">
        <div class="marker" data-zoom="15" data-lat="10.7894253" data-lng="106.6463953" data-marker="{{ asset('theme-ecommerce/img/marker.png') }}">83/101 năm châu, phường 11, Quận tân bình, Tp. Hồ Chí Minh</div>
      </div>
      <br/>
      <div class="contactform-wrap">
        <form action="{{ route('contact.store') }}" method="post" class="form-validate">
          @csrf
          <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>Gửi mail</span></h3>
          <p class="component-desc component-desc-ct">Khi cần thêm thông tin , hãy gửi yêu cầu cho chúng tôi .</p>
          <p class="contactform-field contactform-text">
            <label class="contactform-label">Họ và tên</label>
            <span class="contactform-input">
              <input placeholder="Họ và tên" type="text" name="name" />
              {{ $errors->first('name') }}
            </span>
          </p>
          <p class="contactform-field contactform-email">
            <label class="contactform-label">E-mail</label>
            <span class="contactform-input">
              <input placeholder="Email của bạn" type="text" name="email" data-required="text" data-required-email="email">
              {{ $errors->first('email') }}
            </span>
          </p>
          <p class="contactform-field contactform-textarea">
            <label class="contactform-label">Nội dung</label>
            <span class="contactform-input">
              <textarea placeholder="Nội dung" name="mess" data-required="text"></textarea>
              {{ $errors->first('mess') }}
            </span>
          </p>
          <p class="contactform-submit">
            <input value="Gửi mail" type="submit">
          </p>
        </form>
      </div>
    </section>
  </main>
@endsection