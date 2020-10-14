<div class="container py-70px">
  <div class="h-350px">
    {!! get_the_post_thumbnail(get_the_ID(), 'xlarge', ['class' => 'object-cover max-h-full']) !!}
  </div>
  <div class="bg-white py-8 shadow-custom-1">
    <h1 class="text-24px font-light text-center uppercase mb-8">
      {!! $title !!}
    </h1>
    <div class="prose max-w-full px-8">
      {!! get_the_content() !!}
    </div>
  </div>
  @if(get_query_var('related_posts'))
    <div class="section-heading bg-gray-2 mt-10">
      <div class="section-heading-title-wrap">
        <h2 class="section-heading-title bg-gray-2">Skaitomiausi</h2>
      </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-30px">
      @foreach(get_query_var('related_posts') as $post)
        <a href="{{ get_permalink($post) }}" class="blog-post relative rounded-4px overflow-hidden">
          @if($kam = get_field('kam', $post->ID))
            <div class="inline-block absolute top-0 right-0 z-10 bg-blue-1 opacity-85 text-white uppercase text-14px px-6 py-2 mt-4">
              {{ $kam['label'] }}
            </div>
          @endif
          <figure class="relative block overflow-hidden bg-gray-1 rounded-4px bg-cover bg-no-repeat h-200px transition-opacity duration-500 hover:opacity-75" style="background-image:url({{ get_the_post_thumbnail_url($post) }})"></figure>
          <h2 class="font-light py-4 text-black-2">{{ get_the_title($post) }}</h2>
        </a>
      @endforeach
    </div>
  @endif
</div>