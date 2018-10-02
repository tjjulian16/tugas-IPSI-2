<?php

function save(){
	session_start();

$date = date('Y-m-d');
$cart = $_SESSION['cart'];
$hari = $_GET['hari'];
$link = mysqli_connect("localhost", "root", "admin", "perpustakaan");
		$query = "INSERT INTO peminjaman (tanggal) VALUES ('$date');";
		$query .= "SET @id_peminjaman = LAST_INSERT_ID();";
		foreach ($cart as $hasil) {
				$query .= "INSERT INTO dipinjam (peminjaman_id, buku_id, hari) VALUES (@id_peminjaman, $hasil[id], '$hari');";
			}

		$result = mysqli_multi_query( $link, $query );

		if($result){
			header('location:pinjam.php?fitur=read&hasil=berhasil');
			session_destroy();
		}
		else{
			header('location:pinjam.php?fitur=read&cart=ok&hasil=gagal');
		}

}

?>