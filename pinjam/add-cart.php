	<?php
session_start();
$id = $_GET['id'];
$link = mysqli_connect("localhost", "root", "admin", "perpustakaan");
		$query ="SELECT id, judul FROM buku WHERE id LIKE '$id'";
		$result = mysqli_query( $link, $query );
		$bukuDipinjam = mysqli_fetch_array($result);
		$cart = null;
		$cartPinjam = array();
		if(isset($_SESSION['cart'])){
			$cartPinjam = $_SESSION['cart'];
			$cartPinjam[] = $bukuDipinjam;
			$_SESSION['cart'] = $cartPinjam;
		}else{
			$cartPinjam[] = $bukuDipinjam;
			$_SESSION['cart'] = $cartPinjam;
		}
		
		header('location:read-cart.php?cart=ok');
?>