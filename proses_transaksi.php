<?php
include 'koneksi.php';



	  $id_petugas    = $_POST['id_petugas'];
  	$nisn          = $_POST['nisn'];
  	$tgl_bayar     = $_POST['tgl_bayar'];
  	$bulan_dibayar = $_POST['bulan_dibayar'];
  	$id_spp        = $_POST['id_spp'];
  	$jumlah_bayar  = $_POST['jumlah_bayar'];
    

    $queryspp = "SELECT * FROM siswa,kelas,spp where siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nisn ASC";
    $result = mysqli_query($koneksi, $queryspp);

    function cekbayar($jumlah_bayar){
      if ($jumlah_bayar>=200000){
        return "lunas";
      }else{
        return "belum lunas";
      }
    }

  	$status_bayar =cekbayar($jumlah_bayar);
 
    function cekspp($id_spp){
      if($id_spp = 6){
        return 2022;
      }else if($id_spp = 7){
        return 2021;
      }
    }
    $tahun_dibayar = cekspp($id_spp);



                  $query = "INSERT INTO pembayaran VALUES ('','$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar
                  ', '$id_spp', '$jumlah_bayar' , '$status_bayar')";
                  $result = mysqli_query($koneksi, $query);
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='transaksi.php';</script>";
                  }

            ?>