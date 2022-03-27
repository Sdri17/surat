<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.4">
 <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.min.css">

  <title> Data Surat Keluar</title>
</head>

<body>
  <?php 
  session_start();
  if (!isset($_SESSION["login"])){
      header("location: formlogin.php");
      exit;
  }
  
require"navbar.php";
  include"koneksi.php";
?>  
  <form name="form1" method="">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
        <div class="container">
        
          <table  class=" table table-bordered bg-light" id="tabel">

            <thead>

              <tr align="center">
                <td colspan="9"><h2>DATA SURAT KELUAR</h2></td></tr>
            <tr><td colspan="9"><a href="formsuratkeluar.php" class="btn btn-info"><i class="far fa-plus">Tambah Data</a></i></td> </tr>
              <tr align="center" class="table-border">
                <td >No</td>
                <td>Nomor Surat</td>
                <td>File Surat</td>
                <td>Tangal Dikirim</td>
                <td>Pegirim</td>
                <td>Tujuan</td>
                <td>Perihal</td>
                <td>Komentar</td>
                <td>Tindakan</td>
              </tr>
            </thead>
            <!-- kode program untuk mengambil data -->
            <?php

            
              $no=1;
             
              $query=mysqli_query($conn,"SELECT * FROM suratkeluar order by id desc");
              $result=array(); //result dijadikan jadi array
              while ($data=mysqli_fetch_array ($query)){

              $result[]=$data; //resul yang sudah di arry di foreach
             
              }
              foreach ($result as $value) {
                 ?>
       

            <tbody>
              <tr align="center">
                <td><?php echo $no++ ?></td>
                <td><?php echo $value ['nomor_surat'];?> </td>
                <td><?php echo $value ['file_surat'];?> </td>
                <td><?php echo $value ['tgl_dikirim'];?> </td>
                <td><?php echo $value ['pengirim'];?> </td>
                <td><?php echo $value ['tujuan'];?> </td>
                <td><?php echo $value ['perihal'];?> </td>
                <td><?php echo $value ['komentar'];?> </td>
                <td align="center" valign="middle" class="d-flex">
        
                    
                  <a href="editkeluar.php ?id=<?=$value['id']?>" class="btn bg-success text-white" target="_blank" name="ubah"> 
                  <i class="fas fa-edit" data-toggle="tooltip" title="Edit"></i></a> 
                 

                  <a href="hapuskeluar.php ?id=<?=$value['id']?>" class="btn bg-danger text-white" data-toggle="tooltip" data-html="true" title="Hapus" name="hapus"><i class="fas fa-trash-alt"></i></a>

                  <a href="dokumen/surat keluar/<?php echo $value ['file_surat']; ?>" class="btn bg-info  text-white" data-toggle="tooltip" data-html="true" title="Buka Surat" target="_blank"><i class="fa fa-eye"></i>
                   </a>

                   <!-- <a href="dokumen/surat masuk/<?php echo $value ['file_surat']; ?>" class="btn bg-info  text-white" data-toggle="tooltip" data-html="true" title="Buka Surat" target="_blank"><i class="fa fa-eye"></i>
                   </a> -->
                     
                  </td>   
              </tr>
              <!-- akhir kode -->
             <?php } ?>
            </tbody>  






  <script>
      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })
       $(document).ready(function() {
    $('#tabel').DataTable();
  } );
    </script>




</body>
</html>







