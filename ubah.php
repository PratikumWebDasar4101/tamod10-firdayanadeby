<?php  
require_once 'connection.php';
$con = new connection();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>		
		<h2>Form Edit</h2>
		<table>
			<form action=" " method="POST">
			<?php
			$id = $_GET['id'];
			$query ="SELECT * FROM data_user WHERE id = '$id'";
			$result = mysqli_query($con->conn(),$query);
			$data = mysqli_fetch_array($result);
			?>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		
			<tr>
				<td>Nama Depan</td>
				<td>
					<input type="text" name="nama_depan" value="<?php echo $data['nama_depan']?>">
				</td>
			</tr>
			<tr>
				<td>Nama Belakang</td>
				<td>
					<input type="text" name="nama_belakang" value="<?php echo $data['nama_belakang']?>">
				</td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>
					<input type="text" name="nim" value="<?php echo $data['nim']?>">
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>
					<input type="text" name="kelas" value="<?php echo $data['kelas']?>">
				</td>
			</tr>
			<tr>
				<td>hobby</td>
				<td>
					<?php 
						$hobby = explode(", ", $data['hobby']);
					?>
					<input type="checkbox" name="hobby[]" value="Membaca" <?php echo in_array("Membaca", $hobby) ? "checked" : ""; ?>>Membaca
					<input type="checkbox" name="hobby[]" value="Makan" <?php echo in_array("Makan", $hobby) ? "checked" : ""; ?>>Makan
					<input type="checkbox" name="hobby[]" value="Belajar" <?php echo in_array("Belajar", $hobby) ? "checked" : ""; ?>>Belajar
					<input type="checkbox" name="hobby[]" value="Mandi" <?php echo in_array("Mandi", $hobby) ? "checked" : ""; ?>>Mandi
					<input type="checkbox" name="hobby[]" value="Nonton" <?php echo in_array("Nonton", $hobby) ? "checked" : ""; ?>>Nonton<br>
					<input type="checkbox" name="hobby[]" value="Shoping" <?php echo in_array("Shoping", $hobby) ? "checked" : ""; ?>>Shoping<br>
					
				</td>
			</tr>
			<tr>
				<td>Genre Film</td>
				<td>
					<?php 
						$film = explode(", ", $data['genre_film']);
					?>
					<input type="checkbox" name="genre_film[]" value="Anime" <?php echo in_array("Anime", $film) ? "checked" : ""; ?>>Anime
					<input type="checkbox" name="genre_film[]" value="Action" <?php echo in_array("Action", $film) ? "checked" : ""; ?>>Action
					<input type="checkbox" name="genre_film[]" value="Romance" <?php echo in_array("Romance", $film) ? "checked" : ""; ?>>Romance
					<input type="checkbox" name="genre_film[]" value="Komedi" <?php echo in_array("Komedi", $film) ? "checked" : ""; ?>>Komedi
				</td>
			</tr>
			<tr>
				<td>Tempat Wisata</td>
				<td>
					<?php 
						$wisata = explode(", ", $data['tempat_wisata']);
					?>
					<input type="checkbox" name="tempat_wisata[]" value="bali" <?php echo in_array("bali", $wisata) ? "checked" : ""; ?>>Bali
					<input type="checkbox" name="tempat_wisata[]" value="tanjung_selor" <?php echo in_array("tanjung_selor", $wisata) ? "checked" : ""; ?>>Tanjung Selor
					<input type="checkbox" name="tempat_wisata[]" value="jakarta" <?php echo in_array("jakarta", $wisata) ? "checked" : ""; ?>>Jakarta
					<input type="checkbox" name="tempat_wisata[]" value="lombok" <?php echo in_array("lombok", $wisata) ? "checked" : ""; ?>>Lombok
				</td>
			<tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>
					<input type="date" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']?>">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="submit">
				</td>
			</tr>
		</form>
	</table>
	<br>
		<a href="dashboard.php">Dashboard</a>
	

</body>
</html>
<?php  
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$nama_depan = $_POST['nama_depan'];
	$nama_belakang = $_POST['nama_belakang'];
	$nim = $_POST['nim'];
	$kelas = $_POST['kelas'];
	$hobby = $_POST['hobby'];
	$data_hobby = implode(", ", $hobby);
	$genre_film = $_POST['genre_film'];
	$data_genre_film = implode(", ", $genre_film);
	$tempat_wisata = $_POST['tempat_wisata'];
	$data_tempat_wisata = implode(", ", $tempat_wisata);
	$tanggal_lahir = $_POST['tanggal_lahir'];

	$query ="UPDATE `data_user` SET 
			`nama_depan`='$nama_depan',
			`nama_belakang`='$nama_belakang',
			`nim`='$nim',
			`kelas`='$kelas',
			`hobby`='$data_hobby',
			`genre_film`='$data_genre_film',
			`tempat_wisata`='$data_tempat_wisata',
			`tanggal_lahir`='$tanggal_lahir' 
			WHERE id = '$id'";
	$result =mysqli_query ($con->conn(),$query) or die(mysqli_error($con->conn()));
	if ($result) {
		header('location: dashboard.php');
	}else{
		header('location: ubah.php?id=' . $id);
	}

}
?>