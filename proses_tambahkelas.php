<?php
include 'koneksi.php';
  $nama_kelas              = $_POST['nama_kelas'];
  $kompetensi_keahlian     = $_POST['kompetensi_keahlian'];
 


                  $query = "INSERT INTO kelas VALUES ('','$nama_kelas', '$kompetensi_keahlian')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='kelas.php';</script>";
                  }

            ?>