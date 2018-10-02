


<?php



		include "cari.php";
		if (!isset($_GET['fitur'])) {
			$fitur=null;
		}
		else{
			$fitur = $_GET['fitur'];
		}
		
		switch($fitur) {
		case 'pinjam':
		header('location:pinjam/pinjam.php?fitur=read');
		exit;

		case 'cari':
		default:
		if(!isset($_GET['bukuDicari'])){
			formCari();
		}
		
		$keyword = $_GET['bukuDicari'];
		$listbuku = cari( $keyword );
		display( $listbuku );
		break; 	
		
		
		
	}
		
		
				


?>