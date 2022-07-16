<?php
    include('koneksi.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>TRANSAKSI</title>

</head>
<body>

    <?php

    include ('tampilan/header.php');
    include ('tampilan/footer.php');
    include ('tampilan/sidebar.php');
?>


    <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>HISTORY</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="history.php">History</a></div>
            </div>
        </div>
        <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4>History Pembayaran</h4>
                    <div class="card-header-form">
                    </div>
                  </div>
        <form action="" method="get">
                      <table class="table">
                      <tr>
                      <td>NISN</td>
                      <td>:</td>
                      <td>
                      <input class="form-control" type="text" name="nisn" placeholder="--Masukan NISN--">
                      </td>
                      <td>
                      <button class="btn btn-success" type="submit" name="cari">Cari</button>
                      </td>
                      </tr>

                      </table>
                      </form>
                <?php 
                if (isset($_GET['nisn']) && $_GET['nisn']!='') {
                  $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$_GET[nisn]'");
                  $data = mysqli_fetch_array($query);
                  $nisn = $data['nisn'];
                
                ?>

                <h2>DATA SISWA</h2>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">NISN</th>
                      <th scope="col">NAMA SISWA</th>
                      <th scope="col">ID KELAS</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <td><?php echo $data['nisn']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['id_kelas']; ?></td>
                  </tbody>
                </table>

                <h2>DATA SPP SISWA</h2>
              <table class="table table-striped">
                <thead> 
                  <tr>
               
               <th scope="col"> NISN</th>
                <th scope="col">Tanggal Bayar</th>
                <th scope="col">Bulan Bayar</th>
                <th scope="col">Tahun Bayar</th>             
                <th scope="col">Jumlah</th>
                <th scope="col">Status</th>

                  </tr>
                </thead>

                <tbody>
                  <?php 
    
              
                  $query = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE nisn='$data[nisn]' ORDER BY bulan_dibayar ASC");
                  
                  

                  while ($data=mysqli_fetch_array($query)) {
                    
                
                    echo "<tr>
                 
                          <td>  $data[nisn]</td>
                          <td>  $data[tgl_bayar]</td>
                          <td>  $data[bulan_dibayar]</td>
                          <td>  $data[tahun_dibayar]</td>                        
                          <td>  $data[jumlah_bayar]</td>
                          <td>  $data[status_bayar]</td>


                        </tr>";
                        
                  }

                   ?>

                </tbody>

              </table>  
                
    <?php 
    }
    if(isset($_GET['lunas'])){
      $id = $_GET['id'];
      $ambilData = mysqli_query($connect, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp=spp.id_spp 
                                      WHERE id_pembayaran = '$id'");
      $row = mysqli_fetch_assoc($ambilData);
      $sisa = $row['nominal'] - $row['jumlah_bayar'];
      $hasil = $row['jumlah_bayar'] + $sisa;
      $update = mysqli_query($connect, "UPDATE pembayaran SET jumlah_bayar='$hasil' WHERE id_pembayaran='$id'");
      if($update){
          echo "<script>alert('Data Berhasil Ditambahkan !');location.href='../transaction/transaksi.php';</script>";
      }
  }
    ?>      
        
        </div>
  </body>
</html>