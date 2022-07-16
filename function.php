<?php
$koneksi = mysqli_connect("localhost","root","","espepe");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

function ubahpetugas($data){

  global $koneksi;
  
  $id = $data['id'];

  $username     = $data['username'];
  $password           = $data['password'];
  $nama_petugas     = $data['nama_petugas'];
  $level            = $data['level'];


                    $query  = "UPDATE petugas SET username = '$username' WHERE id_petugas = '$id'";
                    $result = mysqli_query($koneksi, $query);
                     $query  = "UPDATE petugas SET password = '$password' WHERE id_petugas = '$id'";
                    $result = mysqli_query($koneksi, $query);
                     $query  = "UPDATE petugas SET nama_petugas = '$nama_petugas' WHERE id_petugas = '$id'";
                    $result = mysqli_query($koneksi, $query);
                     $query  = "UPDATE petugas SET level = '$level' WHERE id_petugas = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {

                      echo "<script>alert('Data berhasil diubah.');window.location='petugas.php';</script>";
                    }
              

}

function ubahsiswa($data){
	global $koneksi;

	$id = $data['id'];

  $id_kelas = $data['id_kelas'];
  $nama     = $data['nama'];
  $alamat     = $data['alamat'];
  $no_telp     = $data['no_telp'];

  
                   $query  = "UPDATE siswa SET id_kelas = '$id_kelas',nama = '$nama',alamat = '$alamat',no_telp = '$no_telp'  WHERE nisn = '$id'";

                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {

                      echo "<script>alert('Data berhasil diubah.');window.location='siswa.php';</script>";
                    }
}
function ubahkelas($data){
	global $koneksi;

	$id 					 = $data['id'];
 	$nama_kelas              = $data['nama_kelas'];
 	$kompetensi_keahlian     = $data['kompetensi_keahlian'];

                    $query  = "UPDATE kelas SET nama_kelas = '$nama_kelas' WHERE id_kelas = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    $query  = "UPDATE kelas SET kompetensi_keahlian = '$kompetensi_keahlian' WHERE id_kelas = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='kelas.php';</script>";
                    }
              

}
function ubahspp($data){
global $koneksi;
	$id = $data['id'];

  $nominal     = $data['nominal'];

                   $query  = "UPDATE spp SET nominal = '$nominal' WHERE id_spp = '$id'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='spp.php';</script>";
                    }


}
 function tambahpetugas(){

	
 }