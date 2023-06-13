@if (has_nav_menu('primary_navigation'))
  <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    {!! wp_nav_menu(['theme_location' => 'primary_navigation', 
    'container_class' => 'flex flex-1 items-center justify-end gap-8', 
    'menu_class' => 'hidden lg:flex lg:gap-4 lg:text-xs lg:font-bold lg:uppercase lg:tracking-wide lg:text-gray-500', 
    'walker' => new Nav_Walker("grid h-16 w-16 place-content-center border-b-4 border-transparent hover:border-red-700", "hidden lg:flex lg:gap-4 lg:text-xs lg:font-bold lg:uppercase lg:tracking-wide lg:text-gray-500") ,
    'echo' => false,
    'depth' => 0
    ])!!}
  </nav>
@endif