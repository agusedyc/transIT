<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php $title; ?></title>
<?php 
// date_default_timezone_set('Asia/Jakarta');
// $dte = date();
// $tgl = substr($min,5,2);
// $bln = substr($min,8,2);
// $thn = substr($min,0,4);
// print_r($dte);

 ?>
</head>
<body>
<div id="page1">
<div id="watermark">    
    <img id="logo" src="assets/img/usm.jpg">
</div>
<div id="container">    
<br>
<table align="center" cellspacing="1px" style=" text-align: center; font-size: 19px; ">
<tr>
	<td valign="bottom">TANDA TERIMA PENYERAHAN</td>
</tr>
<tr>
	<td valign="top">JURNAL MAHASISWA</td>
</tr>
</table>
<br><br><br>
<table border="" align="center" cellspacing="1px" style="width: 87%; text-align: center; font-size: 15px">
<?php foreach ($mhs as $row): ?>
	<tr>
		<td style="width:19%; text-align: left;" >Nama</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;"><?php echo $row['nama']; ?></td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;">NIM</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;"><?php echo $row['nim']; ?></td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;">Judul Jurnal</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;" colspan="2"><?php echo $row['judul']; ?></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;" rowspan="2">Pembimbing</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;">1. <?php echo $row['pemb1']; ?></td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;">2. <?php 
		if($row['pembimbing_2'] == ''){
			echo ' - ';
		}else{
			echo $row['pembimbing'];
		}
		 ?></td>
		 <td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;">Kelengkapan Jurnal</td>
		<td style="width:1%;">:</td>
		<td style="width:45%; text-align: left;"> Jurnal dan CD</td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
<?php endforeach; ?>

	<tr>
		<td ></td>
		<td></td>
		<?php  ?>
		<td style="width:40%; text-align: left;" colspan="1" ></td>
		<td style="width:35%; height:50px; text-align: center;" valign="bottom">Semarang, <?php echo date("d-m-Y"); ?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		
		<td colspan="1" align="center"></td>
		<td style="width:35%; height:20px; text-align: center;" valign="bottom">Kordinator Jurnal Trans-IT</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		
		<td colspan="1" align="center"></td>
		<td style="width:35%; height: 70px; text-align: center; " valign="bottom">( ___________________________ )</td>
	</tr>
	<tr>
		<td>Upload Ke: <?php echo $row['upload_ke'];echo ' / '; echo $row['tgl_upload']; ?></td>
		<td></td>
		<td colspan="1" align="center"></td>
		<td style="width:35%; text-align: center;"><br>NIS : .............................................. </td>
	</tr>
</table>
</div>
</div>

<div id="potong" align="center">
	<p>--------------------------------------------------------------------------* - Potong Disini - *----------------------------------------------------------------------</p>
</div>


<div id="page2">
<div id="watermark2">    
    <img id="logo" src="assets/img/usm.jpg">
</div>
<div id="container">    
<br>
<table align="center" cellspacing="1px" style=" text-align: center; font-size: 19px; ">
<tr>
	<td valign="bottom">TANDA TERIMA PENYERAHAN</td>
</tr>
<tr>
	<td valign="top">JURNAL MAHASISWA</td>
</tr>
</table>
<br><br><br>
<table border="" align="center" cellspacing="1px" style="width: 87%; text-align: center; font-size: 15px">
<?php foreach ($mhs as $row): ?>
	<tr>
		<td style="width:19%; text-align: left;" >Nama</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;"><?php echo $row['nama']; ?></td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;">NIM</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;"><?php echo $row['nim']; ?></td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;">Judul Jurnal</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;" colspan="2"><?php echo $row['judul']; ?></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;" rowspan="2">Pembimbing</td>
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;">1. <?php echo $row['pemb1']; ?></td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		
		<td style="width:1%">:</td>
		<td style="width:45%; text-align: left;">2. <?php 
		if($row['pembimbing_2'] == ''){
			echo ' - ';
		}else{
			echo $row['pembimbing'];
		}
		 ?></td>
		 <td style="width:35%; text-align: left;"></td>
	</tr>
	<tr>
		<td style="width:19%; text-align: left;">Kelengkapan Jurnal</td>
		<td style="width:1%;">:</td>
		<td style="width:45%; text-align: left;"> Jurnal dan CD</td>
		<td style="width:35%; text-align: left;"></td>
	</tr>
<?php endforeach; ?>

	<tr>
		<td ></td>
		<td></td>
		<?php date_default_timezone_set('Asia/Jakarta'); ?>
		<td style="width:40%; text-align: left;" colspan="1" ></td>
		<td style="width:35%; height:50px; text-align: center;" valign="bottom">Semarang, <?php echo date("d-m-Y"); ?></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		
		<td colspan="1" align="center"></td>
		<td style="width:35%; height:20px; text-align: center;" valign="bottom">Kordinator Jurnal Trans-IT</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		
		<td colspan="1" align="center"></td>
		<td style="width:35%; height: 70px; text-align: center; " valign="bottom">( ___________________________ )</td>
	</tr>
		<tr>
		<td>Upload Ke: <?php echo $row['upload_ke'];echo ' / '; echo $row['tgl_upload']; ?></td>
		<td></td>
		<td colspan="1" align="center"></td>
		<td style="width:35%; text-align: center;"><br>NIS : .............................................. </td>
	</tr>
</table>
</div>
</div>

</body>
<style type="text/css">

	table {
		font-size: 17px;
	}

	#container{
	    /*width:700px; */
	    position: relative;
	    display:block; 
	    z-index:0 !important; 
	    margin:15px auto; 
	}

	#watermark{
	    top:130px;
	    left:300px;
	    display:block;
	    position: absolute;
	    z-index:-1 !important;
	    opacity: 0.5;
	}

	#watermark2{
	    top:640px;
	    left:300px;
	    display:block;
	    position: absolute;
	    z-index:-1 !important;
	    opacity: 0.5;
	}
	img#logo{
		width: 150px; /* image size */
	    height: 150px;
	}

	}
	#page2{
		margin-top: 30px;
	}

	#potong{
		padding-top: 10px;
	}
</style>
</html>