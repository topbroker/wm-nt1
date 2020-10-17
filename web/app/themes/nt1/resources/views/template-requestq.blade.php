{{--
  Template Name: Turto vertė
--}}

<?php

?>

@extends('layouts.app')

@section('content')
  <div class="container container-wide pr-0 md:pr-4 pl-0">
      <div class="flex flex-col md:flex-row">
          <div class="flex-none w-full md:w-1/2 xl:max-w-668px relative">
              <img src="{{ wp_get_attachment_image_url(get_field('image'), 'xlarge') }}" class="object-cover w-full md:w-auto h-260px md:h-full" alt="">
              <h1 class="absolute-center text-white text-40px lg:text-60px font-black">{{ get_field('title') }}</h1>
          </div>
          <div class="flex-1 p-30px">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 sm:gap-16 text-14px mb-40px">
                  <div>
                      {!! get_field('text_1') !!}
                  </div>
                  <div>
                      {!! get_field('text_2') !!}
                  </div>
              </div>
              <div class="requestq-form-wrap">
                  <form action="" method="post">
                      <div class="text-14px font-bold mb-6">{{ \wmnt\Helpers::get_string('1. Įveskite buto arba namo adresą') }}:</div>
                      <div class="grid grid-cols-3 gap-2 sm:gap-8">
                          <div class="filters-label">
                              <label for="city" class="mb-3 text-14px font-semibold">{{ \wmnt\Helpers::get_string('Miestas') }}</label>
                              <select name="city" id="city" class="filters-input-select bg-transparent">
                                  <option value=""></option>
                                  @foreach(\wmnt\Helpers::get_cities() as $city)
                                      <option>{{ $city }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="filters-label">
                              <label for="street" class="mb-3 text-14px font-semibold">{{ \wmnt\Helpers::get_string('Gatvė') }}</label>
                              <input type="text" name="street" id="street" class="filters-input-text bg-transparent">
                          </div>
                          <div class="filters-label max-w-100px">
                              <label for="housenr" class="mb-3 text-14px font-semibold">{{ \wmnt\Helpers::get_string('Namo nr.') }}</label>
                              <input type="number" min="1" name="housenr" id="housenr" class="filters-input-number bg-transparent max-w-full">
                          </div>
                      </div>
                      <div class="text-14px font-bold mb-6 mt-10">{{ \wmnt\Helpers::get_string('2. Įveskite kontaktinę informaciją') }}:</div>
                      <div class="grid grid-cols-3 gap-2 sm:gap-8">
                          <div class="filters-label">
                              <label for="name" class="mb-3 text-14px font-semibold">{{ \wmnt\Helpers::get_string('Vardas') }} *</label>
                              <input type="text" name="name" id="name" class="filters-input-text bg-transparent" required>
                          </div>
                          <div class="filters-label">
                              <label for="email" class="mb-3 text-14px font-semibold">{{ \wmnt\Helpers::get_string('El.paštas.') }} *</label>
                              <input type="text" name="email" id="email" class="filters-input-text bg-transparent" required>
                          </div>
                          <div class="filters-label">
                              <label for="phone" class="mb-3 text-14px font-semibold">{{ \wmnt\Helpers::get_string('Telefono nr.') }} *</label>
                              <input type="text" name="phone" id="phone" class="filters-input-text bg-transparent" required>
                          </div>
                      </div>
                      <div class="my-8">
                          @include('components.tos-agree')
                      </div>
                      <div class="text-center">
                          @include('components.submit-btn')
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
@endsection
