<a href="javascript:void(0)" id="generate-captcha">
    <img src="{{ asset('theme-phiten/assets/images/svg/refresh.svg') }}" alt="refresh captcha" style="width: 40px"/>
</a>
{!! captcha_img() !!}

@push('scripts')
<script>
  (function ($) {
    $(document).ready(function () {
      $('#generate-captcha').on('click', _.debounce(function (e) {
        e.preventDefault()
        let anchor = $(this)
        let captcha = anchor.next('img')
        $.ajax({
          type: 'GET',
          url: '{{ route('generate.captcha') }}',
        }).done(function (msg) {
          captcha.attr('src', msg)
        })
      }, 500))
    })
  })(jQuery)
</script>
@endpush
