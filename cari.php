<?php  

function cari( $keyword ) {
		$link = mysqli_connect("localhost", "root", "admin", "perpustakaan");
		$query ="SELECT id, judul FROM buku WHERE judul LIKE '%$keyword%'";
		$result = mysqli_query( $link, $query );

		while ( $row = mysqli_fetch_array( $result ) ) {
		$listBuku = $row;

		}
		mysqli_close( $link );
		return $listBuku;
		

}
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
				<form action="" method="get">
					<input type="text" name="bukuDicari" class="form-control" placeholder="Masukkan judul buku">
					<button type="submit" class="btn btn-primary" style="margin-top: 5%; padding: 2% 15%; border-radius: 20px;">Cari</button>
				</form>
				<br><br>

				 <div class="col-md-12 col-sm-12">
            <div class="table-responsive" style="margin-top: 2%;">
              <table class="table table-striped">
                <thead>
                  <tr>
                  	 <th scope="col">ID BUKU</th>
                    <th scope="col">JUDUL BUKU</th>
                  </tr>
                </thead>
                <tbody>
                  <?php	
                  


                 if(isset($_GET['bukuDicari']) ){
                
                 $hasil= cari($_GET['bukuDicari']);
					
					
                   for ($i=0; $i < count($hasil['id']); $i++) { 
                    ?>
                    <tr >
                    
                    <td class="text-center"><?php echo $hasil['id'] ?></td>
                    <td><?php echo $hasil['judul']?></td>
                   
                  </tr>
                  <?php
                   }}

                  ?>
                  
                </tbody>
              </table>

            </div>
            <a href="cari.php">Cari lagi?</a>
          </div>
        </div>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>

