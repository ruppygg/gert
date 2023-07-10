
<?php
// require_once('inc/header.php')
// include("signup_login.php");
    // $conn =new mysqli("127.0.0.1", "root", "", "sms_db");

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sms_db";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        print("check database connection");
    } 
    
    // else{
    //       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //         // Retrieve form data
    //         $username = $_POST['username'];
    //         $firstname = $_POST['firstname'];
    //         $lastname = $_POST['lastname'];
    //         $password = $_POST['password'];
    //         $confirmPassword = $_POST['confirm_password'];
        
    //         // Validate form data
    //         $errors = [];
    //         if (empty($username)) {
    //             $errors[] = 'Username is required';
    //         }
        
            
        
    //         if (empty($password)) {
    //             $errors[] = 'Password is required';
    //         } elseif ($password !== $confirmPassword) {
    //             $errors[] = 'Passwords do not match';
    //         }
        
    //         // If there are no errors, process the signup
    //         if (empty($errors)) {
           
          
    //             if ($conn->connect_error) {
    //                 die("Connection failed: " . $conn->connect_error);
    //             }
        
    //             // Prepare and bind the SQL statement
    //             // $stmt = $conn->prepare("INSERT INTO users (username, firstname,lastname, password) VALUES (?, ?, ?)");
    //             // $stmt = $conn->prepare("INSERT INTO users (username, firstname,lastname, password) VALUES ($username, $firstname,$lastname, $password)");


    //             $sql_stmt ="INSERT INTO users (username, firstname,lastname, password) VALUES ($username, $firstname,$lastname, $password)";
    //             // $stmt->bind_param( $username, $firstname,$lastname, $password);
        
    //             // Execute the statement
    //             // $stmt->execute();

    //             $execute= mysqli_query($conn, $sql_stmt);

        
    //             // Close the statement and the connection
    //             // $stmt->close();
    //             $conn->close();
    //             echo"<script>";
    //             echo"alert(\"Your sigup was successfull. Please now Login\");";
    //             echo"</script>";
    //             // Redirect to a success page
    //             // header('Location: login.php');
                
    //         }
    //     }
     
        
      
    // }
  
?>

<?php
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
     
      
        $usernames = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = md5($_POST['password']);
    
      
         $sql = "INSERT INTO users(firstname, lastname, username, password)
            VALUES ('$firstname', '$lastname',' $usernames','$password')";
         
         $qry = $conn -> query($sql);
         if($qry)
         {
            echo "Registration done successfully!";
           header('Location: login.php');

            // block of code to process further...
         }
         else
         {
            echo "Something went wrong while registration!<BR>";
            echo "Error Description: ", $conn -> error;
         }
      }
   
   $conn -> close();
?>


<!DOCTYPE html>
<html>
<head>
  <title>SIGNUP Form</title>
  <link rel="icon" href="../uploads/logo.png" />
  <link rel="stylesheet" type="text/css" href="signup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="../dist/css/adminlte.css">

<style>
body{
	background:linear-gradient(270deg,rgba(128, 0, 128, 0.623),rgba(135, 207, 235, 0.63)), url(../uploads/round.JPG);
  background-size:cover;
  padding: 100px;
}

.box{
	padding: 20px;
	border-radius: 10px;
}

.signuptitle{
  color: white;
  font: weight 800px;
  font: size 1.2em;
  text-align:center;
  margin-bottom: 20px;
}

</style>

</head>

<body >
  <div class="header">
    <h2 class="signuptitle">STOCK  MANAGEMENT  SYSTEM</h2>
  </div>


  
  <div class="container">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>signup Form</b></a>
    </div>

  <!-- <div class="container">
    <h3>signup Form</h3> -->
    <div class="card-body">
    <p class="login-box-msg">create an account first</p></div>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


<div class="box">

<form method="POST" action="">
       
       <div class="input-group mb-3">
       <label for="username">Username:</label>
         <input type="text" class="form-control" autofocus name="username" placeholder="Username">
         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-user"></span>
           </div>
         </div>
       </div>



       <!-- <label for="firstname">firstname:</label>
       <input type="firstname" name="firstname" id="firstname" required><br> -->

       <div class="input-group mb-3">
       <label for="firstname">firstname:</label>
         <input type="text" class="form-control" autofocus name="firstname" placeholder="firstname" id="firstname" required>
         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-user"></span>
           </div>
         </div>
       </div>

       


       <div class="input-group mb-3">
       <label for="lastname">lastname:</label>
       <input type="text" class="form-control" autofocus name="lastname" placeholder="lastname" id="lastname" required>
         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-user"></span>
           </div>
         </div>
       </div>


       <div class="input-group mb-3">
       <label for="password">Password:</label>
         <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-lock"></span>
           </div>
         </div>
       </div>

       <div class="input-group mb-3">
       <label for="confirm_password">Confirm Password:</label>
         <input type="password" class="form-control" name="password" placeholder="Password"id="confirm_password" required>
         <div class="input-group-append">
           <div class="input-group-text">
             <span class="fas fa-lock"></span>
           </div>
         </div>
       </div>


       <div class="row" style="display: flex; justify-content: center;">
       <div class="col-6">
           <input type="submit" class="btn btn-primary btn-block text-left" style="color: white; margin-right: 40px;" value="Signup">
       </div>

       <div class="col-6">
        <h6>already have an account? <a href="./login.php">login</a></h6>
       </div>

   </div>

</div>

    
  


    </form>
    

  
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>


































































<!-- <div class="login-box"> -->
  <!-- /.login-logo -->
  <!-- <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>man</b></a>
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
        </div> -->
        <!-- <div class="row">
          <div class="col-8">
          </div> -->
          <!-- /.col -->
        
          <!-- <div class="row">
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block text-left" style="color: white; margin-right: 40px;">LogIn</button>
          </div>
          <div class="col-6">
            <h1 style="font-size: 30px;">
              <a href="signup.php" class="btn btn-primary btn-block text-right" style="color: black; margin-left: 40px;">Sign up</a>
            </h1>
          </div>
        </div> -->



          <!-- /.col -->
        <!-- </div> -->
      <!-- </form> -->
      <!-- /.social-auth-links -->

      <!-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> -->
      
    <!-- </div> -->
    <!-- /.card-body -->
  <!-- </div> -->
  <!-- /.card -->
<!-- </div> -->



