<?php  
session_start();
require_once 'mahasiswa.php';
$udm = new mahasiswa();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query_success = $udm->delete($id);
	if ($query_success) {
		header('location: dashboard.php');
	} else {
		echo "Ada Kesalahan Saat Menghapus Data <br>";
		die(mysqli_error($conn));
	}
}
?>
