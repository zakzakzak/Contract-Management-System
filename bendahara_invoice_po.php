<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INVOICE <?php echo $result->no_po;?></title>
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
<br>
<br>
<table width="100%" border="0">
  <tr>
    <td style="font-size:12px;text-align:left">
    Yang Terhormat :<br>
    <b><?php echo $result->nama_po;?>bff</b><br>
    di<br>
    Tempat
    </td>

  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="60%"></td>
    <td width="20%" style="font-size:12px;text-align:right"><b>
    Invoice Date : <br>
    Due Date : <br>
    </td>
    <?php $today = date("d-m-Y");?><br>
    <?php $due_date = mktime(0,0,0,date("n"),date("j")+30,date("Y")); ?>
    <td width="30%" style="font-size:12px;text-align:right"><b>
    <?php echo DATE("d/m/Y");?><br>
    <?php echo date("d/m/Y", $due_date);?><br>
    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
  <td style="font-size:16px; text-align:left;margin:0;line-height: 30px;"><br />
		<strong> INVOICE : <?php echo $result->no_po;?></strong>
  </td>
  </tr>
</table>
<table width="100%" rules="all" border="1">
  <thead style="font-size:12px;font-weight: bold;text-align:center">
    <th width="5%" height="44">Item</th>
    <th width="60%">Description</th>
    <th width="5%">Qty</th>
    <th width="15%">Price</th>
    <th width="15%">Total</th>
  </thead>
  <tbody>
    <tr style="font-size:12px;">
      <td width="5%" height="44" style="text-align:center">1</td>
      <td width="60%"  style="padding-left:10px;padding-right:5px;"><?php echo $result->keterangan;?></td>
      <td width="5%" style="text-align:center">1</td>
      <td width="15%"  style="text-align:center"><?= "Rp.".number_format($result->nilai_po).",-" ?></td>
      <td width="15%"  style="text-align:center"><?= "Rp.".number_format($result->nilai_po).",-" ?></td>
    </tr>
    <tr style="font-size:12px;">
      <td height="30" style="text-align:center" colspan="4"><b>TOTAL&nbsp;&nbsp;&nbsp;</b></td>
      <td style="text-align:center"><b><?= "Rp.".number_format($result->nilai_po).",-" ?></b></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tr>
  <td style="font-size:12px; text-align:left;margin:0;"><br />
		Terbilang : <strong>  <?php echo ucfirst($terbilang)." rupiah"; ?></strong>
  </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="45%" style="font-size:12px;">&nbsp;</td>
    <td width="20%" style="font-size:12px;text-align:left"><br />Bandung, <?php echo DATE("d-m-Y"); ?><br />
a.n. Pejabat Keuangan<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Subbagian Keuangan<br><br><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Endang Sobari, S.E.<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP. 19641123 198903 1 001
	</td>
  <td width = "5%"></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td style="font-size:12px;"><br />Catatan :<br />
1. Pembayaran harus menggunakan nomor faktur <br>
2. Pembayaran melalui <b> melalui Rekening No. 0668091411 a.n. RPL 022 BLU TEKMIRA 412596 UTK OPS BANK BNI KCP Jalan Denderal Sudirman, KCU Jalan Perintis Kemerdekaan , Bandung </b> <br>
3. Atau Langsung ke Bendahara Penerimaan BLU Puslitbang tekMIRA</tr>
</table>
<br />
<hr style="border-top: 1px dashed #8c8b8b;border-bottom: 1px dashed #fff;">
<br />
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
<br>
<br>
<table width="100%" border="0">
  <tr>
    <td style="font-size:12px;text-align:left">
    Yang Terhormat :<br>
    <b><?php echo $result->nama_po;?>bff</b><br>
    di<br>
    Tempat
    </td>

  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="60%"></td>
    <td width="20%" style="font-size:12px;text-align:right"><b>
    Invoice Date : <br>
    Due Date : <br>
    </td>
    <?php $today = date("d-m-Y");?><br>
    <?php $due_date = mktime(0,0,0,date("n"),date("j")+30,date("Y")); ?>
    <td width="30%" style="font-size:12px;text-align:right"><b>
    <?php echo DATE("d/m/Y");?><br>
    <?php echo date("d/m/Y", $due_date);?><br>
    </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
  <td style="font-size:16px; text-align:left;margin:0;line-height: 30px;"><br />
		<strong> INVOICE : <?php echo $result->no_po;?></strong>
  </td>
  </tr>
</table>
<table width="100%" rules="all" border="1">
  <thead style="font-size:12px;font-weight: bold;text-align:center">
    <th width="5%" height="44">Item</th>
    <th width="60%">Description</th>
    <th width="5%">Qty</th>
    <th width="15%">Price</th>
    <th width="15%">Total</th>
  </thead>
  <tbody>
    <tr style="font-size:12px;">
      <td width="5%" height="44" style="text-align:center">1</td>
      <td width="60%"  style="padding-left:10px;padding-right:5px;"><?php echo $result->keterangan;?></td>
      <td width="5%" style="text-align:center">1</td>
      <td width="15%"  style="text-align:center"><?= "Rp.".number_format($result->nilai_po).",-" ?></td>
      <td width="15%"  style="text-align:center"><?= "Rp.".number_format($result->nilai_po).",-" ?></td>
    </tr>
    <tr style="font-size:12px;">
      <td height="30" style="text-align:center" colspan="4"><b>TOTAL&nbsp;&nbsp;&nbsp;</b></td>
      <td style="text-align:center"><b><?= "Rp.".number_format($result->nilai_po).",-" ?></b></td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0">
  <tr>
  <td style="font-size:12px; text-align:left;margin:0;"><br />
		Terbilang : <strong>  <?php echo ucfirst($terbilang)." rupiah"; ?></strong>
  </td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td width="45%" style="font-size:12px;">&nbsp;</td>
    <td width="20%" style="font-size:12px;text-align:left"><br />Bandung, <?php echo DATE("d-m-Y"); ?><br />
a.n. Pejabat Keuangan<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kepala Subbagian Keuangan<br><br><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Endang Sobari, S.E.<br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NIP. 19641123 198903 1 001
	</td>
  <td width = "5%"></td>
  </tr>
</table>
<table width="100%" border="0">
  <tr>
    <td style="font-size:12px;"><br />Catatan :<br />
1. Pembayaran harus menggunakan nomor faktur <br>
2. Pembayaran melalui <b> melalui Rekening No. 0668091411 a.n. RPL 022 BLU TEKMIRA 412596 UTK OPS BANK BNI KCP Jalan Denderal Sudirman, KCU Jalan Perintis Kemerdekaan , Bandung </b> <br>
3. Atau Langsung ke Bendahara Penerimaan BLU Puslitbang tekMIRA</tr>
</table>

<br />
</body>
</html>
