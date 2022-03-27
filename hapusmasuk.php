<?php
require"function.php";
$id=$_GET['id'];
if (hapus_masuk($id)>0){
	 echo "<script> 
 alert ('data berhasil di hapus');
 document.location.href='tampilsuratmasuk.php';
 </script>";
 
    }

else{

     echo "<script> alert ('data gagal di hapus')</script>";

}

?>