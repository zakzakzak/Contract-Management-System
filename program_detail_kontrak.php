<?php
require('function.php');
$baseurl       = base_url()."home";

$id_kontrak = $_GET["id"];
$hasil_kontrak = query("SELECT * FROM kontrak where id_kontrak = $id_kontrak");
$kontrak = $hasil_kontrak[0];

$id_jasa = $kontrak["id_jasa"];
$hasil_jasa = query("SELECT * FROM jasa where id_jasa = $id_jasa");
$jasa = $hasil_jasa[0]["nama_jasa"];

$id_pic = $kontrak["pic"];
$hasil_pic = query("SELECT * FROM pegawai where id_pegawai = $id_pic");
$pic = $hasil_pic[0]["nama"];

$hasil_kegiatan = query("SELECT * FROM kegiatan WHERE id_kontrak = $id_kontrak ORDER BY termin");

$hasil_ro = query("SELECT * FROM rencana_operasional WHERE id_kontrak = $id_kontrak");

$hasil_team = query("SELECT * FROM team WHERE id_kontrak = $id_kontrak");

$hasil_pegawai = query("SELECT * FROM pegawai2");
// var_dump($hasil_team);


// var_dump(count($hasil_kegiatan));
if(isset($_POST["submit"])){
  if (tambah_masalah($_POST, $id_kontrak) > 0){
    echo "
        <script>
          alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/program_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }else{
    echo "
        <script>
          alert('data gagal ditambahkan');
        </script>
    ";
  }
}

