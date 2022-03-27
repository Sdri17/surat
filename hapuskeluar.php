<?php
require"function.php";
$id=$_GET['id'];
if (hapus_keluar($id)>0){
	 echo "<script> 
 alert ('data berhasil di  hapus');
 document.location.href='tampilsuratkeluar.php';
 </script>";
 
    }

else{

     echo "<script> alert ('data gagal di hapus')</script>";

}

?>