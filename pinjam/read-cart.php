<?php  

function cari( $keyword ) {
		$link = mysqli_connect("localhost", "root", "", "perpustakaan");
		$query ="SELECT id, judul FROM buku WHERE judul LIKE '%$keyword%'";
		$result = mysqli_query( $link, $query );
		$listBuku = null;
		while ( $row = mysqli_fetch_array( $result ) ) {
		

		if($row !== null){
			$listBuku = $row;
		}

		}
		mysqli_close( $link );
		return $listBuku;
		

}

session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<title>YOUR CART</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container" style=" padding: 8%; padding-top: 2%; margin: 10%; border:2px solid #12a8bb;">
	<h2 style="text-align: center; margin-bottom: 10%;">YOUR CART </h2>
		<div class="col-md-12">
			<div class="row" style="text-align: center;">
			

				 <div class="col-md-12 col-sm-12">
            <div class="table-responsive" style="margin-top: 2%;">
              <table class="table table-striped">
                <thead>
                  <tr>
                  	 <th scope="col">ID BUKU</th>
                    <th scope="col">JUDUL BUKU</th>
                    <th scope="col">HAPUS BUKU</th>
                  </tr>
                </thead>
                <tbody>
                  <?php	
                  


                 if(isset($_GET['cart']) ){
                
                 $hasil = $_SESSION['cart'];
					if($hasil === ''){
						echo "Buku Tidak Ditemukan";
					}
					else{
					foreach ($hasil as $cetak) {
						?>						
                    <tr >
                    <td class="text-center"><?php echo $cetak['id'] ?></td>
                    <td><?php echo $cetak['judul']?></td>
                    <td><a href="<?php  echo "delete-cart.php?id=$cetak[id]";?>">Hapus</a></td>
                   
                  </tr>
						<?php
					}
                   for ($i=0; $i < count($hasil); $i++) { 
                    ?>
                  <?php
                   }}}

                  ?>

					
                  
                </tbody>
              </table>

            </div>
            
            <br><br>
            <form action="" method="post" class="col-md-12">
            	<label>Masukkan Jumlah Hari Peminjaman</label>
            	<input type="text" name="hari" class="form-control">
            	<br>
            	<button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            <br>
            <a href="halaman_utama.php">Kembali Ke Halaman Utama</a>
          </div>
        </div>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>

