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
?>
<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
              <table id="example1" class="table">
              <thead>
                <tr>
                  <th class="wd-lg-5p">No.</th>
                  <th class="wd-lg-20p">Tanggal</th>
                  <th class="wd-lg-5p">Jumlah</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach ($result as $a) { ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><b><?php echo tgl_indo(date($a->tgl_operasional)); ?></b></td>
                    <td><center><?= $a->jumlah ?></center></td>
                    <td>
                        <center>
                          <a href="<?=  base_url()."home/bendahara_cetak_berita_acara/".$a->tgl_operasional ?>" class="badge badge-danger" onclick="javascript: return confirm('Cetak Berita Acara?')" target="_blank">Cetak Berita Acara</a>
                        </center>
                    </td>
                  </tr>
            <?php $no=$no+1;} ?>
            </tbody>
            </table>
          <div class="mg-lg-b-30"></div>
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->
