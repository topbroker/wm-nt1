<!-- This example requires Tailwind CSS v1.4.0+ -->
<div x-data="{ open: false }" class="relative bg-gray-1">
    <div class="container">
        <div class="flex justify-between items-center py-6 lg:justify-start">
            <div class="max-w-200px xl:max-w-300px lg:flex-1">
                {!! get_custom_logo() !!}
            </div>
            <div class="-mr-2 -my-2 lg:hidden">
                <button @click="open = true" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex items-center justify-end space-x-8 md:flex-1 lg:w-0">
                <nav class="hidden md:flex space-x-10 text-14px uppercase">
                    {!! wp_nav_menu([
	                    'theme_location' => 'primary_navigation',
	                    'menu_class' => 'hidden md:flex space-x-10',
	                    'container' => '',
	                    'echo' => false
                    ]) !!}
                </nav>
                @include('components.nt-vertinimas-button')
            </div>
        </div>
    </div>

    <!--
      Mobile menu, show/hide based on mobile menu state.

      Entering: "duration-200 ease-out"
        From: "opacity-0 scale-95"
        To: "opacity-100 scale-100"
      Leaving: "duration-100 ease-in"
        From: "opacity-100 scale-100"
        To: "opacity-0 scale-95"
    -->
    <div
        x-show="open" @click.away="open = false"
        x-transition:enter="duration-200 ease-out"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-100 ease-in"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right lg:hidden">
        <div class="rounded-lg shadow-lg">
            <div class="rounded-lg shadow-xs bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5 space-y-6">
                    <div class="flex items-center justify-between">
                        <div>
                            {!! get_custom_logo() !!}
                        </div>
                        <div class="-mr-2">
                            <button @click="open = false" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div>
                        <nav class="main-menu-mobile grid gap-y-8">
                            {!! wp_nav_menu([
                                'theme_location' => 'primary_navigation',
                                'menu_class' => 'lg:hidden',
                                'container' => '',
                                'echo' => false
                            ]) !!}
                        </nav>
                        <div class=" mt-6 mb-3">
                            @include('components.nt-vertinimas-button')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
