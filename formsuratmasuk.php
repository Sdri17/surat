<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style type="text/css">
		label{
			font-style: bold;
			font-weight: 700;
		}
		.container{
			width: 850px;
			height: 200px;
		}
	</style>
	<title>form surat masuk</title>
	


</head>
<body>
	<?php
	include"navbar.php"; 
	session_start();
	if (!isset($_SESSION["login"])){
	
		header("location: formlogin.php");
		exit;
	}
	

?>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
	<div class="container">

		<!-- awal formulir -->
		<form method="post" action="suratmasuk.php" class="bg-dark text-white mt-5" enctype="multipart/form-data">
			<div class="pl-4 pr-4 ">
				<h2 class="text-uppercase pt-3 pb-5 text-center"> penginputan surat masuk</h2>

				 
					<div class="form-group row">
					   	<label class="col-sm-2 col-form-label">Nomor Surat</label>
					    <div class="col-9">
					    <input type="text" class="form-control" id="tnosurat" name="nomor_surat" required="required" autocomplete="off">
					    </div>	
					</div>

					<div class="form-group row">
				   		<label class="col-sm-2 col-form-label">file surat</label>
				    	<div class="col-9">
				      	<input type="file" class="form-control is-invalid" id="tsurat" name="file_surat">
				      	<div class="invalid-feedback text-warning">*upload file pdf, jpeg, jpg, png <br>*Maksimal ukuran file 5 MB</div>
						</div> 
					</div>


					<div class="form-group row">
					   	<label class="col-sm-2 col-form-label">Pengirim</label>
					    <div class="col-9">
						<input type="text" class=" form-control" name="pengirim" required></input>
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
				    	<input type="text" class="form-control" id="tperihal" name="tperihal" required="required">
				   		</div>
					</div>



					
						
					<div class="form-group row ">
				    	<label for="inputEmail3" class="col-sm-2 col-form-label ">Komentar</label></label>
				  		<div class="col-sm-9">
						  <textarea  class="form-control" cols="60" rows="5" id="tkomentar" name="komentar" required="required"></textarea>
				    	</div>
					</div>
			

				<div class=" row justify-content-center mt-5 pb-3">
					<div class="row">
						<div class="col">
							<button class=" bg-success btn text-white " type="submit" name="simpan">Simpan</button>					
							<button class=" bg-warning btn text-white" type="reset">Batal</button>
							<a href="tampilsuratmasuk.php" class="btn bg-info  text-white" type="reset">Kembali</a>
						</div>
					</div>											
				</div>
			</div>
		 </div>
		</form>
<!-- akhir formulir -->	
	</div>

<!-- 	<script src="js/jquery-3.5.1.slim.min.js"></script>
     <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script> -->
	
</body>
</html>
					
			


