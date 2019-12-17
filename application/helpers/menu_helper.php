<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('side_navlist')) {
  function side_navlist($controller,$name,$link,$icon) {
    if ($controller == $link) {
      $active_ul_snav = "active";
      $active_ul_snav_span = '<span class="sr-only">(current)</span>';
      
    }
    else{
       $active_ul_snav = '';
       $active_ul_snav_span = '';
    }
    $navlink = '<li class="nav-item">
            <a class="nav-link '.$active_ul_snav.' " href="'.$link.'">
              <span data-feather="'.$icon.'"></span>
               '.$name.' '.$active_ul_snav_span.'
            </a>
          </li>';
    return $navlink;
  }
}

  ?>