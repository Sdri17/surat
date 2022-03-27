<?php 
session_start();
if (!isset($_SESSION["login"])){
    header("location: formlogin.php");
    exit;
}

  require "function.php";
     
if(isset($_POST['simpan'])) {
    if(tambah_keluar($_POST)>0){

    echo "<script> 
    document.location.href='tampilsuratkeluar.php';
    alert ('data berhasil ditambahkan');

 </script>";
 
    }

else{

     echo "<script> alert ('data gagal ditambahkan')</script>";

}
}     
 ?>



