<?php
  include('koneksi.php'); 
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA PENGGUNA</title>
    
  </head>
<body>

	<?php

  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
?>

      <div class="main-content bg-primary">
        <section class="section">
          <div class="section-header">
            <h1>DATA PENGGUNA</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item text-primary">Data pengguna</div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST PENGGUNA</h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_petugas.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                       <thead>
                          <tr>
                          <th>NO</th>
                          <th>USERNAME</th>
                         
                          <th>NAMA PENGGUNA</th>
                          <th>LEVEL</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                          


                              $query = "SELECT * FROM petugas ORDER BY id_petugas ASC";
                              $result = mysqli_query($koneksi, $query);
                              if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi).
                                   " - ".mysqli_error($koneksi));
                              }
                              $no = 1;
                              while($row = mysqli_fetch_assoc($result))
                              {
                              ?>
                        <tr>  
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row['username']; ?></td>
                         
                            <td><?php echo $row['nama_petugas']; ?></td>
                             <td><?php echo $row['level']; ?></td>   
                          <td>
                          <a href="edit_petugas.php?id=<?php echo $row['id_petugas']; ?>"class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          <a href="proses_hapuspetugas.php?id=<?php echo $row['id_petugas']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                         <?php
                           $no++;
                           }
                         ?>
                         </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
    </div>
  </div>
</body>
</html>