<?php
session_start();
if (!isset($_SESSION["login"])){
    header("location: formlogin.php");
    exit;
}

 require "function.php";
 $id=$_GET['id'];

$suratkeluar= data ("SELECT * From suratkeluar where id='$id'")[0];

     
if(isset($_POST['ubah'])) {
    if(edit_keluar($_POST)>0){

     echo "<script> 
 alert ('data berhasil di Update');
 document.location.href='tampilsuratkeluar.php';  

 </script>";
 
    }

else{

     echo "<script> alert ('data gagal di update')</script>";

}
}


 ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include"navbar.php";
    ?>

<div class="container">
       <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>

  <form method="post" class="bg-info mt-5" enctype="multipart/form-data action">
      <div class="pl-4 pr-4 ">
        <h2 class="text-uppercase pt-3 pb-5 text-center text-white">Edit Surat Keluar</h2>


         <input type="hidden" name="id" id="id" value="<?php echo $suratkeluar['id']?>">
         <!-- <input type="hidden" name="filelama" id="id" value="<?php echo $suratkeluar['file_surat']?>"> -->
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nomor Surat</label>
              <div class="col-9">
              <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required="required" value="<?= $suratkeluar['nomor_surat'];?>" readonly>
              </div>  
          </div>

          <div class="form-group row">
              <label class="col-sm-2 col-form-label">file surat</label>
            
              <div class="col-9">
                <input type="text" class="form-control" id="file_surat" name="file_surat" readonly value="<?= $suratkeluar['file_surat']?>">
              
            </div>
          </div>
       
          <div class="form-group row">
					   	<label class="col-sm-2 col-form-label">Pengirim</label>
					    <div class="col-9">

					    	<select  class="form-control" name="pengirim"> 
					    		<option>pajak</option>
					    		<option>keuangan</option>
					    		<option>SDM</option>
					    		<option>Akutansi</option>
					    	</select>
					   <!--  <input type="text" class="form-control" id="ttujuan" name="ttujuan" required="required"> -->
					    </div>
          </div>	
        
          
        
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
              <div class="col-9">
              <input type="text" class="form-control" id="tujuan" name="tujuan" required="required" value="<?= $suratkeluar['tujuan']?>" >
              </div>  
            </div>          
     


        
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Perihal</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="perihal" name="perihal" required="required" value="<?= $suratkeluar['perihal']?>">
              </div>
          </div>
          
            
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label" id="komentar" name="komentar">Komentar</label>
              <div class="col-sm-9">
             
              <input type="text" class="form-control" cols="60" rows="5" id="komentar" name="komentar" required="required" value="<?= $suratkeluar['komentar']?>"></input>
              </div>
          </div>

          <div class="modal-footer">
          <a href="tampilsuratkeluar.php" class="  btn bg-warning  text-white" type="reset">Kembali</a>
            <button type="Submit" class="btn btn-success" name="ubah">Update</button>
         </div>
          </div>                      
        </div>
      </div>
     </div>
    </form>

</div>


    
</body>
</html>
