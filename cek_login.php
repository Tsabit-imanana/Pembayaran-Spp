<?php 

session_start();
include 'koneksi.php';


$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"select * from petugas where username='$username'");
$cek = mysqli_num_rows($login);

if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	if(password_verify($password , $data["password"])){
		if($data['level']=="admin"){

			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			header("location:dashboard.php");
	
		}else if($data['level']=="petugas"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "petugas";
			header("location:dashboard.php");
	
		}else if($data['level']=="siswa"){
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "siswa";
			$nisn = 74812;
			header("location:historysiswa.php?nisn=".$nisn);
	
		}else{
			header("location:index.php?pesan=gagal");
		}
	
		
	}else{
		header("location:index.php?pesan=gagal");
	}
	}



?>