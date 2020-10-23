<?php
$section_hero = get_field('hero_cta');
$section_image_id = $section_hero['background_image'];
?>

@if($section_image_id)
    <div class="section-hero bg-cover bg-center min-h-400px" style="background-image:url({{ wp_get_attachment_image_url($section_image_id, 'xlarge') }})">
@else
    <div class="section-hero bg-cover bg-center min-h-400px" style="background-image:url(@asset('images/daniel-dinuzzo-qCjolcMFaLI-unsplash.jpg'))">
@endif
    <div class="container-big">
        @if($section_hero['status'])
            <div class="section-hero-cta">
                @if(!empty($section_hero['title']))
                    <h2 class="mb-6 text-30px md:text-40px lg:text-60px font-black leading-tight max-w-537px">
                        {{ $section_hero['title'] }}
                    </h2>
                @endif
                @if(!empty($section_hero['subtitle']))
                    <div class="text-18px md:text-24px font-medium mb-4 leading-tight">
                        {!! $section_hero['subtitle'] !!}
                    </div>
                @endif
                @if(!empty($section_hero['text']))
                    <div class="mb-6">
                        {!! $section_hero['text'] !!}
                    </div>
                @endif
                <div class="flex flex-col md:flex-row text-center md:text-left">
                    @if(!empty($section_hero['link_1']['title']))
                        <a href="{{ $section_hero['link_1']['url'] }}" class="mb-4 md:mb-0 md:mr-4 bg-red-1 hover:bg-red-2 px-6 py-4 md:py-2 text-white text-14px uppercase rounded-full shadow-lg">
                            {{ $section_hero['link_1']['title'] }}
                        </a>
                    @endif
                    @if(!empty($section_hero['link_2']['title']))
                        <a href="{{ $section_hero['link_2']['url'] }}" class="bg-transparent text-14px uppercase rounded-full border border-black-1 px-6 py-4 md:py-2">
                            {{ $section_hero['link_2']['title'] }}
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>