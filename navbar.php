<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="" href="font\font-awesome\css\all.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="js/jquery-3.5.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <!-- <script src="js/dataTables.min.js"></script> -->
 <!-- <script src="js/dataTables.bootstrap4.min.js"></script> -->
 
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <style>
   .footer{
    height: 30px;
    width:100%;
    text-align: center;
    

   }
 </style>
	<title>Document</title>
</head>
<?php 
include"bg.php";
?>
<body>
	<nav class="navbar navbar-expand-md bg-dark fixed-top">
  <button class="navbar-toggler"data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fas fa-bars text-white"></span>
  </button> 
  <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
    <ul class="navbar-nav">
    <li type="button">
        <a href="#navbarDropdownMenuLink"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          Home
        </a>
        <div class="collapse" id="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Profil</a>
          <a class="dropdown-item" href="#">Visi & Misi</a>
          <a class="dropdown-item" href="#">Tentang</a>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="tampilsuratmasuk.php">Surat Masuk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="tampilsuratkeluar.php">Surat Keluar</a>
      </li>
     
      <li class="nav-item active">
      <a class="nav-link" href="daftaradmin.php">daftar admin</a>
      </li>
        <li class="nav-item active">
        <a class="nav-link" href="logout.php" onclick="return confirm('yakin ingin keluar')">Logout</a> 
      </li>

    </ul>
  </div>
</nav>
<div class=" footer  bg-dark text-white fixed-bottom">Horas Siadari 2022</div>





</body>
</html>



