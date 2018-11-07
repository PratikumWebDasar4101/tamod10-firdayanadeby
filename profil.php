<?php  
require_once 'connection.php';
$con = new connection();
session_start();
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Your Profile</h3>
	<table>
		<?php 
		$query = "SELECT * FROM user WHERE id = '$id'";
		$result = mysqli_query($con->conn(), $query);
		$d = mysqli_fetch_array($result);
		?>
		<tr>
			<td>Username : </td>
			<td>
				<?php echo $d['username']; ?>
			</td>
		</tr>
		<form action=" " method="POST">
			<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
			<tr>
				<td>Ganti Password : </td>
				<td>
					<input type="password" name="new_password">
				</td>
			</tr>
			<tr>
				<td>Konfirmasi Password : </td>
				<td>
					<input type="password" name="konfirmasi_new_password">
				</td>
			</tr>
			<tr>
				<td>Password Lama : </td>
				<td>
					<input type="password" name="old_password">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="submit" name="submit" value="Submit">
				</td>
			</tr>
		</form>
		<tr>
			<td colspan="2"><a href="logOut.php">Logout</a></td>
		</tr>
	</table>
</body>
</html>
<?php  
include_once 'connection.php';
$con = new connection();
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$new_password = md5($_POST['new_password']);
	$konfirmasi_new_password = md5($_POST['konfirmasi_new_password']);
	$old_password = md5($_POST['old_password']);

	$query = "SELECT password FROM user WHERE id = '$id'";
	$result = mysqli_query($con->conn(),$query);
	$data = mysqli_fetch_assoc($result);
	if ($new_password == $konfirmasi_new_password) {
		if($old_password == $data['password']){
			$query = "UPDATE user SET password = '$new_password' WHERE id = '$id'";
			$result = mysqli_query($con->conn(),$query);
			if ($result) {
				echo "Sukses!";
				echo "<a href='profil.php'>Profil</a>";
			} else {
				echo "Gagal : " . mysqli_error($con->conn()) . "<br>";
				echo "<a href='profile.php'>Profil</a>";
			}
		} else {
			echo "password lama salah!";
			echo "<a href='profil.php'>Profil</a>";
		}
	} else {
		echo "konfirmasi password salah!";
		echo "<a href='profil.php'>Profil</a>";
	}

}
?>
