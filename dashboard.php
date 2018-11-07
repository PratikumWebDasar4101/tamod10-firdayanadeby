<?php  
require_once 'connection.php';
$kon = new connection();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php  
	include "source.php";
	?>
	<title></title>
</head>
<body>
	<h2>Form List</h2>
			</div>
			<div class="col-md-11">
				<table class="table table-hover" style="width:100%">
					<thead>
						<tr>
							<th>Nama</th>
							<th>NIM</th>
							<th>Kelas</th>
							<th>Hobby</th>
							<th>Genre Film</th>
							<th>Tempat Wisata</th>
							<th>Tanggal Lahir</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$query = "
							SELECT
							    `id`,
							    CONCAT(`nama_depan`, ' ', `nama_belakang`) AS 'Nama',
							    `nim`,
							    `kelas`,
							    `hobby`,
							    `genre_film`,
							    `tempat_wisata`,
							    `tanggal_lahir`
							FROM
							    `data_user`
							";
					$result= mysqli_query($kon->conn(),$query);
					while($data=mysqli_fetch_array($result)){
					?>
						<tr>
							<td align="center">
								<?php
								echo $data['Nama'];
								?>
							</td>
							<td align="center">
								<?php
								echo $data['nim'];
								?>
							</td>
							<td align="center">
								<?php
								echo $data['kelas'];
								?>
							</td>
							<td align="center">
								<?php
								echo $data['hobby'];
								?>
							</td>
							<td align="center">
								<?php
								echo $data['genre_film'];
								?>
							</td>
							<td align="center">
								<?php
								echo $data['tempat_wisata'];
								?>
							</td>
							<td align="center">
								<?php
								echo $data['tanggal_lahir'];
								?>
							</td>
							<td>
								<a href="ubah.php?id=<?php echo $data['id'] ?>">Edit</a>
								<a href="delete.php?id=<?php echo $data['id'] ?>">Delete</a>
							</td>
						</tr>
						<?php 
						}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<table>
		<tr>
			<td>
				<a href="newData.php">Tambah Data Mahasiswa</a>
			</td>
		</tr>
		<tr>
			<td>
				<a href="profil.php">Profil</a>
			</td>
		</tr>
	</table>
	</body>
</html>
