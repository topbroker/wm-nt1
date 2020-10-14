@extends('layouts.app')

@section('content')
  <div class="container py-60px">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-30px">
      @while(have_posts()) @php(the_post())
      <a href="{{ get_permalink() }}" class="blog-post relative rounded-4px overflow-hidden">
        @if($kam = get_field('kam', get_the_ID()))
          <div class="inline-block absolute top-0 right-0 z-10 bg-blue-1 opacity-85 text-white uppercase text-14px px-6 py-2 mt-4">
            {{ $kam['label'] }}
          </div>
        @endif
        <figure class="relative block overflow-hidden bg-gray-1 rounded-4px bg-cover bg-no-repeat h-200px transition-opacity duration-500 hover:opacity-75" style="background-image:url({{ get_the_post_thumbnail_url(get_the_ID(), 'nt-objektai') }})"></figure>
        <h2 class="font-sans font-semibold py-4">{{ get_the_title() }}</h2>
      </a>
      @endwhile
    </div>
    <div class="my-8">
      {!! get_the_posts_navigation([
        'prev_text' => __('Senesni įrašai', 'wm'),
        'next_text' => __('Naujesni įrašai', 'wm'),
        'screen_reader_text' => __('Įrašų navigacija', 'wm')
      ]) !!}
    </div>
  </div>
@endsection
