<?php
require('function.php');

$hasil_masalah   = query("SELECT * FROM masalah");
$hasil_subbidang = query("SELECT * FROM sub_bidang");


?>


<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <div class="az-mail-header">
            <div>
              <h4 class="az-content-title mg-b-5">Inbox</h4>
              <p>You have <?= count($hasil_masalah) ?> unread messages</p>
            </div>
            <div>
            </div>
          </div><!-- az-mail-list-header -->
          <div class="az-mail-list">

            <?php for ($i=0; $i < count($hasil_masalah); $i++) :?>
              <?php
              $id_kontrak = $hasil_masalah[$i]["id_kontrak"];
              $hasil_kontrak = query("SELECT * FROM kontrak WHERE id_kontrak = '$id_kontrak'")[0];
              $pic = $hasil_kontrak["pic"];
              $nama_kontrak = $hasil_kontrak["nama_kontrak"];
              $nama_pic = query("SELECT * FROM pegawai WHERE id_pegawai = $pic")[0]["nama"];

              $id_kegiatan = $hasil_masalah[$i]["id_kegiatan"];
              $hasil_kegiatan = query("SELECT * FROM kegiatan WHERE id_kegiatan = '$id_kegiatan'")[0];
              $nama_kegiatan = $hasil_kegiatan["nama_kegiatan"];

              $masalah = $hasil_masalah[$i]["masalah"];
              // var_dump( $nama_pic);
               ?>

            <div class="az-mail-item unread">
              <!-- az-mail-checkbox -->
              <div class="az-mail-star">
                <i class="typcn typcn-star"></i>
              </div><!-- az-mail-star -->
              <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
              <div class="az-mail-body">
                <div class="az-mail-from"><?= $nama_pic ?></div>
                <div class="az-mail-subject">
                  <strong><a href="" data-toggle="modal"  data-target="#modaldemo4" class="badge badge-danger"><?= "Kontrak : ".$nama_kontrak." | Kegiatan : ".$nama_kegiatan ?></a></strong>

                  <span> <a href="#"><?= $masalah ?></a> </span>
                </div>
              </div><!-- az-mail-body -->
              <div class="az-mail-date">15 September 2019 - 13:00:00</div>
            </div><!-- az-mail-item -->
            <?php endfor; ?>


            <!-- <div class="az-mail-item unread">
              <div class="az-mail-star active">
                <i class="typcn typcn-star"></i>
              </div>
              <div class="az-img-user"><img src="https://via.placeholder.com/500" alt=""></div>
              <div class="az-mail-body">
                <div class="az-mail-from">Albert Ansing</div>
                <div class="az-mail-subject">
                  <strong><a href="" data-toggle="modal" data-target="#modaldemo4">Kontrak Kegiatan 2</a></strong>
                  <span>Barang Sample belum diterima</span>
                </div>
              </div>
              <div class="az-mail-date">1 Oktober 2019 - 09:35:00</div>
            </div> -->



          </div><!-- az-mail-list -->
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
