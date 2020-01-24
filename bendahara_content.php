<?php
require('function.php');

// $id_kontrak = $_GET["id_k"];
$hasil_pengajuan = query("SELECT id_pengajuan,pengajuan.id_ro,jumlah,status_pengajuan,status_realisasi,tgl_pengajuan,pengajuan.keterangan,akun FROM pengajuan INNER JOIN rencana_operasional ON pengajuan.id_ro = rencana_operasional.id_ro ORDER BY id_pengajuan DESC");
// $hasil_subbidang = query("SELECT * FROM sub_bidang");
// var_dump($hasil_pengajuan);

?>

<!-- <?= terbilang(320400) ?> -->
<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <div class="az-mail-header">
            <div>
              <h4 class="az-content-title mg-b-5">List pengajuan</h4>
              <p>Ada <?= count($hasil_pengajuan) ?> buah pengajuan</p>
            </div>
            <div>
            </div>
          </div><!-- az-mail-list-header -->

          <table id="example1" class="table">
            <thead>
              <tr>
                <th class="wd-lg-5p">No.</th>
                <th class="wd-lg-25p">Akun</th>
                <th class="wd-lg-35p">Keterangan</th>
                <th class="wd-lg-10p">Jumlah</th>
                <th class="wd-lg-25p">Tanggal</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($hasil_pengajuan); $i++) :?>
                  <tr>
                    <td><?= $i+1 ?></td>
                    <td><?php $akun_ = $hasil_pengajuan[$i]["akun"]; $akun_ = query("SELECT * FROM akun WHERE id_akun = $akun_")[0]["nama_akun"]; echo $akun_;?></td>
                    <td><?= $hasil_pengajuan[$i]["keterangan"] ?></td>
                    <td><?= "Rp.".number_format($hasil_pengajuan[$i]["jumlah"]).",-" ?></td>

                    <td><?= explode(" ",$hasil_pengajuan[$i]["tgl_pengajuan"])[0]  ?></td>
                    <?php if ($hasil_pengajuan[$i]["status_realisasi"] == 0) :?>
                    <!-- <td><a href="<?php //$pengajuan = $hasil_pengajuan[$i]["id_pengajuan"] ;echo base_url()."home/bendahara_realisasi?id=$pengajuan" ;?>" class="btn btn-info btn-with-icon btn-block rounded-5">Realisasi</a></td> -->
                    <!-- <td colspan="2"><a href="" data-toggle="modal" data-target="#modaldemoo<?=$i ?>" class="btn btn-danger btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Terima</a></td>
                    <td colspan="2"><a href="" data-toggle="modal" data-target="#modaldemoo<?=$i ?>" class="btn btn-danger btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Tolak</a></td> -->
                  <?php elseif ($hasil_pengajuan[$i]["status_realisasi"] == 4) :?>
                      <td class="tx-danger">Ditolak</td>
                      <td></td>
                    <?php elseif ($hasil_pengajuan[$i]["status_realisasi"] == 2) :?>
                      <td><a href="<?php $pengajuan = $hasil_pengajuan[$i]["id_pengajuan"] ;echo base_url()."home/bendahara_realisasi?id=$pengajuan" ;?>" class="btn btn-info btn-with-icon btn-block rounded-5">Realisasi</a></td>
                        <td></td>
                  <?php else: ?>
                    <td class="tx-info">Approved</td>
                    <td></td>
                  <?php endif; ?>
                  </tr>
            <?php endfor; ?>
            </tbody>
          </table>


          <div class="mg-lg-b-30"></div>
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->






    <div class="az-mail-compose">
      <div>
        <div class="container">
          <div class="az-mail-compose-box">
            <div class="az-mail-compose-header">
              <span>New Message</span>
              <nav class="nav">
                <a href="" class="nav-link"><i class="fas fa-minus"></i></a>
                <a href="" class="nav-link"><i class="fas fa-compress"></i></a>
                <a href="" class="nav-link"><i class="fas fa-times"></i></a>
              </nav>
            </div><!-- az-mail-compose-header -->
            <div class="az-mail-compose-body">
              <div class="form-group">
                <label class="form-label">To</label>
                <div><input type="text" class="form-control" placeholder="Enter recipient's email address"></div>
              </div><!-- form-group -->
              <div class="form-group">
                <label class="form-label">Subject</label>
                <div><input type="text" class="form-control"></div>
              </div><!-- form-group -->
              <div class="form-group">
                <textarea class="form-control" rows="8" placeholder="Write your message here..."></textarea>
              </div><!-- form-group -->
              <div class="form-group mg-b-0">
                <nav class="nav">
                  <a href="" class="nav-link" data-toggle="tooltip" title="Add attachment"><i class="fas fa-paperclip"></i></a>
                  <a href="" class="nav-link" data-toggle="tooltip" title="Add photo"><i class="far fa-image"></i></a>
                  <a href="" class="nav-link" data-toggle="tooltip" title="Add link"><i class="fas fa-link"></i></a>
                  <a href="" class="nav-link" data-toggle="tooltip" title="Emoticons"><i class="far fa-smile"></i></a>
                  <a href="" class="nav-link" data-toggle="tooltip" title="Discard"><i class="far fa-trash-alt"></i></a>
                </nav>
                <button class="btn btn-primary">Send</button>
              </div><!-- form-group -->
            </div><!-- az-mail-compose-body -->
          </div><!-- az-mail-compose-box -->
        </div><!-- container -->
      </div>
    </div><!-- az-mail-compose -->

    <div id="modaldemo4" class="modal">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
          <div class="modal-header">
            <h6 class="modal-title">Form Tindak Lanjut</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Sub Bidang / Bagian Terkait</label>
                  <div class="pos-relative">
                    <select class="form-control select2">
                      <option label="Pilih Sub Bidang / Bagian Terkait"></option>
                      <?php for ($i=0; $i < count($hasil_subbidang); $i++) :?>
                      <option value="<?= $hasil_subbidang[$i]["id_sub_bidang"] ?>"><?= $hasil_subbidang[$i]["nama_sub_bidang"] ?></option>
                    <?php endfor; ?>
                    </select>
                  </div>
                </div><!-- form-group -->
                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
                    <textarea rows="3" class="form-control" placeholder="Textarea"></textarea>
                  </div><!-- form-group -->
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-indigo">Simpan</button>
            <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->



    <div id="modaldemo4" class="modal">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-content-demo">
          <div class="modal-header">
            <h6 class="modal-title">Form Tindak Lanjut</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Sub Bidang / Bagian Terkait</label>
                  <div class="pos-relative">
                    <select class="form-control select2">
                      <option label="Pilih Sub Bidang / Bagian Terkait"></option>
                      <?php for ($i=0; $i < count($hasil_subbidang); $i++) :?>
                      <option value="<?= $hasil_subbidang[$i]["id_sub_bidang"] ?>"><?= $hasil_subbidang[$i]["nama_sub_bidang"] ?></option>
                    <?php endfor; ?>
                    </select>
                  </div>
                </div><!-- form-group -->
                <div class="form-group">
                  <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
                    <textarea rows="3" class="form-control" placeholder="Textarea"></textarea>
                  </div><!-- form-group -->
          </div><!-- modal-body -->
          <div class="modal-footer">
            <button type="button" class="btn btn-indigo">Simpan</button>
            <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
          </div>
        </div>
      </div><!-- modal-dialog -->
    </div><!-- modal -->
