<?php

class NavWalkerFooter extends Walker_Nav_Menu {

function start_lvl(&$output,$depth  = 0,$args  = null)
{
    $test  = "";
    $output .= "";
}

function start_el(&$output, $item, $depth = 0,  $args = null, $id = 0) 
{
    $titleName = $item -> title;

    $subitem = $item -> menu_item_parent;

    if ($subitem == 0) {
        $output .= "<div class='text-center sm:text-left'>
        <p class='text-lg font-medium'>$titleName</p>

        <nav aria-label='Footer About Nav' class='mt-8'>
        <ul class='space-y-4 text-sm'>
        ";
    }
    else {
        $output .= "<li>
                <a
                  class='hover:text-slate-400'
                  href='$titleName'
                >
                  $titleName
                </a>
              </li>";
    }
}
function end_lvl(&$output, $depth = 0, $args = null)
{
  $output .= "</ul></nav></div>";
}

}
?>