<?php 

$controller = $this->uri->segment(1); 

if ( isset($controller)){
  if ( ! file_exists(APPPATH.'views/'.$controller.'.php'))
  {
      // Whoops, we don't have a page for that!
      show_404();
  }
  else{
    include(APPPATH.'views/'.$controller.'.php');
  }
}
else{
  
}
  
?>