@if(!empty($testimonial_items))
    <div class="section-testimonials my-70px bg-cover bg-center" style="background-image: url(@asset('images/testimonials-bg.jpg'))">
        <div class="md:hidden"><img src="@asset('images/testimonials-bg.jpg')" alt=""></div>
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