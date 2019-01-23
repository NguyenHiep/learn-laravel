@extends('frontend.theme-ecommerce.template')

@section('title', $record->page_title)
@section('description', $record->page_intro)
@section('keywords', $record->page_keyword)

@section('content')
  <main>
    <section class="container stylization maincont">
      <div class="contacts-map allstore-gmap">
        <div class="marker" data-zoom="15" data-lat="{{$settings->company_lat}}" data-lng="{{$settings->company_lng}}" data-marker="{{ asset('theme-ecommerce/img/marker.png') }}">{{$settings->company_address}}</div>
      </div>
      <br/>
      <div class="contactform-wrap">
        <form action="{{ route('contact.store') }}" method="post" class="form-validate">
          @csrf
          <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>{{__('frontend.contact.title')}}</span></h3>
          <p class="component-desc component-desc-ct">{{__('frontend.contact.description')}}}</p>
          <p class="contactform-field contactform-text">
            <label class="contactform-label">{{__('frontend.contact.form.name')}}</label>
            <span class="contactform-input">
              <input placeholder="{{__('frontend.contact.form.name_placeholder')}}" type="text" name="name" value="{{ old('name') }}" data-required="text"/>
              {{ $errors->first('name') }}
            </span>
          </p>
          <p class="contactform-field contactform-email">
            <label class="contactform-label">{{__('frontend.contact.form.email')}}</label>
            <span class="contactform-input">
              <input placeholder="{{__('frontend.contact.form.email_placeholder')}}" type="email" name="email" value="{{ old('email') }}" data-required="text" data-required-email="email">
              {{ $errors->first('email') }}
            </span>
          </p>
          <p class="contactform-field contactform-textarea">
            <label class="contactform-label">{{__('frontend.contact.form.content')}}</label>
            <span class="contactform-input">
              <textarea placeholder="{{__('frontend.contact.form.content_placeholder')}}" name="content" data-required="text">{{ old('content') }}</textarea>
              {{ $errors->first('content') }}
            </span>
          </p>
          <p class="contactform-submit">
            <input value="{{__('frontend.contact.form.submit')}}" type="submit">
          </p>
        </form>
      </div>
    </section>
  </main>
@endsection