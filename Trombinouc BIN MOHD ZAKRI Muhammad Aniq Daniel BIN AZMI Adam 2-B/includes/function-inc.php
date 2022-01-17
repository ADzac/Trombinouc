<?php
	function debug ($array){
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
	function dirToArray($dir){
		$result = array();

		$cdir = scandir($dir);
		$cdir = glob($dir."*.{jpg,gif,png,jpeg}",GLOB_BRACE);
		foreach ($cdir as $key => $value)
   {
      if (!in_array($value,array(".","..")))
      {
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value))
         {
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value);
         }
         else
         {
            $result[] = $value;
         }
      }
   }
  
   return $result;
}
?>
		
