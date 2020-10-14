<?php
$blog_grp = get_field('blog');
?>

@if(!empty($posts) && $blog_grp['status'])
    <div class="section-blog my-70px">
        <div class="container">
            <div class="section-heading">
                <div class="section-heading-title-wrap">
                    <h2 class="section-heading-title">{{ \wmnt\Helpers::get_string('Tinklaraštis') }}</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-30px">
                @foreach($posts as $post)
                    <a href="{{ get_permalink($post) }}" class="blog-post relative rounded-4px overflow-hidden">
                        @if($kam = get_field('kam', $post))
                            <div class="inline-block absolute top-0 right-0 z-10 bg-blue-1 opacity-85 text-white uppercase text-14px px-6 py-2 mt-4">
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
                    {{ \wmnt\Helpers::get_string('Daugiau') }}
                </a>
            </div>
        </div>
    </div>
@endif