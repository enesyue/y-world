{{-- <header aria-label="Site Header" class="border-b border-gray-100">
  <div class="hidden xl:block">
    <nav x-data="{ open: false }" class="bg-gray-800">
      <div class="container">
        <div class="flex items-center justify-between py-6">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <a href="#" class="text-white font-bold text-xl">Logo</a>
            </div>
            <div class="hidden md:block">
              <ul class="ml-10 flex items-baseline">
                <li class="relative" x-data="{ open: false }"  @mouseenter="open = true" @mouseleave="open = false">
                  <a href="#" class="text-gray-300 hover:text-white px-3 py-4 font-medium">Option 1</a>
                  <ul x-show="open"
                  x-transition:enter="transition ease-out duration-200"
                  x-transition:enter-start="opacity-0 transform scale-95"
                  x-transition:enter-end="opacity-100 transform scale-100"
                  x-transition:leave="transition ease-in duration-75"
                  x-transition:leave-start="opacity-100 transform scale-100"
                  x-transition:leave-end="opacity-0 transform scale-95"
                  class="absolute z-10 bg-gray-900 text-white rounded-md shadow-lg mt-3 w-48">
                    <li><a href="#" class="block px-4 py-2 text-sm">Submenu 1</a></li>
                    <li><a href="#" class="block px-4 py-2 text-sm">Submenu 2</a></li>
                  </ul>
                </li>
                <li>
                  <a href="#" class="text-gray-300 hover:text-white px-3 py-4 font-medium">Option 2</a>
                </li>
                <li>
                  <a href="#" class="text-gray-300 hover:text-white px-3 py-4 font-medium">Option 3</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="-mr-2 flex md:hidden">
            <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
              <span class="sr-only">Open main menu</span>
              <svg x-show="!open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
              <svg x-show="open" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95" class="md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
          <ul>
            <li class="relative" x-data="{ open: false }">
              <a href="#" class="text-gray-300 hover:text-white block px-3 py-2 font-medium" @click="open = !open">Option 1</a>
              <ul x-show="open" class="ml-4" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-95">
                <li><a href="#" class="block px-4 py-2 text-sm">Submenu 1</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm">Submenu 2</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="text-gray-300 hover:text-white block px-3 py-2 font-medium">Option 2</a>
            </li>
            <li>
              <a href="#" class="text-gray-300 hover:text-white block px-3 py-2 font-medium">Option 3</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
 --}}

<div class="bg-cover" x-data="{ openMenu : false }"
  :class="openMenu ? 'overflow-hidden' : 'overflow-visible'">

  <header id="superiasjdiaod" class="bg-white drop-shadow-sm py-4">

    <div class="container flex justify-between items-center">
    
      <!-- Logo -->
      <a href="/" class="text-lg font-bold">Logo</a>

      <!-- Mobile Menu Toggle -->
      <button class="flex md:hidden flex-col items-center align-middle" @click="openMenu = !openMenu"
        :aria-expanded="openMenu" aria-controls="mobile-navigation" aria-label="Navigation Menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <span class="text-xs">Menu</span>
      </button>

      <!-- Main Navigations -->
      <nav class="hidden md:flex mt-auto">

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
        </ul>

      </nav>

    </div>

  </header>

  <div
  x-data="{ navHeight: $el.clientHeight }"
  x-init="console.log(navHeight)">
    <!-- Pop Out Navigation -->
    <nav id="mobile-navigation" class="fixed top-0 right-0 bottom-0 left-0 backdrop-blur-sm z-10"
      :style="`height:calc(100vh - ${navHeight}px)`"
      :class="openMenu ? 'visible' : 'invisible' " x-cloak>

      <!-- UL Links -->
      <ul class="absolute top-0 right-0 bottom-0 w-10/12 py-4 bg-white drop-shadow-2xl z-10 transition-all"
        :class="openMenu ? 'translate-x-0' : 'translate-x-full'">

        <li class="border-b border-inherit">
          <a href="#" class="block p-4" aria-current="true">Home</a>
        </li>
        <li class="border-b border-inherit">
          <a href="#" class="block p-4">About</a>
        </li>
        <li class="border-b border-inherit">
          <a href="#" class="block p-4">Articles</a>
        </li>
        <li class="border-b border-inherit">
          <a href="#" class="block p-4">Contact</a>
        </li>
      </ul>

      <!-- Close Button -->
      <button class="absolute top-0 right-0 bottom-0 left-0" @click="openMenu = !openMenu" :aria-expanded="openMenu"
        aria-controls="mobile-navigation" aria-label="Close Navigation Menu">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-2 left-2" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>

    </nav>
  </div>

</div>