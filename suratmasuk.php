<?php
session_start();
if (!isset($_SESSION["login"])){
    header("location: formlogin.php");
    exit;
}

  require "function.php";
     
if(isset($_POST['simpan'])) {
    if(tambah_masuk($_POST)>0){

     echo "<script> 
 alert ('data berhasil ditambahkan');
 document.location.href='tampilsuratmasuk.php';

 </script>";
 
    }

else{

     echo "<script> alert ('data gagal ditambahkan');
     document.location.href='formsuratmasuk.php';
     </script>";
     

}
}


 
     
 ?>
<!-- <meta http-equiv="refresh" content="0,formsuratmasuk.php">; -->