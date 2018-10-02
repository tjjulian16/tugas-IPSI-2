<?php  

include "read-cart.php";
		if (!isset($_GET['fitur'])) {
			$fitur=null;
		}
		else{
			$fitur = $_GET['fitur'];
		}
		
		switch($fitur) {
		case 'add':
		include "add-cart.php";
		$idbuku = $_GET['id'];
		add($idbuku); 
		break;
		case 'delete':
		include "delete-cart.php";
		$idbuku = $_GET['id'];
		delete($idbuku); 
		break;
		
		case 'save': 
		include "save-cart.php";
		save(); 
		break;

		case 'read':
		default:
		 read();
		break;
		}

?>

 


