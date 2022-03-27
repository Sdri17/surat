 <?php
 session_start();
 if (!isset($_SESSION["login"])){
     header("location: formlogin.php");
     exit;
 }
 
 require "function.php";
 $id=$_GET['id'];

$suratmasuk= data ("SELECT * From suratmasuk where id='$id'")[0];

     
if(isset($_POST['ubah'])) {
    if(edit_masuk($_POST)>0){

     echo "<script> 
 alert ('data berhasil di Update');
document.location.href='tampilsuratmasuk.php';
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
        <h2 class="text-uppercase pt-3 pb-5 text-center text-white">Edit Surat Masuk</h2>


         <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']?>">
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">Nomor Surat</label>
              <div class="col-9">
              <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required="required" value="<?= $suratmasuk['nomor_surat'];?>" readonly>
              </div>  
          </div>

          <div class="form-group row">
              <label class="col-sm-2 col-form-label">file surat</label>
              <div class="col-9">
                <input type="text" class="form-control" id="file_surat" name="file_surat" required value="<?php echo $suratmasuk["file_surat"];?>"readonly="readonly">
              
            </div>
          </div>


         
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Pengirim</label>
              <div class="col-9">
              <input type="text" class="form-control" id="pengirim" name="pengirim" required="required" value="<?= $suratmasuk['pengirim']?>" >
              </div>  
            </div>
        
          
        
            <div class="form-group row">
					   	<label class="col-sm-2 col-form-label">Tujuan</label>
					    <div class="col-9">

					    		<select  class="form-control" name="tujuan"> 
					    			<option>pajak</option>
					    			<option>keuangan</option>
					    			<option>SDM</option>
					    			<option>Akutansi</option>
					    		</select>	
				   		</div>
				   	</div>	         
     


        
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Perihal</label>
              <div class="col-sm-9">
              <input type="text" class="form-control" id="perihal" name="perihal" required="required" value="<?= $suratmasuk['perihal']?>">
              </div>
          </div>
          
            
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label" id="komentar" name="komentar">Komentar</label>
              <div class="col-sm-9">
             
              <input type="text" class="form-control" cols="60" rows="5" id="komentar" name="komentar" required="required" value="<?= $suratmasuk['komentar']?>"></input>
              </div>
          </div>

          <div class="modal-footer">
          <a href="tampilsuratmasuk.php" class="  btn bg-warning  text-white" type="reset">Kembali</a>
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
