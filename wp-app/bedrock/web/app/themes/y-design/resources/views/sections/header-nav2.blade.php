@if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation',
      'container' => false,
      'walker' => new Nav_Walker("nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center", "nav-item dropdown dropdown-hover mx-2", "") ,
      'echo' => false,
      'depth' => 0,
      'items_wrap' => '%3$s' 
      ])!!}
  @endif