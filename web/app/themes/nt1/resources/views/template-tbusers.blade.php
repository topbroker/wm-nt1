{{--
  Template Name: Komanda
--}}

@extends('layouts.app')

@section('content')
  <div class="container py-60px">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
      @foreach($tbusers as $tbuser)
        <div class="member">
        <a href="/komanda/{{ sanitize_title($tbuser->name) }}-{{ $tbuser->id }}" class="relative block swap_image">
          <div class="h-261px mx-auto md:mx-0 rounded-4px overflow-hidden object-cover">
            <img src="{{ $tbuser->image_url }}" class="" alt="">
          </div>
        </a>
        <div class="text-center md:text-left my-4 text-14px space-y-1">
          <h2 class="sm:text-18px font-bold">{{ $tbuser->name}}</h2>
          <div class="text-black-3 font-semibold">{{ $tbuser->additional_fields->c_f_u_pareigos }}</div>
          <div>
              <a class="font-semibold text-gray-4" href="tel:{{ $tbuser->phone }}">{{ $tbuser->phone }}</a>
          </div>
          <div>
              <a class="font-semibold text-gray-4" href="mailto:{{ $tbuser->email }}">{{ $tbuser->email }}</a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
@endsection
