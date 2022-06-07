<?php
    try {
	  $conn = new PDo('mysql:host=localhost;dbname=projeto_biblioteca',"root",'');
	}catch (PDOException $e ) {
	    echo $e->getMessage(); 
	}
?>