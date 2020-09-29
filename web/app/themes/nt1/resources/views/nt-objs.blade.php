@extends('layouts.app')

@section('content')
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
    <div class="container py-70px">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-30px">
            <?php
            $estates = get_query_var('ntobjs')['estates'];
            $statuses = get_query_var('ntobjs')['statuses'];
            ?>
            @foreach($estates as $ntobj)
                <div class="ntobj">
                    <div class="flex-shrink-0">
                        <a href="/nt/{{ get_query_var('retype') }}/{{ sanitize_title($ntobj->address) }}-{{ $ntobj->id }}" class="block relative">
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
        <div class="pagination flex items-center justify-center space-x-10px mt-40px">
            @for($i = 1; $i <= get_query_var('ntobjs')['pages_count']; $i++)
                <a href="#" class="flex items-center justify-center w-38px h-38px text-14px <?php echo ($i == get_query_var('ntobjs')['current_page']) ? 'bg-brown-1 text-white' : 'bg-gray-3' ?>">
                    {{ $i }}
                </a>
            @endfor
        </div>
    </div>
@endsection
