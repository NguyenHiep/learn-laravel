@extends('frontend.theme-ecommerce.template')

@section('title', $record->page_title)
@section('description', $record->page_intro)
@section('keywords', $record->page_keyword)

@section('content')
  <!-- Main Content - start -->
  <main>
    <section class="container">
      <h1>{{ $record->page_title }}</h1>
      <div>{!! $record->page_full !!}</div>
    </section>
  </main>
  <!-- Main Content - end -->
@endsection