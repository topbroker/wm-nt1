{{--
  Template Name: NT Objektai
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        <div class="min-h-140px bg-gray-2 flex items-center">
            <div class="container">
                <div class="section-heading bg-gray-2">
                    <div class="section-heading-title-wrap">
                        <h2 class="section-heading-title bg-gray-2">NT objektai</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden lg:block bg-white filters">
            <div class="container">
                @include('partials.filters')
            </div>
        </div>
        <div x-data="{ show: false }" class="lg:hidden">
            <div x-show="show" class="bg-white filters">
                <div class="container">
                    @include('partials.filters')
                </div>
            </div>
            <div x-show="!show" class="lg:hidden bg-white text-right py-8">
                <div class="container">
                    <span class="inline-flex rounded-md shadow-sm">
                      <button @click.prevent="show = !show" type="button" class="whitespace-no-wrap inline-flex items-center justify-center text-12px uppercase px-8 py-2 border border-transparent leading-6 font-medium rounded-full text-white bg-red-1 hover:bg-red-2 focus:outline-none focus:border-red-2 focus:shadow-outline-indigo active:bg-red-2 transition ease-in-out duration-150">
                          <span x-show="!show">Filtrai</span>
                          <span x-show="show">Suskleisti</span>
                      </button>
                    </span>
                </div>
            </div>
        </div>
    @endwhile
@endsection
