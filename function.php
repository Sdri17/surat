<?php

// untk koneksi
$conn= mysqli_connect("localhost:3307","root","","surat");


// function query
function data($query){
    global $conn;
    $result=mysqli_query($conn, $query);
    $rows=[];
    while( $row=mysqli_fetch_assoc($result) ) {
        $rows[]= $row;
    }
    return $rows;
}


// daftar admin
function daftaradmin($data){
    global $conn;
    // menjadukan username hirufkecil semua
    $username = strtolower(stripslashes($data['username']));
    // untuk memasukkan password supaya semua karakter terbaca
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $role=$data['role'];
    $password2=mysqli_real_escape_string($conn,$data["password2"]);

    // cek username sudah ada atau belum
    $result=mysqli_query($conn,"SELECT username FROM admin WHERE username='$username'");
    if (mysqli_fetch_array($result) ){
         echo"<script> 
        alert('username sudah ada');
             </script>";

            
             return false;
    }



    // cek konfirmasi passwod
    if($password !== $password2){
        echo"<script>
        alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }
    
    // enkripsi password
    $password= password_hash($password,PASSWORD_DEFAULT);
//    tambahkan ke database
mysqli_query($conn,"INSERT into admin VALUES('','$username', '$password','$role')");
return mysqli_affected_rows($conn);

}




// insert suratmasuk
function tambah_masuk($data){
global $conn;

	$nomor=$data['nomor_surat'];
// upload file
// untuk membaca  asal lokasi dan nama file yang akan di upload
    // $lok_file=$_FILES['tsurat']['tmp_name']; 
    // $nama_file=$_FILES['tsurat']['name'];
    // untuk menentukan folder penyimpanan file
    // $folder_tampung="dokumen/surat masuk/$nama_file";
    // untuk memndakkan file
    // move_uploaded_file($lok_file, "$folder_tampung");

// upload file
    $file=upload_masuk();
    if(!$file){
        return false;
    }

    $tgl_kirim=date("Y-m-d : H:i:s");
    $pengirim=$data['pengirim'];
    $tujuan=$data['tujuan'];
    $perihal=$data['tperihal'];
    $komentar=$data['komentar'];

    mysqli_query( $conn,"INSERT into suratmasuk values('','$nomor','$file','$tgl_kirim','$pengirim','$tujuan','$perihal','$komentar')");
    return mysqli_affected_rows($conn);
}






// untuk funcrion dan validasi file
function upload_masuk(){
    $nama_file=$_FILES['file_surat']['name'];
    $ukuran_file=$_FILES['file_surat']['size'];
    $error=$_FILES['file_surat']['error'];
    $tmp_name=$_FILES['file_surat']['tmp_name'];
    
    // cek apakah gambar di upload atau tidak
    if ($error===4){
        echo "<script>  alert('Pilih Gambar Telebih Dahulu');</script>";
        return false;
    }
    
    // untuk membatasi jenis file yang di uplaud
    $ekstensifilevalid=['pdf','jpeg','png','jpg'];
    $ekstensi_file= explode('.', $nama_file);
    $ekstensi_file=strtolower(end($ekstensi_file));
    
    if(!in_array($ekstensi_file, $ekstensifilevalid)){
    echo "<script>  alert('Yang anda upload bukan file yang di izinkan');</script>";
    return false;
    }
    // cek ukuran file
    if($ukuran_file >5000000){
    echo "<script>  alert('ukuaran file terlalu besar');</script>";
    return false;
    }
    // generate nama file
    $namafilebaru= uniqid();
    $namafilebaru.='.';
    $namafilebaru.=$ekstensi_file;
    
    // memidahkan direktori file
    move_uploaded_file($tmp_name,'dokumen/surat masuk/'.$namafilebaru);
    return $namafilebaru;
        
    }


// edit surat masuk
function edit_masuk($data){
global $conn;
        $id=$data['id'];

        $nomor=$data['nomor_surat'];
// upload file
// untuk membaca  asal lokasi dan nama file yang akan di upload
    // $lok_file=$_FILES["file_surat"]['tmp_name']; 
    // $file_surat=$_FILES["file_surat"]['name'];
    // untuk menentukan folder penyimpanan file
    // $folder_tampung="dokumen/$file_surat";
    // untuk memndakkan file
    // move_uploaded_file($lok_file, "$folder_tampung");
    $file_surat=$data['file_surat'];
    $tgl_terima=date("Y-m-d : H:i:s");
    $pengirim=$data['pengirim'];
    $tujuan=$data['tujuan'];
    $perihal=$data['perihal'];
    $komentar=$data['komentar'];


     $update= "UPDATE suratmasuk set
     id='$id',
     nomor_surat='$nomor',
     file_surat='$file_surat',
     tgl_dikirim='$tgl_terima',
     pengirim='$pengirim',
     tujuan='$tujuan',
     perihal='$perihal',
     komentar='$komentar'
     WHERE id=$id";
    mysqli_query($conn,$update);

     return mysqli_affected_rows($conn);
    }
