@extends('layouts.app')

@section('content')
    <?php
    $tbuser = get_query_var('tbuser')['tbuser'];
    $feedbacks = get_query_var('tbuser')['feedbacks'];
    $user_estates = get_query_var('tbuser')['user_estates'];
    $statuses = get_query_var('tbuser')['statuses'];
    ?>

    <div class="container py-40px lg:py-70px">
        <div class="px-8 lg:px-70px py-24px bg-gray-1 shadow-custom-1">
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-50px lg:gap-100px">
                <div class="col-span-1">
                    <div class="text-18px lg:text-24px mb-30px">{{ $tbuser->custom_fields->c_f_u_pareigos }}</div>
                    <div class="mb-8">
                        <img src="{{ $tbuser->image_url }}" alt="">
                    </div>
                    <div>
                        <div class="text-18px font-semibold">{{ $tbuser->name }}</div>
                        <div class="flex text-gray-4 font-semibold mt-4 text-14px">
                            <div><svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"><g><g opacity=".6"><g opacity=".6"><path fill="#454142" d="M7.031 5.628a2.346 2.346 0 0 0-2.343-2.344 2.346 2.346 0 0 0-2.344 2.344v11.758a2.346 2.346 0 0 0 2.344 2.343 2.346 2.346 0 0 0 2.343-2.343z"></path></g><g opacity=".6"><path fill="#454142" d="M10.586 8.596h5.86v1.172h-5.86z"></path></g><g opacity=".6"><path fill="#454142" d="M17.617 10.354a.586.586 0 0 1-.586.586H10a.586.586 0 0 1-.586-.586V8.011c0-.324.262-.586.586-.586h7.031c.324 0 .586.262.586.586zm-1.758 2.93a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.344a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.343a.586.586 0 1 1 0-1.171.586.586 0 0 1 0 1.171zm-2.343-4.687a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.344a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.343a.586.586 0 1 1 0-1.171.586.586 0 0 1 0 1.171zm-2.344-4.687a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.344a.586.586 0 1 1 0-1.172.586.586 0 0 1 0 1.172zm0 2.343a.586.586 0 1 1 0-1.171.586.586 0 0 1 0 1.171zM8.144 5.041c.032.192.06.386.06.587v11.758c0 1.223-.63 2.3-1.58 2.93h12.79a.586.586 0 0 0 .586-.587V5.628a.586.586 0 0 0-.586-.586z"></path></g><g opacity=".6"><path fill="#454142" d="M14.688 2.659h-2.344a.586.586 0 1 1 0-1.172h2.344a.586.586 0 1 1 0 1.172zM17.03.315H10a.586.586 0 0 0-.586.586v2.93h8.203V.9a.586.586 0 0 0-.586-.586z"></path></g><g opacity=".6"><path fill="#454142" d="M1.172 17.386V5.628c0-.2.027-.395.06-.586H.585A.586.586 0 0 0 0 5.628v14.101c0 .324.262.586.586.586H2.75a3.512 3.512 0 0 1-1.58-2.93z"></path></g></g></g></svg></div>
                            <div class="ml-2"><a href="tel:{{ $tbuser->phone }}">{{ $tbuser->phone }}</a></div>
                        </div>
                        <div class="flex text-gray-4 font-semibold mt-4 text-14px">
                            <div><svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21"><g><g opacity=".6"><g opacity=".6"><g opacity=".6"><g opacity=".6"><path fill="#454142" d="M6.484 11.253L3.906 9.69v3.125h5.157V9.69z"></path></g></g></g><g opacity=".6"><g opacity=".6"><g opacity=".6"><path fill="#454142" d="M14.14 4.417V16.8H12.97V4.417a2.933 2.933 0 0 1 3.515-2.871 2.935 2.935 0 0 0-2.343 2.87zm-3.906.976h-7.5V3.831h7.5zm0 8.594h-7.5V8.518h7.5zM4.102.315A4.106 4.106 0 0 0 0 4.417v15.898h1.172v-2.344h10.625v2.344h1.172v-2.344h5.86v2.344H20V4.417A4.106 4.106 0 0 0 15.898.315z"></path></g></g></g></g></g></svg></div>
                            <div class="ml-2"><a href="mailto:{{ $tbuser->email }}">{{ $tbuser->email }}</a></div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2">
                    <form action="" method="post">
                        <div class="uppercase text-18px lg:text-24px mb-30px">Susisiekime</div>
                        <div class="flex flex-col lg:flex-row space-y-30px lg:space-y-0 lg:space-x-30px mb-40px">
                            <label class="flex-1 border-b border-black-1 flex flex-col">
                                <span class="uppercase text-14px font-light">vardas *</span>
                                <input type="text" name="name" class="bg-transparent focus:outline-none">
                            </label>
                            <label class="flex-1 border-b border-black-1 flex flex-col">
                                <span class="uppercase text-14px font-light">Tel. nr. *</span>
                                <input type="text" name="phone" class="bg-transparent focus:outline-none">
                            </label>
                            <label class="flex-1 border-b border-black-1 flex flex-col">
                                <span class="uppercase text-14px font-light">El. pašto adresas</span>
                                <input type="text" name="email" class="bg-transparent focus:outline-none">
                            </label>
                        </div>
                        <div class="mb-40px">
                            <textarea name="message" class="w-full h-160px p-4 focus:outline-none"></textarea>
                        </div>
                        <div class="text-right">
                        <span class="inline-flex rounded-md shadow-sm">
                          <button type="submit" class="whitespace-no-wrap inline-flex items-center justify-center text-12px uppercase px-10 py-1 border-2 border-red-1 leading-6 font-medium rounded-full text-white bg-red-1 hover:bg-red-2 focus:outline-none focus:border-red-2 focus:shadow-outline-indigo active:bg-red-2 transition ease-in-out duration-150">
                              Siųsti
                          </button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @if(!empty($feedbacks))
            <div class="bg-gray-1 shadow-custom-1 my-30px">
                <div class="swiper-container swiper-container-member w-full h-full">
                    <div class="swiper-wrapper">
                        @foreach($feedbacks as $feedback)
                            <div class="swiper-slide flex flex-col items-center">
                                <div class="text-24px font-light text-center p-24px">{{ $feedback }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="flex h-70px relative max-w-160px mx-auto">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        @endif
        @if(!empty($user_estates))
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-30px my-30px">
                @foreach($user_estates as $ntobj)
                    <div class="ntobj">
                        <div class="flex-shrink-0">
                            <a href="/nt/{{ \wmnt\Helpers::estate_type($ntobj->estate_type) }}/{{ sanitize_title($ntobj->address) }}-{{ $ntobj->id }}" class="block relative">
                                @if(!empty($ntobj->record_status_id))
                                    <span class="absolute top-0 right-0 mt-4 bg-yellow-1 text-14px uppercase px-6 py-2">{{ array_values(array_filter($statuses, fn($st) => $st->id == $ntobj->record_status_id))[0]->title }}</span>
                                @endif
                                <img class="h-160px w-full object-cover" src="{{ $ntobj->primary_photo }}" alt="">
                            </a>
                        </div>
                        <div class="flex-1 bg-white p-14px flex flex-col justify-between">
                            <div class="ntobj-inner">
                                <div class="ntobj-header">
                                    <div class="ntobj-header-left">{{ empty((int)$ntobj->sale_price) ? $ntobj->rent_price : $ntobj->sale_price }} €</div>
                                    <div class="ntobj-header-right">{{ \wmnt\Helpers::estate_type($ntobj->estate_type) }}</div>
                                </div>
                                <div class="grid grid-cols-2 gap-x-12 text-14px">
                                    @foreach(\wmnt\Helpers::estate_data_short($ntobj) as $estate_data_short_key => $estate_data_short_value)
                                        @if(!empty($estate_data_short_value))
                                            <div class="flex justify-between">
                                                <div class="uppercase font-semibold">{{ $estate_data_short_key }}:</div>
                                                <div>{!! $estate_data_short_value !!}</div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="ntobj-addr">
                                    <div class="flex-none mt-1">
                                        <svg width="17" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g fill="#454142"><path d="M256 0C153.755 0 70.57 83.18 70.57 185.42c0 126.88 165.93 313.16 173 321.03 6.63 7.39 18.22 7.37 24.84 0 7.06-7.87 173-194.147 173-321.04C441.4 83.16 358.22-.02 255.98-.02Zm0 469.729c-55.85-66.34-152.035-197.22-152.035-284.301 0-83.834 68.202-152.036 152.035-152.036 83.83 0 152.03 68.202 152.03 152.035 -.01 87.088-96.18 217.943-152.04 284.302Z"/><path d="M256 92.134c-51.45 0-93.292 41.85-93.292 93.29 0 51.44 41.851 93.29 93.292 93.29 51.44 0 93.291-41.851 93.291-93.293 0-51.45-41.85-93.3-93.291-93.3Zm0 153.19c-33.03 0-59.9-26.88-59.9-59.91s26.87-59.91 59.9-59.91c33.02 0 59.9 26.87 59.9 59.9s-26.88 59.9-59.9 59.9Z"/></g></svg>
                                    </div>
                                    <div class="ml-2">{{ $ntobj->title }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@stop