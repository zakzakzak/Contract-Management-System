<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function hari_ini(){
	$hari = date ("D");
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
		case 'Mon':
			$hari_ini = "Senin";
		break;
		case 'Tue':
			$hari_ini = "Selasa";
		break;
		case 'Wed':
			$hari_ini = "Rabu";
		break;
		case 'Thu':
			$hari_ini = "Kamis";
		break;
		case 'Fri':
			$hari_ini = "Jumat";
		break;
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		default:
			$hari_ini = "Tidak di ketahui";
		break;
	}
	return "<b>" . $hari_ini . "</b>";
}

$total = 0;
foreach ($result as $a)
{
	$total=$total+$a->nilai_po;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BERITA ACARA</title>
<style type="text/css">
/* style sheet for "A4" printing */
								 @media print and (width: 21cm) and (height: 29.7cm) {
											@page {
												 margin: 3cm;
											}
								 }
								 /* style sheet for "letter" printing */
								 @media print and (width: 8.5in) and (height: 11in) {
										 @page {
												 margin: 1in;
										 }
								 }
								 /* A4 Landscape*/
								 @page {
										 size: A4 potrait;
										 margin: 5%;
								 }
/* Table */
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
			border-color: 1px solid #e1edff;
		}
		.demo-table {
			border-collapse: collapse;
			font-size: 13px;
		}
		.demo-table th,
		.demo-table td {
			border-bottom: 1px solid #e1edff;
			border-left: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.demo-table th,
		.demo-table td:last-child {
			border-right: 1px solid #e1edff;
		}
		.demo-table td:first-child {
			border-top: 1px solid #e1edff;
		}
		.demo-table td:last-child{
			border-bottom: 0;
		}
		caption {
			caption-side: top;
			margin-bottom: 10px;
		}
		/* Table Header */
		.demo-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}
		/* Table Body */
		.demo-table tbody td {
			color: #353535;
		}
		.demo-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.demo-table tbody tr:hover th,
		.demo-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
			transition: all .2s;
		}
		#nomor {
			font-size:20px;
		}
</style>
<script>
window.print();
</script>
</head>
<body>
<br>
<br>
<table width="100%" border="0">
  <tr>
		<td width="73%" style="font-size:12px;text-align:center;line-height: 18px;">
    	  <p style="font-size:12px;text-align:left;line-height: 18px;margin:1px;">
          Pada hari ini <?php date_default_timezone_set('Asia/Jakarta');
					$tanggal = date('Y-m-d'); echo hari_ini(); ?> tanggal <b><?php echo tgl_indo(date('Y-m-d')); ?></b> telah dilakukan pemindahbukuan dari Rekening DANA KELOLAAN ke Rekening DANA OPERASIONAL sebesar <b><?= "Rp.".number_format($total).",-" ?></b> dengan rincian sebagai berikut :
				</p>
  </tr>
</table>
<br>
<table width="100%" rules="all" border="1">
  <thead style="font-size:12px;font-weight: bold;text-align:center">
    <th width="5%" height="44">NO</th>
    <th width="35%">NAMA</th>
    <th width="15%">NO LAB</th>
    <th width="15%">NO SERTIFIKAT</th>
    <th width="15%">TGL SERTIFIKAT</th>
    <th width="15%">JUMLAH</th>
  </thead>
  <tbody>
		<?php $no=1; $total = 0; foreach ($result as $a) { ?>
			<tr style="font-size:12px;">
	      <td height="44" style="text-align:center"><?php echo $no; ?></td>
	      <td style="padding-left:10px;padding-right:5px;"><?php echo $a->nama_po;?></td>
	      <td style="text-align:center"><?php echo $a->no_lab;?></td>
	      <td style="text-align:center"><?php echo $a->no_sertifikat;?></td>
	      <td style="text-align:center"><?php echo $a->tgl_sertifikat;?></td>
	      <td style="text-align:center"><?= "Rp.".number_format($a->nilai_po).",-" ?></td>
	    </tr>
		<?php $no=$no+1; $total=$total+$a->nilai_po; } ?>
    <tr style="font-size:12px;">
      <td height="30" style="text-align:center" colspan="5"><b>JUMLAH&nbsp;&nbsp;&nbsp;</b></td>
      <td style="text-align:center"><b><?= "Rp.".number_format($total).",-" ?></b></td>
    </tr>
  </tbody>
</table>
<br>
<table width="100%">
  <tbody>
			<tr style="font-size:12px;">
				<td width="5%"></td>
		    <td width="35%" style="text-align:center">
					Mengetahui : <br>
					Kepala Sub Bagian KEUANGAN <br>
					<br>
					<br>
					<br>
					<br>
					Endang Sobari, S.E. <br>
					NIP. 196411231989031001
				</td>
		    <td width="15%"></td>
		    <td width="15%"></td>
		    <td width="30%" colspan="2" style="text-align:center">
					Bandung, <?php echo tgl_indo(date('Y-m-d')); ?><br>
					Bendahara Penerimaan, <br>
					<br>
					<br>
					<br>
					<br>
					Utami <br>
					NIP. 196203251985032002
				</td>
	    </tr>
  </tbody>
</table>
<br />
</body>
</html>
