<?php
$testomonials = get_field('testimonials');
?>

@if(!empty($testimonial_items) && $testomonials['status'])
    <div class="section-testimonials my-70px bg-cover bg-center" style="background-image: url({{ wp_get_attachment_image_url($testomonials['section_background_image'], 'xlarge') }})">
        <div class="md:hidden">
            <img src="{{ wp_get_attachment_image_url($testomonials['section_background_image'], 'xlarge') }}" alt="">
        </div>
        <div class="container">
            <div class="section-testimonials-content w-full md:max-w-485px bg-white">
                <div class="swiper-container-testimonials swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($testimonial_items as $testimonial_item)
                            <div class="swiper-slide text-black-1 font-dm text-14px italic text-center leading-24px">
                                {!! $testimonial_item['text'] !!}
                                <div class="font-sans not-italic uppercase text-14px text-black-1 mt-8">
                                    {{ $testimonial_item['author'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
@endif