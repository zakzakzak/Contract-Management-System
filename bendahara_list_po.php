<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <div class="az-mail-header">
            <div>
              <h4 class="az-content-title mg-b-5">List PO</h4>
              <p>Jumlah <?php echo count($result); ?> buah PO</p>
            </div>
            <div>
            </div>
          </div><!-- az-mail-list-header -->
          <a href="<?php echo base_url();?>home/bendahara_input_po" class="btn btn-success btn-with-icon btn-block"><i class="far fa-file-alt"></i> Tambah PO</a>
              <br/>
              <table id="example1" class="table">
              <thead>
                <tr>
                  <th class="wd-lg-5p">No.</th>
                  <th class="wd-lg-10p">Tanggal</th>
                  <th class="wd-lg-25p">Judul</th>
                  <th class="wd-lg-25p">Keterangan</th>
                  <th class="wd-lg-10p">Jumlah</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php $no=1; foreach($result AS $a) { ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><b><?php echo $a->no_po; ?></b><br/><?php echo $a->tanggal; ?></td>
                    <td><?php echo $a->nama_po; ?></td>
                    <td><?php echo $a->keterangan; ?></td>
                    <td><?php echo "Rp.".number_format($a->nilai_po).",-"; ?></td>
                    <?php if ($a->status == 0) { ?>
                      <td>
                        <center>
                          <a href="<?php echo  base_url()."home/bendahara_pindah/".$a->id_po; ?>" class="badge badge-danger" onclick="javascript: return confirm('Yakin memindahkan ke dana Operasional?')">Pindah Operasional</a>
                          <a href="<?php echo  base_url()."home/bendahara_cetak_invoice/".$a->id_po; ?>" class="badge badge-success" target="_blank">Cetak invoice</a>
                        </center>
                      </td>
                    <?php } else { ?>
                      <td><center><a href="<?php echo  base_url()."home/bendahara_cetak_kwitansi/".$a->id_po; ?>" class="badge badge-success" target="_blank">Cetak kwitansi</a></center></td>
                    <?php } ?>
                  </tr>
            <?php $no=$no+1; } ?>
            </tbody>
            </table>
          <div class="mg-lg-b-30"></div>
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->
