@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container py-60px">
        <div class="prose max-w-none">
            @include('partials.page-header')
            @includeFirst(['partials.content-page', 'partials.content'])
        </div>
    </div>
  @endwhile
@endsection
