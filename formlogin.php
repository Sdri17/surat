<?php
session_start();
if(isset($_SESSION["login"])){
   header("location: index");
   exit;
}



require"koneksi.php";
if(isset($_POST["login"])){

$username= $_POST["username"];
$password= $_POST["password"]; 

$result=mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' ");

// cek username
if(mysqli_num_rows($result)===1){

   // cek passsword

   $row= mysqli_fetch_assoc($result);
    if(password_verify($password,$row["password"])){

// set session
$_SESSION["login"]= true;

       header("location: index.php");
      
       exit;

    }

}
$error = true;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            margin-top: 150px;

        }
     </style>
    <title>Document</title>
</head>
<body class="h-100 bg-info d-flex align-items-center">
     <div class="container">
       <div class="row">
         <div class="col-sm-6 col-md-4 mx-auto bg-light p-4">
            <h3 class="text-center text-info pb-3 mb-3 border-bottom">Login Website</h3>
            <form method="post">
               <input class="form-control form-control-lg mb-3" type="text" placeholder="Username" name="username">
               <input class="form-control form-control-lg mb-3" type="password" placeholder="Password" name="password">
               <input class="btn btn-info btn-lg btn-block" type="submit" name="login" value="Login">
            </form>
         </div>
       </div>
     </div>
   </body>
</html>