if(isset($_POST["submit2"])){
  if (tambah_team($_POST, $id_kontrak) > 0){
    echo "
        <script>
          // alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/program_detail_kontrak?id=$id_kontrak';
        </script>
    ";
  }else {
    echo "
        <script>
          alert('pegawai sudah ada');
        </script>
    ";
  }
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Twitter -->
      <meta name="twitter:site" content="@themepixels">
      <meta name="twitter:creator" content="@themepixels">
      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Azia">
      <meta name="twitter:description" content="Responsive Bootstrap 4 Dashboard Template">
      <meta name="twitter:image" content="http://themepixels.me/azia/img/azia-social.png">

      <!-- Facebook -->
      <meta property="og:url" content="http://themepixels.me/azia">
      <meta property="og:title" content="Azia">
      <meta property="og:description" content="Responsive Bootstrap 4 Dashboard Template">

      <meta property="og:image" content="http://themepixels.me/azia/img/azia-social.png">
      <meta property="og:image:secure_url" content="http://themepixels.me/azia/img/azia-social.png">
      <meta property="og:image:type" content="image/png">
      <meta property="og:image:width" content="1200">
      <meta property="og:image:height" content="600">

      <!-- Meta -->
      <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
      <meta name="author" content="ThemePixels">

      <title>Detail Kontrak</title>

      <!-- vendor css -->
      <link href="<?php echo base_url();?>assets/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/typicons.font/typicons.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/spectrum-colorpicker/spectrum.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/select2/css/select2.min.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/amazeui-datetimepicker/css/amazeui.datetimepicker.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/jquery-simple-datetimepicker/jquery.simple-dtpicker.css" rel="stylesheet">
      <link href="<?php echo base_url();?>assets/lib/pickerjs/picker.min.css" rel="stylesheet">

      <!-- azia CSS -->
      <link rel="stylesheet" href="<?php echo base_url();?>assets/css/azia.css">



    </head>
  </head>
  <body>

    <div class="az-content az-content-profile">
      <div class="container mn-ht-100p">
        <div class="az-content-left az-content-left-profile">

          <div class="az-profile-overview">
            <div class="az-img-user">
              <img src="https://via.placeholder.com/500" alt="">
            </div><!-- az-img-user -->
              <div>
                <h5 class="az-profile-name"><?= $kontrak["nama_kontrak"] ?></h5><br>
                <p class="az-profile-name-text"><?php
               $jasa2 = $kontrak['id_jasa'];
               $jasa  = query("SELECT * FROM rumah_layanan WHERE id_rumah_layanan =$jasa2")[0];
               echo $jasa["nama"];
               ?></p>
             </div><br>


            <div class="az-profile-bio">
              <?= $kontrak["keterangan"] ?>
            </div><!-- az-profile-bio -->

            <hr class="mg-y-30">
            <div class="az-profile-social-list">
              <div class="az-content-label tx-13 mg-b-25">Contract Information</div>
              <div class="az-profile-contact-list">

                <div class="media">
                  <div class="media-body">
                    <span>Judul Kontrak</span>
                    <div><?= $kontrak["nama_kontrak"] ?></div>
                  </div><!-- media-body -->
                </div><!-- media -->

                <div class="media">
                  <div class="media-body">
                    <span>Jenis Layanan</span>
                    <div><?php
                   $jasa2 = $kontrak['id_jasa'];
                   $jasa  = query("SELECT * FROM rumah_layanan WHERE id_rumah_layanan =$jasa2")[0];
                   echo $jasa["nama"];
                   ?></div>
                  </div><!-- media-body -->
                </div><!-- media -->


                <div class="media">
                  <div class="media-body">
                    <span>Pejabat Teknis</span>
                    <div>Slamet</div>
                  </div><!-- media-body -->
                </div><!-- media -->

                <div class="media">
                  <div class="media-body">
                    <span>PIC</span>
                    <div><?php
                     $pic2 = $kontrak['pic'];
                     $pic  = query("SELECT * FROM pegawai2 WHERE id =$pic2")[0];
                     echo $pic["nama"];
                     ?></div>
                  </div><!-- media-body -->
                </div><!-- media -->


                <div class="media">
                  <div class="media-body">
                    <span>Tanggal Mulai</span>
                    <div><?= $kontrak["tgl_mulai"] ?></div>
                  </div><!-- media-body -->
                </div><!-- media -->


                <div class="media">
                  <div class="media-body">
                    <span>Tanggal Berakhir</span>
                    <div><?= $kontrak["tgl_akir"] ?></div>
                  </div><!-- media-body -->
                </div><!-- media -->

                <div class="media">
                  <div class="media-body">
                    <span>Nilai Kontrak</span>
                    <div><?= "Rp. ".number_format($kontrak["nilai_kontrak"]).",-" ?></div>
                  </div><!-- media-body -->
                </div><!-- media -->



              </div><!-- az-profile-contact-list -->
            </div><!-- az-profile-social-list -->

          </div><!-- az-profile-overview -->

          <p class="invoice-info-row">
          </p>


        </div><!-- az-content-left -->
        <div class="az-content-body az-content-body-profile">
          <div class="az-profile-body">
            <div class="row">
              <div class="col-md-12 col-xl-12">
                <div class="az-content-label tx-13 mg-b-25">Detail Kegiatan</div>
                <div class="table-responsive">




                  <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
                    <!-- TIMELINE -->
                    <div class="card">
                      <div class="card-header" role="tab" id="headingOne">
                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Detail Kontrak
                        </a>
                      </div><!-- card-header -->

                      <div id="collapseOne" data-parent="#accordion" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                        <table class="table table-striped table-dashboard-one mg-b-0">
                          <thead>

                          <tr>
                            <td>NIP</td>
                            <td>Nama Pegawai</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php for ($i=0; $i < count($hasil_team); $i++):?>
                          <tr>
                            <td><?php
                            $id_peg = $hasil_team[$i]["id_pegawai"];
                            $nip = query("SELECT * FROM pegawai2 WHERE id = $id_peg");
                            echo $nip[0]["nip"];
                             ?></td>
                            <td><?= $nip[0]["nama"]; ?></td>
                          </tr>
                        <?php endfor; ?>

                        </tbody>
                        </table>

                        <td colspan="2"><a href="" data-toggle="modal" data-target="#modaldemo2" class="btn btn-danger btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Tambah Anggota</a></td>
                      </div>
                    </div>



                    <!-- Timeline -->
                    <div class="card">
                      <div class="card-header" role="tab" id="headingTwo">
                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Timeline
                        </a>
                      </div>
                      <div id="collapseTwo" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingTwo">
                        <table class="table table-striped table-dashboard-two mg-b-0">
                          <thead>
                            <tr>
                              <th class="wd-lg-25p">Nama Kegiatan</th>
                              <th class="wd-lg-25p tx-right">Status</th>
                              <th>Termin</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php if(count($hasil_kegiatan) == 0): ?>
                              <tr>
                                <td colspan="3">Belum ada kegiatan</td>
                              </tr>
                            <?php else : ?>

                              <?php for ($i=0; $i < count($hasil_kegiatan); $i++) :?>
                                <tr>


                                  <td>
                                    <strong><?= $hasil_kegiatan[$i]["nama_kegiatan"] ?></strong>
                                    <br/><?= $hasil_kegiatan[$i]["tgl_mulai"]." s/d ".$hasil_kegiatan[$i]["tgl_akhir"] ?>
                                  </td>
                                  <td class="tx-right tx-medium tx-success">On Progress</td>
                                  <td>
                                    <?= $hasil_kegiatan[$i]["termin"] ?>
                                  </td>
                                  <td class="tx-right tx-medium tx-success"><a href="" data-toggle="modal" data-target="#modaldemo3" class="btn btn-success btn-with-icon btn-block"><i class="typcn typcn-folder"></i> Upload Dokumen</a></td>
                                </tr>
                              <?php endfor; ?>
                            <?php endif; ?>
                            <tr>
                              <td colspan="2"><a href="<?= base_url()."home/program_input_kegiatan?id=".$id_kontrak ;?>" class="btn btn-success btn-with-icon btn-block"><i class="far fa-file-alt"></i> Tambah kegiatan</a></td>
                              <td colspan="2"><a href="" data-toggle="modal" data-target="#modaldemo1" class="btn btn-danger btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Input Kendala</a></td>
                            </tr>
<tr>
                              <td colspan="8"><a href="<?= base_url()."home/penelitian_gantt?id=".$id_kontrak ;?>" class="btn btn-success btn-with-icon btn-block rounded-5"><i class="far fa-file-alt"></i> View Gantt Chart</a></td>
                            </tr>

                          </tbody>
                        </table>
                        <!-- <a href="" data-toggle="modal" data-target="#modaldemo2" class="btn btn-info btn-with-icon btn-block"><i class="typcn typcn-document-add"></i> Tambah kegiatan</a> -->



                      </div>

                      <!-- RO -->
                      <div class="card">
                        <div class="card-header" role="tab" id="headingThree">
                          <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Rencana Operasional
                          </a>
                        </div>
                        <div id="collapseThree" class="collapse" data-parent="#accordion" role="tabpanel" aria-labelledby="headingThree">
                          <div class="table-responsive">
                            <table class="table table-striped table-dashboard-two mg-b-0">
                              <thead>
                                <tr>
                                  <th class="wd-lg-25p">Kode Akun</th>
                                  <th class="wd-lg-25p">Pagu</th>
                                  <th class="wd-lg-25p">Realisasi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php if (count($hasil_ro) == 0) :?>
                                  <tr>
                                    <td colspan="3">Belum ada Rencana Operasional</td>
                                  </tr>
                                <?php else: ?>
                                  <?php $total = 0; $total_r = 0; ?>
                                  <?php for ($i=0; $i < count($hasil_ro); $i++) :?>
                                    <tr>
                                      <td>
                                        <strong><?php
                                          $hasil_ro2 = $hasil_ro[$i]["akun"];
                                          // echo "ok";
                                          $hasil_ro3 = query("SELECT * FROM akun WHERE id_akun = $hasil_ro2")[0];
                                          echo $hasil_ro3["nama_akun"];

                                          ?></strong>
                                        </td>
                                        <td class="tx-medium"><?= "Rp. ".number_format($hasil_ro[$i]["biaya"]).",-" ?></td>
                                        <?php $total+= (int)$hasil_ro[$i]["biaya"]?>
                                        <td class="tx-medium tx-success"><?= "Rp. ".number_format($hasil_ro[$i]["realisasi"]).",-" ?></td>
                                        <?php $total_r+= (int)$hasil_ro[$i]["realisasi"]?>
                                      </tr>
                                    <?php endfor; ?>
                                    <tr>
                                      <td>
                                        <strong>TOTAL</strong>
                                      </td>
                                      <td class="tx-medium"><?= 'Rp. '.number_format($total).',-' ?></td>
                                      <td class="tx-medium tx-warning"><?= 'Rp. '.number_format($total_r).',-' ?></td>
                                    </tr>
                                  <?php endif; ?>

                                  <!-- <tr>
                                  <td>
                                  <strong>525121 Belanja Barang untuk Persediaan Barang Konsumsi</strong>
                                </td>
                                <td class="tx-medium">Rp. 4.500.000,-</td>
                                <td class="tx-medium tx-danger">Rp. 600.000,-</td>
                              </tr>

                              <tr>
                              <td>
                              <strong>525115 Belanja Perjalanan Biasa</strong>
                            </td>
                            <td class="tx-medium">Rp. 54.500.000,-</td>
                            <td class="tx-medium tx-success">Rp. 11.500.000,-</td>
                          </tr> -->



                        </tbody>
                      </table>
                      <a href="<?= base_url()."home/program_input_ro?id=".$id_kontrak ;?>" class="btn btn-success btn-with-icon btn-block"><i class="far fa-file-alt"></i> Tambah Rencana Operasional</a>

                    </div><!-- table-responsive -->

                  </div>
                </div><!-- collapse -->
              </div><!-- card -->

            </div><!-- accordion -->


          </div><!-- table-responsive -->
        </div><!-- col -->

      </div><!-- row -->

      <div class="mg-b-20"></div>

    </div><!-- az-profile-body -->
  </div><!-- az-content-body -->
</div><!-- container -->
</div><!-- az-content -->

<div id="modaldemo3" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Upload Dokumen Pendukung</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="row row-sm">
            <div class="col-sm-12">
              <label class="az-content-label tx-11 tx-medium tx-gray-600">Status</label>
              <div class="row row-sm">
                <div class="col-sm-12">
                  <input type="file">
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- form-group -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-indigo">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
      </div>
    </div>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<!-- <div id="modaldemo2" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-demo">

      <form  class="" action="" method="post">


        <div class="modal-header">
          <h6 class="modal-title">Tambah Kegiatan</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <label class="az-content-label tx-11 tx-medium tx-gray-600" for="">Nama Kegiatan</label>
          <input class="form-control" type="text" name="nama" value="">

          <div class="form-group">
            <div class="row row-sm">
              <div class="col-sm-12">
                <label class="az-content-label tx-11 tx-medium tx-gray-600">Tanggal Pelaksanaan</label>
                <div class="row row-sm">
                  <div class="col-sm-6">
                    <input type="text" class="form-control datepicker" placeholder="MM/DD/YYYY" name = "startDate">
                  </div>
                  <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                    <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" name = "endDate">
                  </div>
                </div>
              </div>
            </div>
          </div>

          <label class="az-content-label tx-11 tx-medium tx-gray-600" for="">Peralatan</label>
          <select class="form-control select2">
            <option label="Pilih Bidang"></option>
            <option value="January">Bidang 1</option>
            <option value="February">Bidang 2</option>
            <option value="February">Bidang 3</option>
          </select>

          <label class="az-content-label tx-11 tx-medium tx-gray-600" for="">Termin</label>
          <select class="form-control select2">
            <option label="Pilih Bidang"></option>
            <option value="January">Bidang 1</option>
            <option value="February">Bidang 2</option>
            <option value="February">Bidang 3</option>
          </select>


          <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
          <textarea rows="5" class="form-control" placeholder="Tuliskan keterangan"></textarea>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-indigo">Simpan</button>
          <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
        </div>

      </form>


    </div>
  </div>
</div> -->


<div id="modaldemo1" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <form class="" action="" method="post">

    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Masalah Kegiatan</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
        <select class="form-control" width = "400" name= "id_kegiatan">
          <?php for ($i=0; $i < count($hasil_kegiatan); $i++) : ?>
            <option value="<?= $hasil_kegiatan[$i]["id_kegiatan"] ?>"><?= $hasil_kegiatan[$i]["nama_kegiatan"] ?></option>
          <?php endfor; ?>
        </select>


        <div class="form-group">
          <div class="row row-sm">
            <div class="col-sm-12">
              <label class="az-content-label tx-11 tx-medium tx-gray-600">Keterangan</label>
              <div class="row row-sm">
                <div class="col-sm-12">
                  <textarea rows="5" class="form-control" placeholder="Tuliskan Masalah" name="masalah"></textarea>
                </div><!-- col -->
              </div><!-- row -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- form-group -->
      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" name = "submit">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
      </div>
    </div>
  </form>
  </div><!-- modal-dialog -->
</div><!-- modal -->


<div id="modaldemo2" class="modal">
  <div class="modal-dialog modal-lg" role="document">
    <form class="" action="" method="post">

    <div class="modal-content modal-content-demo">
      <div class="modal-header">
        <h6 class="modal-title">Tambah Anggota</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="az-content-label tx-11 tx-medium tx-gray-600">Pilih Anggota</label>
        <select class="form-control" multiple="multiple" name = "id_pegawai">
          <?php for ($i=0; $i < count($hasil_pegawai); $i++) : ?>
            <option value="<?= $hasil_pegawai[$i]["id"] ?>"><?= $hasil_pegawai[$i]["nama"] ?></option>
          <?php endfor; ?>
        </select>


      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-info" name = "submit2">Simpan</button>
        <button type="button" data-dismiss="modal" class="btn btn-outline-light">Batal</button>
      </div>
    </div>
  </form>
  </div><!-- modal-dialog -->
</div><!-- modal -->






  </body>
</html>
