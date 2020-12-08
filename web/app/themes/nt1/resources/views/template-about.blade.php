{{--
  Template Name: Apie
--}}

<?php
$bottom_grp = get_field('bottom');
$signature_image_id = get_field('signature');
$title = get_field('title');
?>

@extends('layouts.app')

@section('content')
    <div class="container py-60px">
        @while(have_posts()) @php(the_post())
            <div class="prose max-w-none mb-60px">
                {!! get_the_content() !!}
            </div>
        @endwhile
        @if(!empty($title))
            <div class="relative mb-8">
                <div class="about-title uppercase text-20px md:text-24px font-light">
                    {!! $title !!}
                </div>
                <div class="about-title-separator"></div>
            </div>
        @endif
        <div class="prose max-w-none column-count-2 column-gap-100px mb-50px">
            {!! get_field('text') !!}
        </div>
        <div class="relative text-center">
            @if(!empty($bottom_grp['line_1']))
                <div class="text-18px mb-1">{{ $bottom_grp['line_1'] }}</div>
                <div class="text-12px font-semibold">{{ $bottom_grp['line_2'] }}</div>
            @endif
            @if($signature_image_id)
                <div class="flex justify-center md:absolute top-0 right-0 mt-8 md:mt-0">
                    <img src="{{ wp_get_attachment_image_url($signature_image_id, 'full') }}" alt="">
                </div>
            @endif
        </div>
    </div>
@endsection
