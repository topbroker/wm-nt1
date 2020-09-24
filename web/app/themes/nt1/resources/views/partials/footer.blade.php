<?php
$social = get_field('social', 'options');
$logo_id = get_field('footer_logo', 'options');
?>

<footer class="bg-black-1 text-gray-2 text-14px uppercase py-30px tracking-0.42px">
    <div class="container">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="flex flex-col-reverse sm:flex-row items-center mb-6 md:mb-0">
                <div class="flex-none md:flex-auto md:mr-8 lg:mr-50px space-x-3 lg:space-x-6">
                    @if($fb = $social['facebook'])
                        <a href="{{ $fb }}" class="inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" height="19" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg" d="m475.074219 0h-438.148438c-20.394531 0-36.925781 16.53125-36.925781 36.925781v438.148438c0 20.394531 16.53125 36.925781 36.925781 36.925781h236.574219v-198h-66.5v-77.5h66.5v-57.035156c0-66.140625 40.378906-102.140625 99.378906-102.140625 28.257813 0 52.542969 2.105469 59.621094 3.046875v69.128906h-40.683594c-32.101562 0-38.316406 15.253906-38.316406 37.640625v49.359375h76.75l-10 77.5h-66.75v198h121.574219c20.394531 0 36.925781-16.53125 36.925781-36.925781v-438.148438c0-20.394531-16.53125-36.925781-36.925781-36.925781zm0 0" fill="#dedede" data-original="#000000" style="" class=""/></g></svg>
                        </a>
                    @endif
                    @if($ins = $social['instagram'])
                        <a href="{{ $ins }}" class="inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" height="19" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M363.273,0H148.728C66.719,0,0,66.719,0,148.728v214.544C0,445.281,66.719,512,148.728,512h214.544    C445.281,512,512,445.281,512,363.273V148.728C512,66.719,445.281,0,363.273,0z M472,363.272C472,423.225,423.225,472,363.273,472    H148.728C88.775,472,40,423.225,40,363.273V148.728C40,88.775,88.775,40,148.728,40h214.544C423.225,40,472,88.775,472,148.728    V363.272z" fill="#dedede" data-original="#000000" style="" class=""/>
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M256,118c-76.094,0-138,61.906-138,138s61.906,138,138,138s138-61.906,138-138S332.094,118,256,118z M256,354    c-54.037,0-98-43.963-98-98s43.963-98,98-98s98,43.963,98,98S310.037,354,256,354z" fill="#dedede" data-original="#000000" style="" class=""/>
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <circle cx="396" cy="116" r="20" fill="#dedede" data-original="#000000" style="" class=""/>
                                        </g>
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                    </g>
                                </g></svg>
                        </a>
                    @endif
                    @if($lin = $social['linkedin'])
                        <a href="{{ $lin }}"><i class="fab fa-linkedin"></i></a>
                    @endif
                </div>
                <div class="footer-menu-wrap">
                    {!! wp_nav_menu([
                        'theme_location' => 'footer_navigation',
                        'menu_class' => 'hidden md:flex space-x-10',
                        'container' => '',
                        'echo' => false
                    ]) !!}
                </div>
            </div>
            <div class="text-center">
                <img src="{{ wp_get_attachment_image_url($logo_id, 'full') }}" class="mb-2" alt="">
                <span class="text-13px">© {{ date('Y') }}</span>
            </div>
        </div>
    </div>
</footer>