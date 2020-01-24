<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KWITANSI <?php echo $result->no_po;?></title>
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
		#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 4px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<script>
window.print();
</script>
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td width="5%" rowspan="3" style="font-size:9px;font-weight: bold;text-align:center;line-height: -10px;"><img src="<?php echo base_url();?>assets/esdm.png" width="60" height="50" align="middle"/><br/></td>
    <td width="73%" style="font-size:12px;text-align:center;line-height: 18px;">
        <p style="font-size:12px;text-align:left;line-height: 18px;margin:1px;">
          <b>
          &nbsp;KEMENTERIAN ENERGI DAN SUMBER DAYA MINERAL REPUBLIK INDONESIA <br>
          &nbsp;BADAN LITBANG ENERGI DAN SUMBER DAYA MINERAL <br>
          &nbsp;PUSLITBANG TEKNOLOGI MINERAL DAN BATUBARA
        </b>
        </p>
    <td width="8%" style="font-size:28px;text-align:center;line-height: 25px;">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
  <td style="font-size:16px; text-align:center;margin:0;line-height: 30px;"><br />
    <strong> <u>K U I T A N S I</u></strong>
  </td>
  </tr>
</table>
<table width="100%">
  <tbody>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Sudah terima dari</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<?php echo $result->nama_po;?></td>
    </tr>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Uang sejumlah</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<strong><?php echo ucfirst($terbilang)." rupiah"; ?></strong></td>
    </tr>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Untuk pembayaran</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<?php echo $result->keterangan;?></td>
    </tr>
  </tbody>
</table>
<br/>
<table width="100%">
  <tbody>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:center" colspan="2">&nbsp;&nbsp;<b><?= "Rp.".number_format($result->nilai_po).",-" ?></b></td>
      <td></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tr>
    <td width="45%" style="font-size:12px;">&nbsp;</td>
    <td width="20%" style="font-size:12px;text-align:left"><br />Bandung, <?php echo DATE("d-m-Y"); ?><br />
Bendahara Penerimaan<br />
Puslitbang Teknologi Mineral dan Batubara<br><br><br><br><br>
Utami<br />
NIP. 19620325 198503 2 002
  </td>
  <td width = "5%"></td>
  </tr>
</table>
<!-- <table width="100%" border="0">
  <tr>
    <td style="font-size:12px;"><br />Catatan :<br />
1. Pembayaran harus menggunakan nomor faktur <br>
<i>Payment had to use the Invoice Number</i><br>
2. Kwitansi ini sah, apabila sudah ada bukti pembayaran ke Rekening BLU tekMIRA<br>
<i>Receipt is valid if there is already evidence of payment to the account BLU tekMIRA</i>
</table> -->
<br />
<hr style="border-top: 1px dashed #8c8b8b;border-bottom: 1px dashed #fff;">
<br /><table width="100%" border="0">
  <tr>
    <td width="5%" rowspan="3" style="font-size:9px;font-weight: bold;text-align:center;line-height: -10px;"><img src="<?php echo base_url();?>assets/esdm.png" width="60" height="50" align="middle"/><br/></td>
    <td width="73%" style="font-size:12px;text-align:center;line-height: 18px;">
        <p style="font-size:12px;text-align:left;line-height: 18px;margin:1px;">
          <b>
          &nbsp;KEMENTERIAN ENERGI DAN SUMBER DAYA MINERAL REPUBLIK INDONESIA <br>
          &nbsp;BADAN LITBANG ENERGI DAN SUMBER DAYA MINERAL <br>
          &nbsp;PUSLITBANG TEKNOLOGI MINERAL DAN BATUBARA
        </b>
        </p>
    <td width="8%" style="font-size:28px;text-align:center;line-height: 25px;">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
  <td style="font-size:16px; text-align:center;margin:0;line-height: 30px;"><br />
    <strong> <u>K U I T A N S I</u></strong>
  </td>
  </tr>
</table>
<table width="100%">
  <tbody>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Sudah terima dari</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<?php echo $result->nama_po;?></td>
    </tr>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Uang sejumlah</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<strong><?php echo ucfirst($terbilang)." rupiah"; ?></strong></td>
    </tr>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Untuk pembayaran</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<?php echo $result->keterangan;?></td>
    </tr>
  </tbody>
