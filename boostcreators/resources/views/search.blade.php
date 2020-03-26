@extends('layouts.app')

@section('content')
  <div class="container">
    <?php
    if (function_exists('yoast_breadcrumb')) {
      yoast_breadcrumb('<p class="breadcrumbs">', '</p>');
    }
    ?>
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-search')
  @endwhile

  {!! get_the_posts_navigation() !!}
  </div>
@endsection
