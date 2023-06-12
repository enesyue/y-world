<header aria-label="Site Header" class="border-b border-gray-100">
  <div class="container">
    <div
      class="flex h-16 max-w-screen-2xl items-center justify-between"
    >
      <div class="flex items-center gap-4">
        <h1 class="h6 mb-0">
          <a class="navbar-brand" href="{{ home_url('/') }}">
              <img class="img-fluid desktop_logo"
                  src="@asset('images/logo.svg')"
                  alt="{!! $siteName !!}">
              <span class="visually-hidden">{!! $siteName !!}</span>
          </a>
        </h1>
      </div>
      <div class="flex flex-1 items-center justify-end gap-8">

            <div x-data="{openMenu : false}" :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

              <style>
              [x-cloak] {
                display: none !important;
              }
              </style>
      
      
        <!-- Burger Menu Button -->
        <button class="flex md:hidden sticky items-center align-middle" @click="openMenu = !openMenu">
          <div :class="openMenu ? 'hidden' : 'visible'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
          </div>
          <div :class="openMenu ? 'visible' : 'hidden'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
          </div>
        </button>
      
        <!-- Navbar -->
        <nav class="hidden md:flex justify-end">
         <ul class="flex flex-row w-86 gap-2"> 
            @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation',  
            'container' => false,
            'walker' => new Nav_Walker("", "inline-flex py-2 px-3 hover:text-slate-500 rounded", "flex flex-col py-2 px-3 hover:text-slate-500 hover:translate-x-6 hover:ease-linear duration-300 hover:border-l-4 border-indigo-200 hover:border-slate-500 ml-3 mb-1") ,
            'echo' => false,
            'depth' => 0,
            'items_wrap' => '%3$s' 
            ])!!}
        @endif
         </ul>
        </nav>
         
        <!-- List Items Integration into the Burger Menu -->
        <nav class="absolute top-16 bottom-0 right-0 left-0 backdrop-slur-sm z-10 md:hidden" :class="openMenu ? 'visible' : 'invisible'">
              
            
              <ul class="relative top-0 right-0 bottom-0 w-full h-fit py-4 bg-white drop-shadow-2xl z-10 transition-all" 
              :class="openMenu ? 'translate-x-0' : 'translate-x-full' ">
                    @if (has_nav_menu('primary_navigation'))
                    {!! wp_nav_menu(['theme_location' => 'primary_navigation',  
                    'container' => false,
                    'walker' => new Nav_Walker("border-b border-inherit", "block p-4 hover:text-slate-500", "text-slate-500"),
                    'echo' => false,
                    'depth' => 0,
                    'items_wrap' => '%3$s' 
                    ])!!}
                    @endif
              </ul>      
        </nav>
      </div>
      
      </div>

        <div class="hidden md:flex items-center">
          <div class="flex items-center border-x border-gray-100">
            <span class="border-e border-e-gray-100">
              <a
                href="/cart"
                class="grid h-16 w-16 place-content-center border-b-4 border-transparent hover:border-red-700"
              >
                <svg
                  class="h-4 w-4"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                  />
                </svg>

                <span class="sr-only">Cart</span>
              </a>
            </span>

            <span class="border-e border-e-gray-100">
              <a
                href="/account"
                class="grid h-16 w-16 place-content-center border-b-4 border-transparent hover:border-red-700"
              >
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                  />
                </svg>

                <span class="sr-only"> Account </span>
              </a>
            </span>

            <span class="hidden sm:block">
              <a
                href="/search"
                class="grid h-16 w-16 place-content-center border-b-4 border-transparent hover:border-red-700"
              >
                <svg
                  class="h-4 w-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
                  />
                </svg>

                <span class="sr-only"> Search </span>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>