// hapus surat masuk
//    function hapus_masuk ($id){
//     global $conn;
//     mysqli_query($conn,"DELETE from suratmasuk WHERE id='$id'");
//      return mysqli_affected_rows($conn);
// }

  // hapus surat keluar
  function hapus_masuk ($id){
    global $conn;
    mysqli_query($conn,"DELETE from suratmasuk WHERE id='$id'");
     return mysqli_affected_rows($conn);
}








// simpan surat keluar
function tambah_keluar($data){
global $conn;

    $nomor=$data['nomor_surat'];
// upload file
    $file=upload_keluar();
    if(!$file){
        return false;
    }
    $tgl_terima=date("Y-m-d : H:i:s");
    $pengirim=$data['pengirim'];
    $tujuan=$data['tujuan'];
    $perihal=$data['perihal'];
    $komentar=$data['komentar'];

    $simpan=mysqli_query( $conn,"INSERT into suratkeluar values('','$nomor','$file','$tgl_terima','$pengirim','$tujuan','$perihal','$komentar')");
     // mysqli_query($conn,$simpan);

    return mysqli_affected_rows($conn);}


// untuk funcrion dan validasi file
function upload_keluar(){
$nama_file=$_FILES['file_surat']['name'];
$ukuran_file=$_FILES['file_surat']['size'];
$error=$_FILES['file_surat']['error'];
$tmp_name=$_FILES['file_surat']['tmp_name'];

// cek apakah gambar di upload atau tidak
if ($error===4){
    echo "<script>  alert('Pilih Gambar Telebih Dahulu');</script>";
    return false;
}

// untuk membatasi jenis file yang di uplaud
$ekstensifilevalid=['pdf','jpeg','png','jpg'];
$ekstensi_file= explode('.', $nama_file);
$ekstensi_file=strtolower(end($ekstensi_file));

if(!in_array($ekstensi_file, $ekstensifilevalid)){
echo "<script>  alert('Yang anda upload bukan file yang di izinkan');</script>";
return false;
}
// cek ukuran file
if($ukuran_file >5000000){
echo "<script>  alert('ukuaran file terlalu besar');</script>";
return false;
}
// generate nama file
$namafilebaru= uniqid();
$namafilebaru.='.';
$namafilebaru.=$ekstensi_file;

// memidahkan direktori file
move_uploaded_file($tmp_name,'dokumen/surat keluar/'.$namafilebaru);
return $namafilebaru;
    
}


// edit surat keluar
function edit_keluar($data){
    global $conn;
            $id=$data['id'];
            $nomor=$data['nomor_surat'];
            
    // upload file
    // untuk membaca  asal lokasi dan nama file yang akan di upload
        // $lok_file=$_FILES["file_surat"]['tmp_name']; 
        // $file_surat=$_FILES["file_surat"]['name'];
        // untuk menentukan folder penyimpanan file
        // $folder_tampung="dokumen/$file_surat";
        // untuk memndakkan file
        // move_uploaded_file($lok_file, "$folder_tampung");
        $file_surat=$data['file_surat'];
        $tgl_terima=date("Y-m-d : H:i:s");
        $pengirim=$data['pengirim'];
        $tujuan=$data['tujuan'];
        $perihal=$data['perihal'];
        $komentar=$data['komentar'];
        // $filelama=$data['namafilelama'];


        //    cek apakah user pilih file baru atau tidak
    // if($_FILES['file_surat'] ['error']===4){
    //     $file_surat=$filelama;

    // }else{
    //     $file_surat=upload();
    // }
   
    
    
         $update= "UPDATE suratkeluar set
         id='$id',
         nomor_surat='$nomor',
         file_surat='$file_surat',
         tgl_dikirim='$tgl_terima',
         pengirim='$pengirim',
         tujuan='$tujuan',
         perihal='$perihal',
         komentar='$komentar'
         WHERE id=$id";
        mysqli_query($conn,$update);
    
         return mysqli_affected_rows($conn);}
    


     // hapus surat keluar
    function hapus_keluar ($id){
    global $conn;
    mysqli_query($conn,"DELETE from suratkeluar WHERE id='$id'");
     return mysqli_affected_rows($conn);
}
?>