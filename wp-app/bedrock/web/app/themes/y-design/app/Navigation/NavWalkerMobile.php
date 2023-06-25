<?php

class Nav_Walker_Mobile extends Walker_Nav_menu {

    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= "";
    }
     

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
            $titleName = $item -> title;

            $childrenExist = $args -> walker -> has_children;

            $subitem = $item -> menu_item_parent;

        if ($subitem == 0)
        {
            if($childrenExist)
            {
              $output .= '
                        <li class="border-b border-inherit dark:border-b-black"
                        x-data="{openDropdown: 0}">
                        <a href="#" class="flex items-center p-4"
                            x-on:click="openDropdown !== 1 ? openDropdown = 1 : openDropdown = null">
                            <span class="mr-4">'.$titleName.'</span>
                            <span class="transition-transform duration-400 transform"
                            x-bind:class="openDropdown != 1 ? ``: `-rotate-180`">
                            '. view('components.icons.icon-arrow')->render() .'
                            </span>
                        </a>
                        <ul class="relative overflow-hidden transition-all max-h-0 duration-400"
                        x-ref="container"
                        x-bind:style="openDropdown == 1 ? `max-height: ` + $refs.container.scrollHeight + `px` : ``">
                        ';
                        
              
              
            }

            else
            {
              $output .= "
                        <li class='border-b border-inherit dark:border-b-black'>
                        <a href='#' class='block p-4'>$titleName</a>
                        </li>
                        ";
            }
          
        }
      else 
      {

        $output .= "<li>
                        <a href='#' class='block ps-9 p-4'>$titleName</a>
                    </li>
                    ";

      }
    }

    function end_lvl(&$output, $depth = 0, $args = null) 
    {

      $output .= "</ul></li>";

    }
         


}
?>