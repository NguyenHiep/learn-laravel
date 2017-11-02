@extends('frontend.template')

@section('title', 'Chào mừng bạn đến với CV Online Nguyễn Hiệp')
@section('description', 'Website giới thiệu thông tin ứng viên Nguyễn Minh Hiệp')
@section('keywords', 'CV Online, Lập trình PHP, Nguyễn Minh Hiệp')

@section('content')
  @foreach($section_display as $section)
    @include('frontend.section.'.$section)
  @endforeach
@endsection