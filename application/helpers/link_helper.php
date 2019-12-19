<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------
if(!function_exists('link_file')) {
	/**
	 * Extra File Link Declaration
	 *
	 * Creates the link tag.
	 *
	 * @param	string	the URI of this application
	 * @param	string	a type of file
	 * @param	string	the URI segments of the form destination
	 * @param	array	a key/value pair hidden data
	 * @return	string
	 */
	 function link_file($base_link = '',$type = '',$link = '', $attributes = array()){
		$extra = "";

		if (is_string($attributes))
		{
			$extra = '';
		}
		else
		{
			foreach($attributes as $key => $row){
					$extra .= ' '.$key.'="'.$row.'" ';
			}
		}

		if ($type == "css"){
			$file ='      <link  rel="stylesheet" type="text/css" href="'.$base_link.$link.'" '.$extra.' />'.PHP_EOL;
		}
		if($type == "script"){
			$file ='      <script type="text/javascript" src="'.$base_link.$link.'" '.$extra.'></script>'.PHP_EOL;

		}
		if($type == "script1"){
			$file ="      <script>window.jQuery || document.write('<script src=\"".$base_link.$link."\" ><\/script>')</script>".PHP_EOL;
		}
		
		
	 
	 return $file;
}

}

  ?>