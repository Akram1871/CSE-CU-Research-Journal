<?php 
  

// The location of the PDF file 
// on the server 

$filename = $_GET['local']; 
$file=$filename;

header('Content-type: application/pdf'); 
  
header('Content-Disposition: inline; filename="' . $filename . '"'); 
  
header('Content-Transfer-Encoding: binary'); 
  
header('Accept-Ranges: bytes'); 
  
// Read the file 
@readfile($file); 
?>  

