<?php

class Nav_Walker extends Walker_Nav_menu {

    function __construct($li_classname, $a_classname, $a_classname_dropdown) {
        $this->liClassName = $li_classname;
        $this->aClassName= $a_classname;
        $this->aDropDownClassName= $a_classname_dropdown;
    }
     

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
            $titleName = $item -> title;

            $a_classname = $this->aClassName;

            $li_classname = $this->liClassName;

            $childrenExist = $args -> walker -> has_children;

            $subitem = $item -> menu_item_parent;

        if ($subitem == 0)
        {
        
            if($childrenExist)
            {
              $output .= "
                          <div>
                          <button class='peer $li_classname' type='button'>
                              <a href='/$titleName' class='$a_classname flex flex-row gap-1'>
                              $titleName
                              <span class='mt-0.5 w-5'>
                              <svg
                                      xmlns='http://www.w3.org/2000/svg'
                                      viewBox='0 0 20 20'
                                      fill='currentColor'
                                      class='h-5 w-5'>
                                      <path
                                        fill-rule='evenodd'
                                        d='M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 
                                        111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z'
                                        clip-rule='evenodd'/>
                                    </svg> 
                              </a>
                              </span>
                          </button>
                          <div class='absolute hidden peer-hover:flex hover:flex
                           bg-white w-1/6 drop-shadow-lg backdrop-blur-3xl'>
                        ";
              
            }

            else
            {
              $output .= "
                          <li class='$li_classname'>
                          <a href='/$titleName' class='$a_classname'>
                          $titleName
                          </a>           
                          </li>
                        ";
            }
          
        }
      else 
      {

        $output .= "<a href='/$titleName' class='$this->aDropDownClassName'>$titleName</a>";

      }
    }

    function end_lvl(&$output, $depth = 0, $args = null) 
    {

      $output .= "</div></div>";

    }
         


}
?>