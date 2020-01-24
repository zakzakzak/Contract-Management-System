<?php
require('function.php');

$hasil_adendum   = query("SELECT * FROM adendum ORDER BY status");


?>


<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <div class="az-mail-header">
            <div>
              <h4 class="az-content-title mg-b-5">Problem list</h4>
              <p>You have <?= count($hasil_adendum) ?> problem</p>
            </div>
            <div>
            </div>
          </div><!-- az-mail-list-header -->



          <table id="example2" class="table">
            <thead>
                <tr>
                  <th class="wd-lg-15p">Kontrak</th>
                  <th class="wd-lg-15p">No. Kontrak</th>
                  <th class="wd-lg-15p">Tgl. Pengajuan</th>
                  <th class="wd-lg-15p">Status</th>

                </tr>
            </thead>
            <tbody>
              <?php for ($i=0; $i < count($hasil_adendum); $i++) :?>
                <tr>
                  <?php
                  $id_kontrak = $hasil_adendum[$i]["id_kontrak"];
                  $kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = $id_kontrak")[0];

                  $nama_kontrak = $kontrak["nama_kontrak"];
                  $nomor_kontrak = $kontrak["no_kontrak"];
                   ?>
                  <!-- NAMA KONTRAK -->
                  <td><?= $nama_kontrak ?></td>

                  <!-- NOMOR KONTRAK -->
                  <td><?= $nomor_kontrak ?></td>

                  <!-- TGL PENGAJUAN -->
                  <td><?= $hasil_adendum[$i]["tgl_pengajuan"] ?></td>

                  <!-- STATUS -->
                  <?php if ($hasil_adendum[$i]["status"] == 0): ?>
                    <!-- pengajuan -->
                    <td><a href="<?= base_url()."home/afin_approve_adendum?id=".$id_kontrak ;?>" class="btn btn-info btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> Lihat</a></td>
                  <?php elseif ($hasil_adendum[$i]["status"] == 1): ?>
                    <!-- diterima -->
                    <td class="tx-info">Diterima</td>
                  <?php else: ?>
                    <!-- status : 2 -->
                    <!-- ditolak -->
                    <td class="tx-danger">Ditolak</td>
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
