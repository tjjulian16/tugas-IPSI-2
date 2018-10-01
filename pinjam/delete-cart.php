<?php 
session_start();
$id = $_GET['id'];
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


header('location:read-cart.php?cart=ok');

?>