@if(!is_front_page())
    <div class="container">
        @include('partials.page-header')
    </div>
@endif
@php(the_content())