<?php 
require_once 'connection.php';
class mahasiswa{
	private $con;

	function __construct()
	{
		$connectionsi = new connection();
		$this->con = $connectionsi->conn();
	}

	public function delete($id)
	{
		$query = "DELETE FROM `data_user` WHERE id = '$id'";
		$query_success = mysqli_query($this->con, $query);
		return $query_success;
	}
    public function data_user($nama_depan,$nama_belakang,$nim,$kelas,$data_hobby,$data_genre_film,$data_tempat_wisata,$tanggal_lahir)
	{
		$query="INSERT INTO `data_user`(
			`nama_depan`,
			`nama_belakang`,
			`nim`,
			`kelas`,
			`hobby`,
			`genre_film`,
			`tempat_wisata`,
			`tanggal_lahir`
		) VALUES (
			'$nama_depan',
			'$nama_belakang',
			'$nim',
			'$kelas',
			'$data_hobby',
			'$data_genre_film',
			'$data_tempat_wisata',
			'$tanggal_lahir'
		)";
		$query_success = mysqli_query($this->con, $query) or die($this->con);
		return $query_success;
	}
}
?>