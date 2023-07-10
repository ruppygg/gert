<?php 
    $conn =new mysqli("127.0.0.1", "root", "", "sms_db");

    if ($conn->connect_error){
        print("check database connection");
    } else{
        $username=$_POST['username'];
        $pass = $_POST['password'];
        $sql_stmt= "insert into login (username, password) values ('$username', '$pass')";
        $execute= mysqli_query($conn, $sql_stmt);
        //print("$pass");
       // print("$username");
        echo"<script>";
            echo"alert(\"Your sigup was successfull. Please now Login\");";
            echo "document.location=\http://localhost/sms/admin/login.php\";";

            header("location: http://localhost/sms/admin/login.php");
            exit();
    }
    
    
    ?>
 