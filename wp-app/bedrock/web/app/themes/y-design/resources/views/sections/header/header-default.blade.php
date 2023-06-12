<header>
  
</header>
<nav x-data="{ open: false }" class="bg-gray-800">
  <div class="">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <div class="flex-shrink-0">
          <a href="#" class="text-white font-bold text-xl">Logo</a>
        </div>
        <div class="hidden md:block">
          <ul class="ml-10 flex items-baseline space-x-4">
            <li class="relative" x-data="{ open: false }"  @mouseenter="open = true" @mouseleave="open = false">
              <a href="#" class="text-gray-300 hover:text-white px-3 py-2 font-medium">Option 1</a>
              <ul x-show="open"
              x-transition:enter="transition ease-out duration-200"
              x-transition:enter-start="opacity-0 transform scale-95"
              x-transition:enter-end="opacity-100 transform scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="opacity-100 transform scale-100"
              x-transition:leave-end="opacity-0 transform scale-95"
              class="absolute z-10 bg-gray-800 text-white rounded-md shadow-lg">
                <li><a href="#" class="block px-4 py-2 text-sm">Submenu 1</a></li>
                <li><a href="#" class="block px-4 py-2 text-sm">Submenu 2</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="text-gray-300 hover:text-white px-3 py-2 font-medium">Option 2</a>
            </li>
            <li>
              <a href="#" class="text-gray-300 hover:text-white px-3 py-2 font-medium">Option 3</a>
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