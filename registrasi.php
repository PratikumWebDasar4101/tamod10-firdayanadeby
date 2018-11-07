<?php
require_once 'connection.php';
$kon = new connection();  
session_start();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<form class="form-horizontal" method="POST" action=" ">
<fieldset>

<!-- Form Name -->
<legend>Registration</legend>

<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Email">Username</label>
  <div class="controls">
    <input id="username" name="username" type="text" placeholder="username" class="input-large" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="Password">Password</label>
  <div class="controls">
    <input id="Password" name="password" type="password" placeholder="password" class="input-large" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="confirmpassword">Konfirmasi Password</label>
  <div class="controls">
    <input id="confirmpassword" name="konfirmasi_password" type="password" placeholder="konfirmasi_password" class="input-large" required="">
    
  </div>
</div>
<div>
  <input type="submit" name="submit" value="submit">
</div>
</fieldset>
</form>

<?php  
require_once 'user.php';
$um = new user();
if (isset($_POST['submit'])) {
  $username         = $_POST['username'];
  $password         = $_POST['password'];
  $konfirmasi_password  = $_POST['konfirmasi_password'];
  if ($password==$konfirmasi_password) {
    $query_success = $um->registrasi($username, $password);
    if ($query_success) {
      header('location: index.php');
    }else{
      echo "gagal registrasi";
    }
  } else {
    echo "gagal";
  }
}
?>