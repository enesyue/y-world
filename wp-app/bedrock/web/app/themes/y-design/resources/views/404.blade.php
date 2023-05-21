@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <x-alerts type="warning">
      {!! __('Sorry, but the page you are trying to view does not exist.', 'sage') !!}
    </x-alerts>

    {!! get_search_form(false) !!}
  @endif
@endsection
