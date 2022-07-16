<?php
include 'function.php';
if(isset($_POST["ubahsiswa"])){
    ubahsiswa($_POST);

}


  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);

    $query = "SELECT * FROM siswa,kelas,spp where siswa.nisn='$id' AND siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='siswa.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='siswa.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>EDIT SISWA</title>
   
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
            <h1>EDIT SISWA</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="spp.php">Data Siswa</a></div>
              <div class="breadcrumb-item text-primary">Edit Siswa</div>
            </div>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  </div>
                  <div class="card-body bg-primary">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-users"></i>
                            </div>
                            <div class="wizard-step-label">
                              Formulir Siswa
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <form class="wizard-content mt-2" method="post" action="">
                      <div class="wizard-pane">
                         <input name="id" value="<?php echo $data['nisn']; ?>" hidden />
                         <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NISN</label>
                          <div class="col-lg-4 col-md-6">
                            <input name="nisn" value="<?php echo $data['nisn']; ?>"  disabled="" />
                          </div>
                        </div> 
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NIS</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="nis" value="<?php echo $data['nis']; ?>" disabled="disabled"/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NAMA</label>
                          <div class="col-lg-4 col-md-6">
                              <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required=""/>
                          </div>
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">KELAS</label>
                          <div class="col-lg-4 col-md-6">
                             <select name="id_kelas">
                                    
                                    <?php
                                    $idbarangyangdipilih=$data['id_kelas']; 
                                    $query = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
                                    $result = mysqli_query($koneksi, $query);
                                    if(!$result){
                                      die ("Query Error: ".mysqli_errno($koneksi).
                                         " - ".mysqli_error($koneksi));
                                    }
                                    $no = 1;
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                  <option value="<?php echo $row['id_kelas']; ?>" <?php if($row['id_kelas']=="$idbarangyangdipilih"){?> selected="selected" <?php } ?>><?php echo $row['nama_kelas']; ?></option>
                               <?php
                                      $no++;
                                    }
                                    ?>
                            </select>
                          </div>
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">ALAMAT</label>
                          <div class="col-lg-4 col-md-6">
                              <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" required=""/>
                          </div>
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NO TELP</label>
                          <div class="col-lg-4 col-md-6">
                              <input type="text" name="no_telp" value="<?php echo $data['no_telp']; ?>" required=""/>
                          </div>
                        </div>
                           <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">TAHUN MASUK</label>
                          <div class="col-lg-4 col-md-6">
                             <select name="tahun" disabled="">
                                    
                                    <?php
                                    $idbarangyangdipilih=$data['id_spp']; 

                                    $query = "SELECT * FROM spp ORDER BY tahun ASC";
                                    $result = mysqli_query($koneksi, $query);
                     
                                    if(!$result){
                                      die ("Query Error: ".mysqli_errno($koneksi).
                                         " - ".mysqli_error($koneksi));
                                    }

                        
                                    $no = 1; 
                           
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                    ?> 
                                  <option value="<?php echo $row['id_spp']; ?>" <?php if($row['id_spp']=="$idbarangyangdipilih"){?> selected="selected" <?php } ?>><?php echo $row['tahun']; ?></option>
                               <?php
                                      $no++; 
                                    }
                                    ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <button type="submit" name="ubahsiswa" class="btn btn-icon icon-right btn-primary">UBAH SISWA<i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      
    </div>
    </div>