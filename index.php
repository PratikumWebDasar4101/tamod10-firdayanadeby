<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  .title{
    color:#007bff;
}

.mgTp{
    margin-top:10%;
}

.topBtn{
    margin-top:15px;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #007bff !important;
    opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
    color: #007bff !important;
}

::-ms-input-placeholder { /* Microsoft Edge */
    color: #007bff !important;
}

</style>
<div class="container">
    <div class="row mgTp">
        <form class="col-md-6 offset-md-3" action=" " method="POST">
            <h3 class="title">Please sign in</h3>
            <hr class="divisor">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div>
              <a href="registrasi.php">Registrasi</a>
            </div>
            <button type="submit" name="submit" value="x" class="btn btn-primary topBtn"><i class="fa fa-sign-in"></i> Sign in</button>
        </form>
    </div>
</div>
<?php  
require_once 'user.php';
$um = new user();
session_start();
if (isset($_POST['submit'])) {
  $username =$_POST['username'];
  $password =$_POST['password'];
  
  $query_success = $um->login($username,$password);

  $result = mysqli_num_rows($query_success);
  
  if ($result>0) {
    $data = mysqli_fetch_array($query_success);
    $_SESSION['id']=$data['id'];
    $_SESSION['username']= $data['username'];
    header('location: dashboard.php');
  }else{
    $_SESSION['prosesRegistrasi'] = "Username atau Password Belum Terdaftar atau Salah";
    header('location: index.php');
  }
}
?>