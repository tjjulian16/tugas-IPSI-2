<?php

$id = $_GET['id'];
$link = mysqli_connect("localhost", "root", "admin", "perpustakaan");
		$query ="SELECT id, judul FROM buku WHERE id LIKE '$id'";
		$result = mysqli_query( $link, $query );
		$bukuDipinjam = mysqli_fetch_array($result);
		$cart = null;
		$cartPinjam[] = null;
		array_push($cartPinjam, $bukuDipinjam);
		
		header('location:pinjam.php?cart[]=$cartPinjam');
?>