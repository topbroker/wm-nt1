@extends('layouts.app')

@section('content')
    @include('partials.section-hero')

    @if(!empty($posts))
        <div class="section-blog my-70px">
            <div class="container">
                <div class="section-heading">
                    <div class="section-heading-title-wrap">
                        <h2 class="section-heading-title">Tinklaraštis</h2>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-30px">
                    @foreach($posts as $post)
                        <a href="{{ get_permalink($post) }}" class="blog-post relative rounded-4px overflow-hidden">
                            @if($kam = get_field('kam', $post))
                                <div class="inline-block absolute top-0 left-0 z-10 bg-brand-1 opacity-85 text-brand-2 uppercase text-14px px-4 py-1">
                                    {{ $kam['label'] }}
                                </div>
                            @endif
                            <figure class="relative block overflow-hidden bg-gray-1 rounded-4px bg-cover bg-no-repeat h-200px transition-opacity duration-500 hover:opacity-75" style="background-image:url({{ get_the_post_thumbnail_url($post, 'nt-objektai') }})"></figure>
                            <h2 class="font-sans font-semibold py-4">{{ $post->post_title }}</h2>
                        </a>
                    @endforeach
                </div>
                <div class="text-center mt-10px">
                    <a href="{{ get_post_type_archive_link('post') }}" class="text-14px text-red-1 uppercase tracking-42px border-b border-black-2 transition-all duration-300 hover:border-gray-3 px-4px">
                        Daugiau
                    </a>
                </div>
            </div>
        </div>
    @endif
@stop