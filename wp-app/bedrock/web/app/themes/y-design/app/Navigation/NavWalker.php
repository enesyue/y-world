<?php

class Nav_Walker extends Walker_Nav_menu {

    function __construct($a_classname, $a_classname_dropdown) {
        $this->aClassName= $a_classname;
        $this->aDropDownClassName= $a_classname_dropdown;
    }

    function start_lvl(&$output, $depth = 0,  $args = null) {
             $output .= "";
    }    
     

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
            $titleName = $item -> title;

            $a_classname = $this->aClassName;

            $a_dropdown_classname = $this->aDropDownClassName;

            $childrenExist = $args -> walker -> has_children;

            $subitem = $item -> menu_item_parent;

        if ($subitem == 0)
        {
            if($childrenExist)
            {
              $output .="
                        <li class='relative inline-block py-2 px-3'
                        x-data='{ open: false }'
                        @mouseleave='open = false'>
                        <a class='flex items-center rounded-md' href='#'
                        @mouseover='open = true'>
                        <span class='mr-4'>$titleName</span>
                        <span class='transition-transform duration-500 transform'
                        x-bind:class='open = ! open ? ``: `-rotate-180`'>
                        ". view('components.icons.icon-arrow')->render() ."
                        </span>
                        </a>
                        <ul class='absolute right-0 py-1 bg-white rounded-lg shadow-xl min-w-max'
                        x-show='open'
                        x-transition:enter='transition ease-out duration-300'
                        x-transition:enter-start='opacity-0 transform scale-90'
                        x-transition:enter-end='opacity-100 transform scale-100'
                        x-transition:leave='transition ease-in duration-300'
                        x-transition:leave-start='opacity-100 transform scale-100'
                        x-transition:leave-end='opacity-0 transform scale-90'>
                        ";
            }

            else
            {
              $output .= "
                          <li>
                          <a href='#' class='$a_classname aria-current='true'>
                          $titleName
                          </a>           
                          </li>
                        ";
            }
          
        }
      else 
      {

        $output .= "<li>
                   <a href='#' class='$a_dropdown_classname'>$titleName</a>
                   </li>";

      }
    }

    function end_lvl(&$output, $depth = 0, $args = null) 
    {

      $output .= "</ul></li>";

    }
         
}

?>