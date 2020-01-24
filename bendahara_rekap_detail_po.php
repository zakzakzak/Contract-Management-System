<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <div>
            <h4 class="az-content-title mg-b-5">DETAIL REKAP PO</h4>
            <p>Jumlah Sample : <b><?php echo $sample->jumlah; ?></b></p>
          </div>
          <table id="example1" class="table" width="100%">
            <thead>
              <tr>
                <th width="5%" style="text-align:center">No.</th>
                <th width="20%">Nomor PO</th>
                <th width="20%">Nomor Lab</th>
                <th width="5%">Jumlah Sample</th>
                <th width="20%">Nomor Sertifikat / Tgl Sertifikat</th>
                <th width="20%">Keterangan</th>
                <th width="15%" style="text-align:center">Jumlah</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; $total=0;foreach ($result as $a) { ?>
                  <tr>
                    <td style="text-align:center"><?php echo $no; ?></td>
                    <td>
                      <b><?php echo $a->no_po; ?></b><br>
                      <?php echo $a->nama_po; ?>
                    </td>
                    <td style="text-align:left"><?php echo $a->no_lab; ?></td>
                    <td style="text-align:center"><?php echo $a->jumlah_sample; ?></td>
                    <td style="text-align:left"><?php echo $a->no_sertifikat." / ".$a->tgl_sertifikat; ?></td>
                    <td style="text-align:left"><?php echo $a->keterangan; ?></td>
                    <td style="text-align:center">
                      <?= "Rp.".number_format($a->nilai_po).",-" ?>
                    </td>
                    <td style="text-align:center">
                      <?php if ($a->status == 0) { ?>
                        <a href="#" class="badge badge-danger">Dana Kelola</a>
                      <?php } else { ?>
                        <a href="#" class="badge badge-success">Operasional</a>
                      <?php } ?>
                    </td>
                  </tr>
            <?php $no=$no+1;} ?>
            </tbody>
          </table>
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->
