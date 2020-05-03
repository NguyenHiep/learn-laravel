@extends('frontend.theme-phiten.template')

@section('title', $record->page_title)
@section('description', $record->page_intro)
@section('keywords', $record->page_keyword)

@section('content')
    {{-- <main>
       <section class="container stylization maincont">
         <div class="contacts-map allstore-gmap">
           <div class="marker" data-zoom="15" data-lat="{{$settings->company_lat}}" data-lng="{{$settings->company_lng}}" data-marker="{{ asset('theme-ecommerce/img/marker.png') }}">{{$settings->company_address}}</div>
         </div>
         <br/>
         <div class="contactform-wrap">
           <form action="{{ route('contact.store') }}" method="post" class="form-validate">
             @csrf
             <h3 class="component-ttl component-ttl-ct component-ttl-hasdesc"><span>{{__('frontend.contact.title')}}</span></h3>
             <p class="component-desc component-desc-ct">{{__('frontend.contact.description')}}</p>
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
     </main>--}}
    <main id="main">
        <div class="container">
            <div class="content-wrapper clearfix ">

                <div class="page-wrapper clearfix Liên hệ với chúng tôi ">

                    <div class="page-content">
                        <h1 class="text-center page-title">Liên hệ với chúng tôi</h1>
                        <div class="sec-b">
                            <div id="map" style="width: 100%; height: 253px;">
                                <p>
                                    <iframe style="border: 0;" src="//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.2064371493284!2d106.71784231453746!3d10.7954951923086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a908cace9b%3A0xf06b9dabd47c20a0!2sLandmark%204!5e0!3m2!1sen!2s!4v1583208243999!5m2!1sen!2s" width="100%" height="253" frameborder="0" allowfullscreen=""></iframe>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6><strong>CÔNG TY TNHH EFISE (VIỆT NAM)</strong></h6>
                                <p>Nhà phân phối độc quyền Phiten ở Việt Nam</p>
                                <p><strong>Mã số thuế</strong>: 0315423584</p>
                                <p><strong>Địa chỉ đăng ký kinh doanh</strong>: P1-36, Tầng 3, Khu 1, The Prine Residence, 17-19-21 Nguyễn Văn Trỗi, Phường 12, Quận Phú Nhuận, TP.HCM 1</p>
                                <p><strong>Địa chỉ văn phòng</strong>: Landmark Plus, Vinhomes Central Park, 208 Nguyễn Hữu Cảnh, Phường 22, Quận Bình Thạnh, TP.HCM</p>
                                <p><strong>Giờ làm việc</strong>: 9:00 sáng - 6:00 chiều (trừ ngày cuối tuần và ngày lễ)</p>
                                <h6><strong>Phone No:</strong></h6>
                                <ul class="list-unstyled">
                                    <li><a href="tel:+18006801">Tổng đài 1800 6801</a></li>
                                    <li><a href="tel:0353300088">Hotline: 0353 300 088</a></li>
                                </ul>
                                <h6></h6>
                                <h6><strong>Email:</strong></h6>
                                <h6><a href="mailto:vietnamphiten@gmail.com">contact@efise.vn</a></h6>
                            </div>
                            <div class="col-md-5 offset-md-1">
                                <form action="{{ route('contact.store') }}" method="POST" class="form-full">
                                    @csrf
                                    <p class="winput">
                                        <input class="input" name="name" type="text" id="name" placeholder="Họ và tên" required />
                                    </p>
                                    <p class="winput">
                                        <input class="input" name="email" type="email" id="email" placeholder="Email"  required />
                                    </p>
                                    <p class="winput">
                                        <label for="content"></label>
                                        <textarea class="input" name="content" minlength="10" maxlength="300" id="content" placeholder="Tin nhắn" required></textarea>
                                    </p>
                                    <p class="text-center">
                                        <button class="btn full noshadow">Gửi</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection