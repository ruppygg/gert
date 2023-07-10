<?php require_once('../config.php') ?>

<?php
// Start or resume the session
// session_start();

// Set the last activity time
$_SESSION['last_activity'] = time();
?>


<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page  dark-mode">
  <script>
    start_loader()
  </script>
  <style>
    body{
      background-image: url("../uploads/round.JPG");
      background-size:cover;
      background-repeat:no-repeat;
    }
    .login-title{
      text-shadow: 2px 2px black
    }
  </style>
  <h1 class="text-center py-5 login-title"><b><?php echo $_settings->info('name') ?></b></h1>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>Login</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form id="login-frm" action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" autofocus name="username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
        
          <div class="row">
  <div class="col-6">
    <button type="submit" class="btn btn-primary btn-block text-left" style="color: white; margin-right: 40px;">LogIn</button>
  </div>
  <div class="col-6">
    <h1 style="font-size: 30px;">
      <a href="signup.php" class="btn btn-primary btn-block text-right" style="color: black; margin-left: 40px;">Sign up</a>
    </h1>
  </div>
</div>



          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>