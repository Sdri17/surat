<?php
session_start();
if (!isset($_SESSION["login"])){
    header("location: formlogin.php");
    exit;
}

require"navbar.php";
require"function.php";

if ( isset($_POST["simpan"])){

    if(daftaradmin($_POST)>0){
        echo "<script> alert('admin baru berhasil ditambahkan');
        </script>";

    }else{
        echo "<script> alert('admin baru gagal ditambahkan');
        document.location.href='daftaradmin.php';
        </script>";
       
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
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
            <h3 class="text-center text-info pb-3 mb-3 border-bottom">Daftar Admin</h3>
            <form method="post" action="">
               <input class="form-control form-control-lg mb-3" type="text" placeholder="Username" name="username" required autocomplete="off">
               <input class="form-control form-control-lg mb-3" type="password" placeholder="Password" name="password">
               <input class="form-control form-control-lg mb-3" type="password" placeholder="Konfirmasi Password" name="password2" required>
               <div class="form-group">
               <select  class=" custom- select form-control form-control is-invalid" name="role" require>
                   <!-- <option select disable value="required"> Pilih</option>  -->
					<option>pajak</option>
					<option>keuangan</option>
					<option>SDM</option>
					<option>Akutansi</option>
				</select>
                <div class="invalid-feedback text-danger">* Pilih Departemen Anda</div>
              </div>

              <!-- <select class="custom-select" id="validationCustom04" required>
        <option selected disabled value="">Choose...</option>
        <option>Pajak</option>
        <option>akutansi</option>
      </select> -->
               <input class="btn btn-info btn-lg btn-block" type="submit" name="simpan" value="Daftar">
            </form>
         </div>
       </div>
     </div>
   </body>
</html>