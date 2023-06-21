{{-- <a class="sr-only focus:not-sr-only" href="#main">
  {{ __('Skip to content') }}
</a> --}}

@include('sections.header.header-default')

  <main id="main" class="main">
    @yield('content')
  </main>

  @hasSection('sidebar')
    <aside class="sidebar">
      @yield('sidebar')
    </aside>
  @endif

@include('sections.footer.footer-default')

