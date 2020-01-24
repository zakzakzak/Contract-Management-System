<?php
require('function.php');

$hasil_masalah   = query("SELECT * FROM masalah AS m
LEFT JOIN bidang AS b ON m.id_bidang = b.id_bidang ORDER BY m.status");
$hasil_subbidang = query("SELECT * FROM sub_bidang");



?>


<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <div class="az-mail-header">
            <div>
              <h4 class="az-content-title mg-b-5">Problem list</h4>
              <p>You have <?= count($hasil_masalah) ?> problem</p>
            </div>
            <div>
            </div>
          </div><!-- az-mail-list-header -->


          <table id="example1" class="table">
            <thead>
                <tr>
                  <th class="wd-lg-5p">No.</th>

                  <th class="wd-lg-25p">Kegiatan</th>
                  <th class="wd-lg-15p">Pesan</th>
                  <th class="wd-lg-10p">status</th>

                </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($hasil_masalah); $i++) :?>
                <tr>
                  <td><?= $i+1 ?></td>


                  <td><strong><?php $id_ktrk = $hasil_masalah[$i]["id_kegiatan"];$ktrk = query("SELECT * FROM kegiatan WHERE id_kegiatan = $id_ktrk")[0]["nama_kegiatan"]; echo $ktrk ?></strong>
                  <br><?php $id_ktrk = $hasil_masalah[$i]["id_kontrak"];$ktrk = query("SELECT * FROM kontrak WHERE id_kontrak = $id_ktrk")[0]["nama_kontrak"]; echo $ktrk ?>
                  </td>

                  <td><?= $hasil_masalah[$i]["masalah"] ?></td>

                  <!-- Status -->

                  <?php if ($hasil_masalah[$i]["status"]==0) :?>
                    <td>OPEN
                    </td>
                  <?php elseif ($hasil_masalah[$i]["status"]==1): ?>
                    <td>Menunggu Jawaban dari <strong> <?= $hasil_masalah[$i]["nama_bidang"] ?></strong>
                    </td>
                  <?php elseif ($hasil_masalah[$i]["status"]==2): ?>
                    <td>Solusi masuk dari <strong> <?= $hasil_masalah[$i]["nama_bidang"] ?></strong>
                    </td>
                  <?php elseif ($hasil_masalah[$i]["status"]==3): ?>
                    <td>CLOSE
                    </td>
                  <?php endif; ?>


                  <!-- Aksi -->

                  <!-- <td><a href="" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Lihat solusi</a></td> -->

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
