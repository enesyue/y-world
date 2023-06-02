<?php

class Nav_Walker extends Walker_Nav_menu {

    function __construct($a_class_name, $ul_class_name) {
        $this->a_class_name = $a_class_name;
        $this->ul_class_name = $ul_class_name;
    }
     
    function start_lvl(&$output, $depth = 0, $args = null) 
    {           
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
            $titleName = $item -> title;

            $a_classname = $this->a_class_name;

            $ul_classname = $this->ul_class_name;

            if($depth === 0) {

                $output .= "<ul class='$ul_classname'>
                <div x-data='{ showDropdown: false }'>
                
                <a
                  @mouseover='showDropdown = true'
                  @mouseleave='showDropdown = false'
                  @click='showDropdown = !showDropdown'
                  class='$a_classname'
                >
                  $titleName
                </a>
                
              
                <div
                  x-cloak
                  x-show='showDropdown'
                  @mouseover='showDropdown = true'
                  @mouseleave='showDropdown = false'
                  class='pt-2'
                >";
              
            }
            else{
             $output .= "<li><a class='$a_classname'>$titleName</a></li>";
            }
    }

    function createsubitems() {

    }

    function end_el(&$output, $item, $depth = 0, $args = null) 
    {
    }

}
?>