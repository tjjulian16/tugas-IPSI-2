<?php 

function delete($id){
	session_start();
$cartDelete = $_SESSION['cart'];
$cartBaru = array();
foreach ($cartDelete as $delete) {
	if($delete['id'] == $id){

	}
	else{
		$cartBaru[] = $delete;

	}
}
$_SESSION['cart'] = $cartBaru;


header('location:pinjam.php?fitur=read&cart=ok');
}


?>