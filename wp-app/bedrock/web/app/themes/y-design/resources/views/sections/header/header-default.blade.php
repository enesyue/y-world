<div class="bg-cover sticky top-0"
  x-data="{ openMenu : false }"
  :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

  <header id="y-nav" class="drop-shadow-sm py-4 z-20 relative border-b-2 border-b-black bg-white dark:bg-dark">

    <div class="container flex justify-between items-center">
    
      <!-- Logo -->
      <a href="/" class="text-lg font-bold dark:text-white">
        Logo.
      </a>

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
          x-data="{ animate: false }"
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
          <li>
            <a href="#" class="inline-flex py-2 px-3 bg-slate-200 rounded" aria-current="true">Home</a>
          </li>
          <li>
            <a href="#" class="inline-flex py-2 px-3 hover:bg-slate-200 rounded">About</a>
          </li>
          <li>
            <a href="#" class="inline-flex py-2 px-3 hover:bg-slate-200 rounded">Articles</a>
          </li>
          <li>
            <a href="#" class="inline-flex py-2 px-3 hover:bg-slate-200 rounded">Contact</a>
          </li>
          <li class="relative inline-block"
            x-data="{ open: false }"
            @mouseleave="open = false">

            <!-- Dropdown Toggle Button -->
            <a @mouseover="open = true" href="#" class="flex items-center p-2 rounded-md">
              <span class="mr-4">Shop</span>
              <span x-bind:class="open = ! open ? '': '-rotate-180'" class="transition-transform duration-500 transform">
                <x-icons.icon-arrow set="h-4 w-4" />
              </span>
            </a>
            <!-- End Dropdown Toggle Button -->
  
            <!-- Hover Menu -->
            <div class="absolute right-0 py-1 bg-white rounded-lg shadow-xl min-w-max"
              x-show="open"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 transform scale-90"
              x-transition:enter-end="opacity-100 transform scale-100"
              x-transition:leave="transition ease-in duration-300"
              x-transition:leave-start="opacity-100 transform scale-100"
              x-transition:leave-end="opacity-0 transform scale-90">

              <a href="#" class="block px-4 py-1 hover:bg-gray-100">Lorem, ipsum.</a>
              <a href="#" class="block px-4 py-1 hover:bg-gray-100">Lorem, ipsum dolor.</a>
              <a href="#" class="block px-4 py-1 hover:bg-gray-100">Lorem ipsum dolor sit amet.</a>
            </div>
            <!-- End Hover Menu -->
          </li>
        </ul>
      </nav>
      <!-- End Main Navigations -->

    </div>

  </header>

  <div>
    <!-- Pop Out Navigation -->
    <nav id="mobile-navigation" class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10 mt-auto"
      x-data="{navHeight: document.getElementById('y-nav').clientHeight}"
      x-bind:style="`height:calc(100vh - ${navHeight}px)`"
      x-bind:class="openMenu ? 'visible' : 'invisible' " x-cloak>

      <!-- UL Links -->
      <ul class="absolute top-0 right-0 bottom-0 w-10/12 py-4 bg-white drop-shadow-2xl z-10 transition-all dark:bg-dark"
        :class="openMenu ? 'translate-x-0' : 'translate-x-full'">

        <li class="border-b border-inherit dark:border-b-black">
          <a href="#" class="block p-4" aria-current="true">Home</a>
        </li>
        <li class="border-b border-inherit  dark:border-b-black">
          <a href="#" class="block p-4">About</a>
        </li>
        <li class="border-b border-inherit  dark:border-b-black">
          <a href="#" class="block p-4">Articles</a>
        </li>
        <li class="border-b border-inherit  dark:border-b-black">
          <a href="#" class="block p-4">Contact</a>
        </li>
      </ul>
      <!-- End UL Links -->

      <!-- Close Button -->
      <button class="absolute top-0 right-0 bottom-0 left-0" @click="openMenu = !openMenu" :aria-expanded="openMenu"
        aria-controls="mobile-navigation" aria-label="Close Navigation Menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 left-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
      <!-- End Close Button -->

    </nav>
  </div>
</div>