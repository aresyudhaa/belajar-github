<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

	$response = array();
	//data
	$npm = $_POST['npm'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$sesi = $_POST['sesi'];

	require_once('dbConnect.php');
	$sql = "SELECT *FROM mahasiswa WHERE npm = 'npm'";
	$check = mysqli_fetch_array(mysqli_query($con,$sql));
	if(isset($check)){
		$response["value"]=0;
		$response["message"]="oops! NPM sudah ada";
		echo json_encode($response);
	}else {
		$sql = "INSERT INTO mahasiswa(npm,nama,kelas,sesi)VALUES('$npm','$nama','$kelas','$sesi')";
		if(mysqli_query($con,$sql)){
			$response["value"]=1;
			$response["message"]="SUKSES";
			echo json_encode($response);
		}else{
			$response["value"]=0;
			$response["message"]="Coba lagi";
			echo json_encode($response);
		}
	}
	mysqli_close($con);
}else{
	$response["value"]=0;
	$response["message"]="Coba lagi";
	echo json_encode($response)
}