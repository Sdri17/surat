<?php
session_start();
if (!isset($_SESSION["login"])){
    header("location: formlogin.php");
    exit;

}
include"navbar.php";
?>
<html>
	<head>
	<title>index</title>
	<style type="text/css">
		/* .slide{
			width: 800px;
			height: 400px; */
			/* margin-left: 400px;
			margin-top: -300px;

		} */
		.slideshow{
			align-content: center;
			width: 600px;
			height:400px;
			/* margin-left: 10px;
			margin-top: 0; */
			/* border: 5px solid green; */
			/* box-shadow: 0 0 5px #888; */
			overflow: hidden;
			
		}
		.slideshow ul{
			padding: 0;
			margin: 0px;
			width: 600px;
		}
		.slideshow li{	
			width: 600px;
			list-style: none;
			float: left;
		}
		.slideshow img{
			width: 600px;
			height: 400px;
			/* margin-top: -100px; */
			/* margin-left: -40px;  */
		}
		h2{
			text-align: center;
		}
		/* .jam{
			margin-top:100px ;
		
			font-size: 10x;
		} */
		.kalender{
			margin-top: 70px;
			margin-left: 30px;
			
		}
	</style>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				var pertama=$('.slideshow li:first').html();
				$('.slideshow ul').append('<li>'+pertama+'</li>');
				$('.slideshow li:first').animate({'margin-left': '-600px'},2000,function(){
					$(this).remove();
				});
			},4000);
		});
	</script>
	</head>
	<body>
	<p>&nbsp;</p>
    <p>&nbsp;</p>
	<h2 class="text-white mb-2"> Selamat Datang</h2>
    <p>&nbsp;</p>
	
	<div class=" row">
		
		<div class=" col col-md-3 kalender">
				<div class="col col-md jam text-center">
				<script type="text/javascript">
				window.onload = function() { jam(); }

				function jam() {
				var e = document.getElementById('jam'),
				d = new Date(), h, m, s;
				h = d.getHours();
				m = set(d.getMinutes());
				s = set(d.getSeconds());

				e.innerHTML = h +':'+ m +':'+ s;

				setTimeout('jam()', 1000);
				}

				function set(e) {
				e = e < 10 ? '0'+ e : e;
				return e;
				}
				</script>
				
				<h2 id="jam"></h2>
				</div>
				<table class=" bg-light" width="300"  cellpadding="0" cellspacing="0">
					<tr>
					<td><?php
					//bulan sekarang
					$month=date("m");
					//Tahun sekarang
					$year=date("Y");
					//hari ini
					$day=date("d");
					//cek jumlah hari tahun sekarang
					$endDate=date("t",mktime(0,0,0,$month,$day,$year));
					//style untuk table
					echo '
					<style>
					td {
					font-size:11;
					font-family:Times New Roman;
					}
					</style>
					';
					//table untuk menulis tanggal sekarang
					echo '<table align="center" border="0" width="100%" cellpadding=2 cellspacing=1 style=""><tr><td align=center>';
					echo date("D, d M Y ",mktime(0,0,0,$month,$day,$year));
					echo '</td></tr></table>';
					//table untuk menulis hari
					echo '
					<table align="center" border="0" width="300" cellpadding=2 cellspacing=1 style="border:1px solid #CCCCCC">
					<tr bgcolor="lightgreen">
					<td align=center><font color=red> Sun </font></td>
					<td align=center> Mon </td>
					<td align=center> Tue </td>
					<td align=center> Wed </td>
					<td align=center> Thu </td>
					<td align=center> Fri </td>
					<td align=center><font color=green> Sat </font></td></tr>';
					/*
					mengecek tanggal 1 bulan sekarang ada pada hari ke berapa
					kemudian tambahkan cell td sebanyak var $s
					*/
					$s=date ("w", mktime (0,0,0,$month,1,$year));
					for ($ds=1;$ds<=$s;$ds++) {
					echo "<td style=\"font-family:arial;color\" width=\"15%\" align=center valign=middle bgcolor=\"#FFFF99\">
					</td>";
					}
					for ($d=1;$d<=$endDate;$d++) {
					//emulai penulisan tanggal
					if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
					//jika nilai $d (tanggal) adalah hari minggu (0) dibuat baris baru <tr>
					//default warna huruf
					$fontColor="#000000";
					if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }
					//jika tanggal adalah hari minggu warna huruf merah
					if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sat") { $fontColor="green"; }
					//jika tanggal adalah hari sabtu warna huruf biru
					if (date("d",mktime (0,0,0,$month,$d,$year)) == $day) { $fontColor="blue"; }
					//jika tanggal adalah hari ini maka huruf tebal

					//menulis tanggal
					echo "<td style=\"font-family:arial;color:#333333\" width=\"15%\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>";
					//jika tanggal adalah hari sabtu (6) akhiri baris </tr>
					if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }
					}
					//akhir table
					echo '</table>';
					?>
					</td>
					</tr>
				</table>
			</div>
			

			<div class="slideshow">
				<ul class="container-fluid">
					<li><img class="col-md" src="aset/bg1.jpg"></li>
					<li><img class="col-md"  src="aset/bg2.jpg"></li>
					<li><img class="col-md"  src="aset/bg3.jpg"></li>
					<li><img class="col-md"  src="aset/bg4.jpg"></li>
				</ul>
			</div>
			
		</div>
			
			

	</div>
		
</body>
</html>