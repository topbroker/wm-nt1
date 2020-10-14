<?php
$nt_obejktai_grp = get_field('nt_obejktai');
?>

@if($nt_obejktai_grp['status'])
    <div class="section-categories my-70px">
        <div class="container">
            <div class="section-heading">
                <div class="section-heading-title-wrap">
                    <h2 class="section-heading-title">{{ \wmnt\Helpers::get_string('NT Objektai') }}</h2>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach(get_field('categories', 'options') as $cat)
                    <div class="category-item">
                        <a href="/nt/{{ sanitize_title($cat['title']) }}" class="block relative">
                            <div class="absolute top-0 right-0 uppercase bg-red-1 text-white px-4 py-2 text-14px mt-4">
                                {{ $cat['title'] }}
                            </div>
                            <img src="{{ wp_get_attachment_image_url($cat['image'], 'large') }}" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif