<?php  

function cari( $keyword ) {
		$link = mysqli_connect("localhost", "root", "admin", "perpustakaan");
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

function display ($listBuku){            
			
			?>

			<!DOCTYPE html>
<html>
<head>
	<title>Cari Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container" style=" padding: 8%; padding-top: 2%; margin: 10%; border:2px solid #12a8bb;">
	<h2 style="text-align: center; margin-bottom: 10%;">Form Pencarian </h2>
		<div class="col-md-12">
			<div class="row" style="text-align: center;">
			<div class="col-md-12" style=" border-radius: 20px; margin-right: 10%; padding: 2%;">
				<form action="fitur.php?fitur=cari" method="get">
					<input type="text" name="bukuDicari" class="form-control" placeholder="Masukkan judul buku">
					<input type="hidden" name="fitur" value="cari">
					<button type="submit" class="btn btn-primary" style="margin-top: 5%; padding: 2% 15%; border-radius: 20px;">Cari</button>
				</form>
				<br><br>

				 <div class="col-md-12 col-sm-12">
            <div class="table-responsive" style="margin-top: 2%;">
              <table class="table table-striped">
                <thead>
                  <tr>
                  	 <th scope="col" class="text-center">ID BUKU</th>
                    <th scope="col" class="text-center">JUDUL BUKU</th>
                  </tr>
                </thead>
                <tbody>
                  
                	<?php
                	if(isset($_GET['bukuDicari'])){
                 $hasil = $listBuku;
					if($hasil === null){
						echo "Buku Tidak Ditemukan";
					}
					else{

                   for ($i=0; $i < count($hasil['id']); $i++) { 
                    ?>
                    <tr >
                    
                    <td class="text-center"><?php echo $hasil['id'] ?></td>
                    <td class="text-center"><?php echo $hasil['judul']?></td>
                   
                  </tr>
                  <?php
                   }}} 
                	
                	?>
					
                  
                </tbody>
              </table>

            </div>
            <a href="fitur.php?fitur=cari">Cari lagi?</a>
            <br><br>
            <a href="halaman_utama.php">Kembali Ke Halaman Utama</a>
          </div>
        </div>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>

			         
<?php
}

function formCari(){

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Cari Buku</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container" style=" padding: 8%; padding-top: 2%; margin: 10%; border:2px solid #12a8bb;">
	<h2 style="text-align: center; margin-bottom: 10%;">Form Pencarian </h2>
		<div class="col-md-12">
			<div class="row" style="text-align: center;">
			<div class="col-md-12" style=" border-radius: 20px; margin-right: 10%; padding: 2%;">
				<form action="fitur.php?fitur=cari" method="get">
					<input type="text" name="bukuDicari" class="form-control" placeholder="Masukkan judul buku">
					<input type="hidden" name="fitur" value="cari">
					<button type="submit" class="btn btn-primary" style="margin-top: 5%; padding: 2% 15%; border-radius: 20px;">Cari</button>
				</form>
				<br><br>

				 <div class="col-md-12 col-sm-12">
            <div class="table-responsive" style="margin-top: 2%;">
              <table class="table table-striped">
                <thead>
                  <tr>
                  	 <th scope="col" class="text-center">ID BUKU</th>
                    <th scope="col" class="text-center">JUDUL BUKU</th>
                  </tr>
                </thead>
                <tbody>
                  
                
                  
                </tbody>
              </table>

            </div>
            <a href="fitur.php?fitur=cari">Cari lagi?</a>
            <br><br>
            <a href="halaman_utama.php">Kembali Ke Halaman Utama</a>
          </div>
        </div>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>
<?php
}
?>
