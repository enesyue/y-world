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
          <li class="relative inline-block py-2 px-3"
            x-data="{ open: false }"
            @mouseleave="open = false">

            <!-- Dropdown Hover -->
            <a class="flex items-center rounded-md" href="#"
              @mouseover="open = true">
              <span class="mr-4">Shop</span>
              <span class="transition-transform duration-500 transform"
                x-bind:class="open = ! open ? '': '-rotate-180'">
                <x-icons.icon-arrow set="h-4 w-4" />
              </span>
            </a>
            <!-- End Dropdown Hover -->
  
            <!-- Hover Menu -->
            <ul class="absolute right-0 py-1 bg-white rounded-lg shadow-xl min-w-max"
              x-show="open"
              x-transition:enter="transition ease-out duration-300"
              x-transition:enter-start="opacity-0 transform scale-90"
              x-transition:enter-end="opacity-100 transform scale-100"
              x-transition:leave="transition ease-in duration-300"
              x-transition:leave-start="opacity-100 transform scale-100"
              x-transition:leave-end="opacity-0 transform scale-90">

              <li>
                <a href="#" class="block px-4 py-1 hover:bg-gray-100">Lorem, ipsum.</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-1 hover:bg-gray-100">Lorem, ipsum dolor..</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-1 hover:bg-gray-100">Lorem ipsum dolor sit amet.</a>
              </li>
            </ul>
            <!-- End Hover Menu -->
          </li>
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
        <li class="border-b border-inherit dark:border-b-black"
          x-data="{openDropdown: 0}">
          <a href="#" class="flex items-center p-4"
            x-on:click="openDropdown !== 1 ? openDropdown = 1 : openDropdown = null">
            <span class="mr-4">Shop</span>
            <span class="transition-transform duration-400 transform"
              x-bind:class="openDropdown != 1 ? '': '-rotate-180'">
              <x-icons.icon-arrow set="h-4 w-4" />
            </span>
          </a>
          <ul class="relative overflow-hidden transition-all max-h-0 duration-400"
            x-ref="container"
            x-bind:style="openDropdown == 1 ? 'max-height: ' + $refs.container.scrollHeight + 'px' : ''">
            <li>
              <a href="#" class="block ps-9 p-4">Lorem, ipsum.</a>
            </li>
            <li>
              <a href="#" class="block ps-9 p-4">Lorem, ipsum dolor.</a>
            </li>
            <li>
              <a href="#" class="block ps-9 p-4">Lorem ipsum dolor sit amet.</a>
            </li>
          </ul>
        </li>
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