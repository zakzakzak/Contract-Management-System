<?php
require('function.php');

$hasil_kontrak = query("SELECT * FROM kontrak");
$hasil_peg     = query("SELECT * FROM pegawai");
$hasil_jas     = query("SELECT * FROM jasa");

$baseurl = base_url()."home";
$terpilih = (int)$_GET["id"];
$kontrak_terpilih = query("SELECT * FROM kontrak WHERE id_kontrak = $terpilih")[0];

if(isset($_POST["button"])){
  // var_dump("ok");
  echo "
        <script>
          print();
        </script>
    ";
}

if(isset($_POST["button"])){
  // var_dump("ok");
echo ("
        <script>
          // alert('data berhasil ditambahkan');
          document.location.href = '$baseurl/afin_upload?id=$terpilih';
        </script>
    ");
}

?>


<div>
      <div class="container">


        <!-- INI TAMPILAN DETIL KONTRAK -->
        <div class="az-content-body az-content-body-invoice">
          <div class="card card-invoice">
            <div class="card-body">
              <div class="invoice-header">
                <h1 class="invoice-title">KONTRAK</h1>
                <div class="billed-from">
                </div><!-- billed-from -->
              </div><!-- invoice-header -->
              <div class="row mg-t-20">
                <div class="col-md">
                  <label class="tx-gray-600">Penagihan</label>
                  <div class="billed-to">
                    <?php
                    $id_perus = $kontrak_terpilih["id_perusahaan"];
                    $perus = query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perus");


                     ?>
                    <h6>Ir. <?= $perus[0]["penanggung_jawab"] ?>, M.T.</h6>
                    <p>Direktur Utama <br>
                    Tel No: 0<?=$perus[0]["no_telp"]  ?><br>
                    Email: <?=$perus[0]["penanggung_jawab"]  ?>@companyname.com</p>
                  </div>
                </div><!-- col -->
                <div class="col-md">
                  <label class="tx-gray-600">Perusahaan</label>
                  <div class="billed-to">
                    <h6><?=$perus[0]["nama_perusahaan"]  ?></h6>
                    <p><?=$perus[0]["alamat"]  ?><br>
                    Tel No: (021) 8752727<br>
                    Email: youremail@companyname.com</p>

                  </div>
                </div><!-- col -->
              </div><!-- row -->
              <div class="row mg-t-20">
                <div class="col-md">
                  <label class="tx-gray-600">Detail Kontrak</label>
                  <p class="invoice-info-row">
                    <span>Judul Kontrak : <br><?= $kontrak_terpilih["nama_kontrak"] ?></span>
                  </p><p class="invoice-info-row">
                    <span>Jenis Layanan : <br>
                      <?php
                     $jasa2 = $kontrak_terpilih['id_jasa'];
                     $jasa  = query("SELECT * FROM rumah_layanan WHERE id_rumah_layanan =$jasa2")[0];
                     echo $jasa["nama"];
                     ?></span>
                  </p>
                  <p class="invoice-info-row">
                    <span>Pejabat Teknis : <br>Slamet</span>
                  </p><p class="invoice-info-row">
                    <span>PIC : <br><?php
                     $pic2 = $kontrak_terpilih['pic'];
                     $pic  = query("SELECT * FROM pegawai2 WHERE id =$pic2")[0];
                     echo $pic["nama"];
                     ?></span>
                  </p>

                  <p class="invoice-info-row">
                    <span>Tanggal Tanda Tangan : <br><?= $kontrak_terpilih["tgl_ttd"] ?></span>
                    <!-- <span>November 21, 2017</span> -->
                  </p>


                  <p class="invoice-info-row">
                    <span>Tanggal Mulai : <br><?= $kontrak_terpilih["tgl_mulai"] ?></span>
                    <!-- <span>November 21, 2017</span> -->
                  </p>
                  <p class="invoice-info-row">
                    <span>Tanggal Berakhir : <br><?= $kontrak_terpilih["tgl_akir"] ?></span>
                  </p><p class="invoice-info-row">
                    <span>Nilai Kontrak : <br><?= "Rp. ".number_format($kontrak_terpilih["nilai_kontrak"]) ?></span>

                  </p>
                  <p class="invoice-info-row">
                    <span>Ruang Lingkup : <br><?= $kontrak_terpilih["keterangan"] ?></span>
                  </p>

                  <p class="invoice-info-row">
                    <span>File : <br>
                      <form class="" action="" method="post">
                      <?php if($kontrak_terpilih["file"] != NULL) { ?>
                        <a class="btn btn-success waves-effect waves-light m-b-5" href="<?php echo base_url();?>/uploads/<?= $kontrak_terpilih["file"] ?>" target="_blank"><?= $kontrak_terpilih["file"] ?></a>
                    <?php } else { ?>
                      <?php echo form_open_multipart('home/upload', 'id="form"');?>
                        <input type="text" class="form-control" name="id_kontrak" hidden value="<?php echo $kontrak_terpilih["id_kontrak"]; ?>">
                        <input type="file" name="file" size="50" />
                        <br />
                        <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                      <?php } ?>
                    </span>
                  </p>
                </div><!-- col -->
              </div><!-- row -->

            </div><!-- card-body -->
          </div><!-- card -->
        </div><!-- az-content-body -->


      </div>
    </div><!-- az-content -->
