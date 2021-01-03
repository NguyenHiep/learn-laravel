@extends('emails.template')

@section('content')
    @if(!empty($content))
        <div>
            {{ __('frontend.contact.form.name'). ': '. $content['name'] }} <br/>
            {{ __('frontend.contact.form.email'). ': '. $content['email'] }} <br/>
            {{ __('frontend.contact.form.content'). ': '. $content['content'] }} <br/>
        </div>
    @endif
@endsection