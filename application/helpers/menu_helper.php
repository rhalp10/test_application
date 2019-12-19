<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('side_navlist')) {
  function side_navigation($navigation,$controller) {
    $navlink = "";
    foreach($navigation as $key => $sidenav){
     
      $sidenav_label = $key;

      foreach($sidenav as $key => $li){
          $li_a[$key] = $li;
      }

      if($li_a["controller"] == $controller){
         $sidenav_active_ul = 'active';
         $sidenav_active_span = '<span class="sr-only">(current)</span>';
      }
      else{
         $sidenav_active_ul = '';
         $sidenav_active_span = '';
      }
      
      $navlink .= '<li class="nav-item">
              <a class="nav-link '.$sidenav_active_ul.' " href="'.$li_a["link"].'">

                <span data-feather="'.$li_a["icon"].'" class="'.$li_a["icon"].'"></span>
                 '.$sidenav_label.' '.$sidenav_active_span.'
              </a>
            </li>';
      
    }
    return $navlink;
    
  }
}

  ?>