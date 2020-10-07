@extends('layouts.app')

@section('content')
    <?php
    $retype = get_query_var('retype');
    $reobj_data = get_query_var('reobj_data');
    ?>
    <div class="container py-40px lg:py-70px">
        <div class="flex flex-col-reverse lg:flex-row lg:space-x-30px">
            <div class="flex-none lg:w-358px flex flex-col sm:flex-row lg:flex-col">
                <div class="bg-gray-1 p-48px text-center md:text-left shadow-custom-1">
                    <h2 class="text-brand-1 text-24px mb-5">{{ $reobj_data['user']->custom_fields->c_f_u_pareigos }}</h2>
                    <div class="flex items-center justify-center"><img src="{{ $reobj_data['user']->image_url }}" alt=""></div>
                    <div class="mt-24px">
                        <h3 class="text-18px text-black-3 font-semibold my-4">{{ $reobj_data['user']->name }}</h3>
                        <a href="tel:{{ $reobj_data['user']->phone }}" class="flex justify-center md:justify-start text-gray-4 font-semibold mt-4 text-14px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"><g><g opacity=".6"><g opacity=".6"><path fill="#454142" d="M7.031 5.628a2.346 2.346 0 0 0-2.343-2.344 2.346 2.346 0 0 0-2.344 2.344v11.758a2.346 2.346 0 0 0 2.344 2.343 2.346 2.346 0 0 0 2.343-2.343z"/></g><g opacity=".6"><path fill="#454142" d="M10.586 8.596h5.86v1.172h-5.86z"/></g><g opacity=".6"><path fill="#454142" d="M17.617 10.354a.586.586 0 0 1-.586.586H10a.586.586 0 0 1-.586-.586V8.011c0-.324.262-.586.586-.586h7.031c.324 0 .586.262.586.586zm-1.758 2.93a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.344a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.343a.586.586 0 1 1 0-1.171.586.586 0 0 1 0 1.171zm-2.343-4.687a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.344a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.343a.586.586 0 1 1 0-1.171.586.586 0 0 1 0 1.171zm-2.344-4.687a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.344a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.343a.586.586 0 1 1 0-1.171.586.586 0 0 1 0 1.171zM8.144 5.041c.032.192.06.386.06.587v11.758c0 1.223-.63 2.3-1.58 2.93h12.79a.586.586 0 0 0 .586-.587V5.628a.586.586 0 0 0-.586-.586z"/></g><g opacity=".6"><path fill="#454142" d="M14.688 2.659h-2.344a.586.586 0 1 1 0-1.172h2.344a.586.586 0 1 1 0 1.172zM17.03.315H10a.586.586 0 0 0-.586.586v2.93h8.203V.9a.586.586 0 0 0-.586-.586z"/></g><g opacity=".6"><path fill="#454142" d="M1.172 17.386V5.628c0-.2.027-.395.06-.586H.585A.586.586 0 0 0 0 5.628v14.101c0 .324.262.586.586.586H2.75a3.512 3.512 0 0 1-1.58-2.93z"/></g></g></g></svg>
                            <div class="ml-2">{{ $reobj_data['user']->phone }}</div>
                        </a>
                        <a href="mail:{{ $reobj_data['user']->email }}" class="flex justify-center md:justify-start text-gray-4 font-semibold mt-4 text-14px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"><g><g opacity=".6"><g opacity=".6"><g opacity=".6"><g opacity=".6"><path fill="#454142" d="M6.484 11.253L3.906 9.69v3.125h5.157V9.69z"/></g></g></g><g opacity=".6"><g opacity=".6"><g opacity=".6"><path fill="#454142" d="M14.14 4.417V16.8H12.97V4.417a2.933 2.933 0 0 1 3.515-2.871 2.935 2.935 0 0 0-2.343 2.87zm-3.906.976h-7.5V3.831h7.5zm0 8.594h-7.5V8.518h7.5zM4.102.315A4.106 4.106 0 0 0 0 4.417v15.898h1.172v-2.344h10.625v2.344h1.172v-2.344h5.86v2.344H20V4.417A4.106 4.106 0 0 0 15.898.315z"/></g></g></g></g></g></svg>
                            <div class="ml-2">{{ $reobj_data['user']->email }}</div>
                        </a>
                    </div>
                </div>
                <div class="bg-black-3 text-gray-5 lg:my-30px p-50px shadow-custom-1">
                    <div class="flex flex-col items-center justify-between">
                        <div class="text-24px text-center mb-150px">Domina šis NT, tačiau
                            dar nepardavėte savo
                            senojo?</div>
                        <span class="inline-flex rounded-full shadow-custom-2">
                            <a href="#" class="uppercase text-14px whitespace-no-wrap inline-flex items-center justify-center px-8 py-2 border border-transparent leading-6 font-medium rounded-full text-white bg-red-1 hover:bg-red-2 focus:outline-none focus:border-red-2 focus:shadow-outline-indigo active:bg-red-2 transition ease-in-out duration-150">sužinokite turto vertę</a>
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex-1 mb-8 lg:mb-0">
                <div class="flex flex-col sm:flex-row sm:space-x-30px">
                    <div class="flex-1">
                        <a href="{{ $reobj_data['photos']['main']->large_image_url }}" data-fancybox="gallery" class="block overflow-hidden mb-4 sm:mb-0 h-full max-h-520px">
                            <img class="xl:object-fit xl:object-top xl:h-full" src="{{ $reobj_data['photos']['main']->large_image_url }}" alt="">
                        </a>
                    </div>
                    <div class="flex-none w-full sm:w-164px flex sm:flex-col space-x-1 sm:space-x-0 sm:space-y-15px">
                        @foreach($reobj_data['photos']['thumbnails'] as $thumbnail)
                            <a href="{{ $thumbnail->large_image_url }}" data-fancybox="gallery" class="block h-80px sm:h-119px">
                                <img class="object-cover h-full" src="{{ $thumbnail->image_url }}" alt="">
                            </a>
                        @endforeach
                        @if(!$reobj_data['photos']['others']->isEmpty())
                            <a href="{{ \Illuminate\Support\Arr::first($reobj_data['photos']['others'])->large_image_url }}" data-fancybox="gallery" class="block h-80px sm:h-119px relative">
                                <div class="absolute text-white text-26px w-full h-full flex items-center justify-center">
                                    <div class="absolute w-full h-full bg-black-2 opacity-50"></div>
                                    <span class="relative">+{{ count($reobj_data['photos']['others']) }}</span>
                                </div>
                                <img class="object-cover h-full" src="{{ \Illuminate\Support\Arr::first($reobj_data['photos']['others'])->image_url }}" alt="">
                            </a>
                            @foreach(\Illuminate\Support\Collection::make($reobj_data['photos']['others'])->skip(1) as $other_img)
                                <a href="{{ $other_img->large_image_url }}" data-fancybox="gallery" class="absolute invisible">
                                    <img src="{{ $other_img->image_url }}" alt="">
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap my-30px bg-gray-1 px-24px pb-24px md:pt-24px shadow-custom-1 text-14px space-y-4 lg:space-y-0 lg:space-x-16">
                    <div class="flex flex-col-reverse w-1/3 lg:w-auto">
                        <div class="font-semibold lg:mt-6 lg:text-center">
                            {{ $reobj_data['data']->area }}
                            @if($reobj_data['data']->estate_type == 'site')
                                a
                            @else
                                m2
                            @endif
                        </div>
                        <div class="text-black-2">Plotas</div>
                    </div>
                    @if(!empty($reobj_data['data']->room_count))
                        <div class="flex flex-col-reverse w-1/3 lg:w-auto">
                            <div class="font-semibold lg:mt-6 lg:text-center">{{ $reobj_data['data']->room_count }}</div>
                            <div class="text-black-2">
                                @if($reobj_data['data']->estate_type == 'commercial')
                                    Patalpų sk.
                                @else
                                    Kambarių sk.
                                @endif
                            </div>
                        </div>
                    @endif
                    @if(!empty($reobj_data['data']->floor))
                        <div class="flex flex-col-reverse w-1/3 lg:w-auto">
                            <div class="font-semibold lg:mt-6 lg:text-center">{{ $reobj_data['data']->floor }}</div>
                            <div class="text-black-2">Aukštai</div>
                        </div>
                    @endif
                    @if(!empty($reobj_data['data']->year))
                        <div class="flex flex-col-reverse w-1/3 lg:w-auto">
                            <div class="font-semibold lg:mt-6 lg:text-center">{{ $reobj_data['data']->year }}</div>
                            <div class="text-black-2">Metai</div>
                        </div>
                    @endif
                    <div class="flex flex-col-reverse w-1/3 lg:w-auto">
                        <div class="font-semibold lg:mt-6 lg:text-center">
                            @if(!empty($reobj_data['data']->sale_price))
                                {{ $reobj_data['data']->sale_price }} &euro;
                            @else
                                {{ $reobj_data['data']->rent_price }} &euro;
                            @endif
                        </div>
                        <div class="text-black-2">Kaina</div>
                    </div>
                </div>
                <div x-data="{show:true}" class="shadow-custom-1">
                    <button @click="show = !show" type="button" class="w-full flex items-center justify-center uppercase bg-gray-1 p-13px relative text-24px font-light focus:outline-none">
                        Vieta
                        <span class="absolute right-0 mr-20px"><svg width="12" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192Z"/></svg></span>
                    </button>
                    <div x-show="show" class="bg-gray-1">
                        <div id="map"
                             class="h-280px"
                             data-lat="{{ $reobj_data['data']->latitude }}"
                             data-lng="{{ $reobj_data['data']->longitude }}"></div>
                    </div>
                </div>
            </div>
        </div>
        <div x-data="{show:true}" class="shadow-custom-1 my-30px bg-gray-1">
            <button @click="show = !show" type="button" class="w-full flex items-center justify-center uppercase bg-gray-1 p-13px relative text-24px font-light focus:outline-none">
                Aprašymas
                <span class="absolute right-0 mr-20px"><svg width="12" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192Z"/></svg></span>
            </button>
            <div x-show="show" class="bg-gray-1 px-20px">
                <h2 class="font-bold text-center mb-5">{{ $reobj_data['data']->title }}</h2>
                <div class="text-14px pb-30px">
                    {!! nl2br($reobj_data['data']->description->content) !!}
                </div>
            </div>
        </div>
        <div x-data="{show:true}" class="shadow-custom-1 my-30px bg-gray-1">
            <button @click="show = !show" type="button" class="w-full flex items-center justify-center uppercase bg-gray-1 p-13px relative text-24px font-light focus:outline-none">
                Savybės
                <span class="absolute right-0 mr-20px"><svg width="12" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192Z"/></svg></span>
            </button>
            <div x-show="show" class="bg-gray-1 px-4 sm:px-90px">
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-x-6 gap-y-8 pt-4 pb-30px">
                    @foreach($reobj_data['features'] as $feature)
                        <div class="flex uppercase font-light">
                            <span class="flex-none mt-1 mr-2">
                                <svg viewBox="0 0 512 512" width="16" height="16" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.31 48 48 141.31 48 256c0 114.69 93.31 208 208 208s208-93.31 208-208 -93.31-208-208-208Zm108.25 138.29l-134.4 160v-.01c-2.99 3.55-7.37 5.63-12 5.71h-.27l-.01-.01c-4.54-.01-8.86-1.93-11.89-5.31l-57.6-64 -.01-.01c-6.07-6.43-5.77-16.56.66-22.62 6.42-6.07 16.55-5.77 22.61.66 .16.18.33.36.49.55l45.29 50.32 122.59-145.91v-.01c5.78-6.69 15.88-7.42 22.56-1.64 6.54 5.66 7.4 15.5 1.93 22.21Z"/></svg>
                            </span>
                            {{ $feature }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

