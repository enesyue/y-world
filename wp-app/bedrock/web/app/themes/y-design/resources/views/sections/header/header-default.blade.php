<!-- Header Default -->
<section class="bg-cover sticky top-0"
  x-data="{
    openMenu : false,
    animate: false
  }"
  x-bind:class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

  <header id="y-nav" class="drop-shadow-sm py-4 z-20 relative border-b-2 border-b-black bg-white dark:bg-dark"
    x-ref="header">

    <div class="container flex justify-between items-center">
    
      <!-- Logo -->
      <a href="/" class="text-lg font-black font-inter dark:text-white">
        Logo.
      </a>
      <!-- End Logo -->

      <!-- Dark Mode Toggle -->
      <div class="flex justify-center items-center">
        <button @click="darkMode = !darkMode"
          x-bind:aria-checked="darkMode"
          type="button"
          aria-checked="true">

          <span x-show="darkMode">
            <x-icons.icon-sun set="h-6 w-6 fill-white" />
          </span>
          <span x-show="!darkMode">
            <x-icons.icon-moon set="h-6 w-6 fill-black" />
          </span>
        </button>
      </div>
      <!-- End Dark Mode Toggle -->

      <!-- Mobile Menu Button -->
      <div class="flex">
        <button class="flex lg:hidden flex-col items-center align-middle"
          x-data
          x-on:click="
            openMenu = !openMenu,
            animate = !animate"
          x-bind:aria-expanded="openMenu" aria-controls="mobile-navigation" aria-label="Navigation Menu">

          <div class="w-6 h-6 flex items-center justify-center relative">
            <span x-bind:class="animate ? 'translate-y-0 rotate-45' : '-translate-y-2'"
              class="transform transition w-full h-[2px] bg-current absolute rounded-md"></span>

            <span x-bind:class="animate ? 'opacity-0 translate-x-3' : 'opacity-100'"
              class="transform transition w-full h-[2px] bg-current absolute rounded-md"></span>

            <span x-bind:class="animate ? 'translate-y-0 -rotate-45' : 'translate-y-2'"
              class="transform transition w-full h-[2px] bg-current absolute rounded-md"></span>
          </div>
        </button>
      </div>
      <!-- End Mobile Menu Button -->

      <!-- Main Navigations -->
      <nav class="hidden lg:flex mt-auto">
        <ul class="flex flex-row gap-2">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation',  
            'container' => false,
            'walker' => new Nav_Walker("inline-flex py-2 px-3 hover:bg-slate-200 rounded","block px-4 py-1 hover:bg-gray-100") ,
            'echo' => false,
            'depth' => 0,
            'items_wrap' => '%3$s' 
            ])!!}
          @endif
        </ul>
      </nav>
      <!-- End Main Navigations -->

    </div>

  </header>

  <!-- Mobile Burger Canvas -->
  <div class="burger">

    <!-- Pop Out Navigation -->
    <nav id="mobile-navigation" class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10 mt-auto"
      x-data="{navHeight: $refs.header.clientHeight}"
      x-bind:style="`height:calc(100vh - ${navHeight}px)`"
      x-bind:class="openMenu ? 'visible' : 'invisible' " x-cloak>

      <!-- UL Links -->
      <ul class="absolute top-0 right-0 bottom-0 w-10/12 py-4 bg-white drop-shadow-2xl z-10 transition-all dark:bg-dark"
        :class="openMenu ? 'translate-x-0' : 'translate-x-full'">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation',  
          'container' => false,
          'walker' => new Nav_Walker_Mobile() ,
          'echo' => false,
          'depth' => 0,
          'items_wrap' => '%3$s' 
          ])!!}
        @endif
      </ul>
      <!-- End UL Links -->

      <!-- Close Button -->
      <button class="absolute top-0 right-0 bottom-0 left-0"
        x-on:click="openMenu = !openMenu, animate = !animate"
        x-ref="closeButton"
        x-bind:aria-expanded="openMenu"
        aria-controls="mobile-navigation" aria-label="Close Navigation Menu">
      </button>
      <!-- End Close Button -->

    </nav>
    <!-- End Pop Out Navigation -->

  </div>
  <!-- End Mobile Burger Canvas -->

</section>
<!-- End Header Default -->