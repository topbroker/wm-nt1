{{--
  Template Name: Paslaugos
--}}

<?php
$title = get_field('title');
$services = get_field('paslaugos');
?>

@extends('layouts.app')

@section('content')
  <div class="container py-60px">
    <div class="relative">
      <div class="about-title uppercase text-20px md:text-24px font-light pr-4">
        {!! $title !!}
      </div>
      <div class="about-title-separator"></div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-30px my-16">
      @foreach($services as $service)
        <div class="flex items-center space-x-40px">
          <div class="circle">
            <div class="circle-inner"></div>
            <span class="text-24px font-light">{{ $loop->iteration }}</span>
          </div>
          <div class="space-y-2">
            <div class="uppercase font-semibold">{{ $service->post_name }}</div>
            <div class="text-14px">{{ get_field('subtitle', $service->ID) }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
