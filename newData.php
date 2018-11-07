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
	<h2>Form Registrasi</h2>
		<table>
		<form action=" " method="POST">
			<tr>
				<td>Nama Depan</td>
				<td>
					<input type="text" name="nama_depan">
				</td>
			</tr>
			<tr>
				<td>Nama Belakang</td>
				<td>
					<input type="text" name="nama_belakang">
				</td>
			</tr>
			<tr>
				<td>NIM</td>
				<td>
					<input type="text" name="nim">
				</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>
					<input type="text" name="kelas">
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td>
					<input type="email" name="email" placeholder="@gmail">
				</td>
			</tr>
			<tr>
				<td>hobby</td>
				<td>
					<input type="checkbox" name="hobby[]" value="Membaca">Membaca
					<input type="checkbox" name="hobby[]" value="Makan">Makan
					<input type="checkbox" name="hobby[]" value="Belajar">Belajar
					<input type="checkbox" name="hobby[]" value="Mandi">Mandi
					<input type="checkbox" name="hobby[]" value="Nonton">Nonton
					<input type="checkbox" name="hobby[]" value="Shoping">Shoping
				</td>
			</tr>
			<tr>
				<td>Genre Film</td>
				<td>
					<input type="checkbox" name="genre_film[]" value="Anime">Anime
					<input type="checkbox" name="genre_film[]" value="Action">Action
					<input type="checkbox" name="genre_film[]" value="Romance">Romance
					<input type="checkbox" name="genre_film[]" value="Komedi">Komedi
				</td>
			</tr>
			<tr>
				<td>Tempat Wisata</td>
				<td>
					<input type="checkbox" name="tempat_wisata[]" value="bali">Bali
					<input type="checkbox" name="tempat_wisata[]" value="tanjung_selor">Tanjung Selor
					<input type="checkbox" name="tempat_wisata[]" value="jakarta">Jakarta
					<input type="checkbox" name="tempat_wisata[]" value="lombok">Lombok
				</td>
			<tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>
					<input type="date" name="tanggal_lahir">
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="submit" value="submit">
				</td>
			</tr>
		</form>
		
	</table>
	

</body>
</html>
<?php
require_once 'mahasiswa.php';
$um = new mahasiswa();
if (isset($_POST['submit'])) {
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

	$query_success = $um->data_user($nama_depan,$nama_belakang,$nim,$kelas,$data_hobby,$data_genre_film,$data_tempat_wisata,$tanggal_lahir);
	if ($query_success) {
		header('location: dashboard.php');
	}else{
		header('location: newData.php');
	}

}
?>

