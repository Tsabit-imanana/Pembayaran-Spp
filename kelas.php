<?php
  include('koneksi.php');
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA KELAS</title>
    
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
            <h1>DATA KELAS</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item text-primary">Data kelas</div>
            </div>
          </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>LIST KELAS</h4>
                    <div class="card-header-form">
                      <form>
                          <div class="input-group-btn">
                            <a href="tambah_kelas.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                          <th>NAMA KELAS</th>
                          <th>KOMPETENSI KEAHLIAN</th>
                          <th>ACTION</th>
                        </tr>
                        </thead>
                         <tbody>
                           <?php
                              
                              $query = "SELECT * FROM kelas ORDER BY id_kelas ASC";
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
                          <td><?php echo $row['nama_kelas']; ?></td>
                          <td><?php echo substr($row['kompetensi_keahlian'], 0, 20); ?></td>   
                          <td>
                          <a href="edit_kelas.php?id=<?php echo $row['id_kelas']; ?>"class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          <a href="proses_hapuskelas.php?id=<?php echo $row['id_kelas']; ?>" class="btn btn-danger" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="fas fa-trash"></i></a>
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