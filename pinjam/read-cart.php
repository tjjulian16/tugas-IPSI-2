<?php  
session_start();

function read(){
  ?>
 <!DOCTYPE html>
<html>
<head>
  <title>YOUR CART</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<div class="container" style=" padding: 8%; padding-top: 2%; margin: 10%; border:2px solid #12a8bb;">
  <h2 style="text-align: center; margin-bottom: 5%;">DAFTAR BUKU </h2>
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
                  
                  $link = mysqli_connect("localhost", "root", "admin", "perpustakaan");
    $query ="SELECT id, judul FROM buku";
    $result = mysqli_query( $link, $query );
    while ($baris = mysqli_fetch_array($result)) {
      $hasil['id'] = $baris['id'];
      $hasil['judul'] = $baris['judul'];

      ?>
       <tr >
                    <td class="text-center"><?php echo $hasil['id'] ?></td>
                    <td><?php echo $hasil['judul']?></td>
                    <td><a href="<?php  echo "pinjam.php?fitur=add&id=$hasil[id]";?>">Tambah</a></td>
                   
                  </tr>



      <?php
          }
      ?>
      
                  
                </tbody>
              </table>

            </div>

<h2 style="text-align: center; margin: 5% 0;">CART ANDA </h2>
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
                    <td><a href="<?php  echo "pinjam.php?fitur=delete&id=$cetak[id]";?>">Hapus</a></td>
                   
                  </tr>
            <?php
          }
                    
                    ?>
                  <?php
                   }}

                  ?>

          
                  
                </tbody>
              </table>

            </div>
            
            <br><br>
            <form action="pinjam.php" method="get" class="col-md-12">
              <label>Masukkan Jumlah Hari Peminjaman</label>
              <input type="text" name="hari" class="form-control">
              <input type="hidden" name="fitur" value="save">
              <br>
              <button type="submit" class="btn btn-primary">Pinjam</button>
            </form>
            <br>
            <?php 
            if(isset($_GET['hasil'])){

               if($_GET['hasil'] == 'berhasil'){
              ?>
              <h3>Data Peminjaman Berhasil Disimpan!</h3>
              <?php
            }
            else{
              ?>
              <h3>Data Peminjaman Gagal Disimpan!</h3>
              <?php
            }
            }
            ?>

            <br>
            <a href="../halaman_utama.php">Kembali Ke Halaman Utama</a>
            
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





