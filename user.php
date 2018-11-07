<?php 
require_once 'connection.php';
class user{
	private $con;

	function __construct()
	{
		$connection = new connection();
		$this->con = $connection->conn();
	}

	public function registrasi($username,$password)
	{
		$query = "INSERT INTO `user`(`username`, `password`) VALUES ('$username','". md5($password) ."')";
		$query_success = mysqli_query($this->con,$query);
		return $query_success;
	}

	public function login($username,$password)
	{
		$query = "SELECT `id`, `username`, `password` FROM `user` WHERE username = '$username' AND password = '". md5($password) ."'";
		$query_success = mysqli_query($this->con,$query) or die(mysqli_error($this->con));
		return $query_success;
	}
}
?>