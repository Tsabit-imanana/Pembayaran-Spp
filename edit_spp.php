<?php

include 'function.php';

  if(isset($_POST["editspp"])){
    ubahspp($_POST);
  }

  if (isset($_GET['id'])) {
    $id = ($_GET["id"]);
    $query = "SELECT * FROM spp WHERE id_spp='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='spp.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='spp.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>EDIT SPP</title>
   
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
            <h1>EDIT SPP</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="spp.php">Data SPP</a></div>
              <div class="breadcrumb-item text-primary">Edit SPP</div>
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
                              <i class="fas fa-money-check-alt"></i>
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
                        <input name="id" value="<?php echo $data['id_spp']; ?>"  hidden />
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">TAHUN</label>
                          <div class="col-lg-4 col-md-6">
                            <input type="text" name="tahun" value="<?php echo $data['tahun']; ?>" disabled="disabled"/>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-white">NOMINAL</label>
                          <div class="col-lg-4 col-md-6">
                              <input type="text" name="nominal" value="<?php echo $data['nominal']; ?>" required=""/>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <button type="submit" name="editspp" class="btn btn-icon icon-right btn-primary">UBAH DATA<i class="fas fa-arrow-right"></i></button>
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