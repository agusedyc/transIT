<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php $title; ?></title>

</head>
<body>
<?php 

$bln = array('Januari', 'Febuari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September', 'Oktober','November','Desember');
?>
<div class="title">
	<h3>LAPORAN JURNAL MAHASISWA</h3>
	<h3>TRANS IT</h3>
	<h4>Tanggal <?php echo date('d',strtotime($date_from)).'-'.$bln[date('j',strtotime($date_from))+1].'-'.date('Y',strtotime($date_from)).' s/d '.date('d',strtotime($date_to)).'-'.$bln[date('j',strtotime($date_to))+1].'-'.date('Y',strtotime($date_to)); ?></h4>
</div>
<div class="logo">
	<img id="logo" src="<?= $logo ?>">
</div>

	<div id="container">    
	<table width="100%">
		<tr align="center">
			<th style="width:2%; text-align: center;"> No </th>
			<th style="width:10%;"> Nama </th>
			<th style="width:45%;"> Judul </th>
			<th style="width:25%;"> Pembimbing</th>
			
			<th style="width:10%;"> Upload </th>
			
		</tr>

		<?php $no=0; foreach ($report as $row): $no++; ?>
		<tr>
			<td style="width:2%; text-align: center;" rowspan="2"> <?php echo $no; ?> </td>
			
			<td style="width:10%;"> <?php echo $row->user->profile->name; ?> </td>
			<td style="width:45%;" rowspan="2"> <?php echo $row->judul; ?> </td>
			<td style="width:25%;"> <?php echo ' 1. '.$row->pembimbingOne->pembimbing; ?></td>
			
			<td style="width:10%; text-align: center;"> <?php echo $row->upload_ke; ?> </td>
			
		</tr>
		<tr>
			<td > <?php echo (isset($row->user->profile->nim)) ? $row->user->profile->nim : $row->user->username; ?> </td>
			<td><?php echo (isset($row->pembimbing_2)) ? ' 2. '.$row->pembimbingTwo->pembimbing : null; ?></td>
			<td style=" text-align: center;">
				<?= date('d-m-Y',strtotime($row->tgl_upload)) ?>
			</td>
		</tr>
		<!--  style="width:35%; text-align: left;" -->
			<?php endforeach; ?>

			<!-- Bagisn Tandatangan -->
		<tr id='white'>
		    <td id='white'></td>
		    <td id='white'></td>
		    <td id='white' rowspan="2"></td>
		    <td id='white' rowspan="2" colspan="2" align="center"> <br><br><br>
		    	<p>
						Semarang, <?php echo date("d-m-Y"); ?>
					</p>
					<br><br><br><br>
					<p>
						( ___________________________ )
					</p><br><br>
		    </td>
		</tr>
		<tr id='white'>
			<td id='white' colspan="2" valign="bottom">
				<p>
					Dicetak Oleh: <?php //echo ucfirst($user); echo ' ,Tgl '; echo date("d-m-Y"); ?>
				</p>
				<br><br>
			</td>
		</tr>
	</table>
	</div>

</body>

<style type="text/css">

	#container{
		position: absolute;
		top: 180px;
		width: 97%;
	}

	table#col{
		/*position: absolute;*/

	vertical-align: middle;
	text-align: left;
	/* border-width: 1px; */
	/* border-style: stroke: olid; */
	width: 100%;
	font-size: 13px;
	}

	table {
	  border-collapse: collapse;
	}

	#col{
	border-collapse: collapse;
	margin-bottom: 20px;
	border-width: 1px;
	border-style: solid;
	}
 

	tr, th, td{
		/*text-align: center;*/
		border-width:1px;
		border-style: solid;
		/*vertical-align: center;*/
	}

	#white{
		/*text-align: center;*/
		border-width:0px;
		/* border-style: solid; */
		/*vertical-align: center;*/
	}

	td{
		padding: 1px;
	}



	h3, h4{
		margin: 1px;
	}

	#ttd{
		position: absolute;
		top: 300px;
		left: 800px;
		
	}

	.title{
		text-align: center;
		padding-top: 50px;
	}
	.logo{
	    /*width:700px; */
	    padding-top:-100px;
	    left:240px;
	    position: absolute;
	    /*display:block; */
	    z-index:1 !important; 
	    /*margin:15px auto; */
	    
	}
	#logo{
		width: 120px;
	    height: 120px;
	}

	/*#watermark{		
	    width: 500px;
	    top:130px;
	    left:240px;
	    display:block;
	    position: absolute;
	    z-index:-1 !important;
	    opacity: 0.5;
	}*/

</style>
</html>