</table>
<br/>
<table width="100%">
  <tbody>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:center" colspan="2">&nbsp;&nbsp;<b><?= "Rp.".number_format($result->nilai_po).",-" ?></b></td>
      <td></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tr>
    <td width="45%" style="font-size:12px;">&nbsp;</td>
    <td width="20%" style="font-size:12px;text-align:left"><br />Bandung, <?php echo DATE("d-m-Y"); ?><br />
Bendahara Penerimaan<br />
Puslitbang Teknologi Mineral dan Batubara<br><br><br><br><br>
Utami<br />
NIP. 19620325 198503 2 002
  </td>
  <td width = "5%"></td>
  </tr>
</table>
<!-- <table width="100%" border="0">
  <tr>
    <td style="font-size:12px;"><br />Catatan :<br />
1. Pembayaran harus menggunakan nomor faktur <br>
<i>Payment had to use the Invoice Number</i><br>
2. Kwitansi ini sah, apabila sudah ada bukti pembayaran ke Rekening BLU tekMIRA<br>
<i>Receipt is valid if there is already evidence of payment to the account BLU tekMIRA</i>
</table> -->
<br />
<hr style="border-top: 1px dashed #8c8b8b;border-bottom: 1px dashed #fff;">
<br /><table width="100%" border="0">
  <tr>
    <td width="5%" rowspan="3" style="font-size:9px;font-weight: bold;text-align:center;line-height: -10px;"><img src="<?php echo base_url();?>assets/esdm.png" width="60" height="50" align="middle"/><br/></td>
    <td width="73%" style="font-size:12px;text-align:center;line-height: 18px;">
        <p style="font-size:12px;text-align:left;line-height: 18px;margin:1px;">
          <b>
          &nbsp;KEMENTERIAN ENERGI DAN SUMBER DAYA MINERAL REPUBLIK INDONESIA <br>
          &nbsp;BADAN LITBANG ENERGI DAN SUMBER DAYA MINERAL <br>
          &nbsp;PUSLITBANG TEKNOLOGI MINERAL DAN BATUBARA
        </b>
        </p>
    <td width="8%" style="font-size:28px;text-align:center;line-height: 25px;">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
  <td style="font-size:16px; text-align:center;margin:0;line-height: 30px;"><br />
		<strong> <u>K U I T A N S I</u></strong>
  </td>
  </tr>
</table>
<table width="100%">
  <tbody>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Sudah terima dari</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<?php echo $result->nama_po;?></td>
    </tr>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Uang sejumlah</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<strong><?php echo ucfirst($terbilang)." rupiah"; ?></strong></td>
    </tr>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:left">&nbsp;&nbsp;Untuk pembayaran</td>
      <td width="2%"  style="padding-left:10px;padding-right:5px;text-align:center">:</td>
      <td width="70%" style="text-align:left">&nbsp;&nbsp;<?php echo $result->keterangan;?></td>
    </tr>
  </tbody>
</table>
<br/>
<table width="100%">
  <tbody>
    <tr style="font-size:12px;">
      <td width="15%" height="30" style="text-align:center" colspan="2">&nbsp;&nbsp;<b><?= "Rp.".number_format($result->nilai_po).",-" ?></b></td>
      <td></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tr>
    <td width="45%" style="font-size:12px;">&nbsp;</td>
    <td width="20%" style="font-size:12px;text-align:left"><br />Bandung, <?php echo DATE("d-m-Y"); ?><br />
Bendahara Penerimaan<br />
Puslitbang Teknologi Mineral dan Batubara<br><br><br><br><br>
Utami<br />
NIP. 19620325 198503 2 002
	</td>
  <td width = "5%"></td>
  </tr>
</table>
<!-- <table width="100%" border="0">
  <tr>
    <td style="font-size:12px;"><br />Catatan :<br />
1. Pembayaran harus menggunakan nomor faktur <br>
<i>Payment had to use the Invoice Number</i><br>
2. Kwitansi ini sah, apabila sudah ada bukti pembayaran ke Rekening BLU tekMIRA<br>
<i>Receipt is valid if there is already evidence of payment to the account BLU tekMIRA</i>
</table> -->
<br />
</body>
</html>
