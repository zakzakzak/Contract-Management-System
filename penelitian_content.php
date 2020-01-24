<?php
require('function.php');

$hasil_kontrak = query("SELECT * FROM kontrak ORDER BY id_kontrak desc");



?>

<div class="az-content az-content-dashboard-four">
      <div class="media media-dashboard">
        <div class="media-body">
          <div class="az-content-header">
            <div>
              <h6 class="az-content-title tx-18 mg-b-5">Dashboard Pejabat Teknis</h6>
              <p class="az-content-text tx-13 mg-b-0">Hi, Selamat datang kembali</p>
            </div>

            <div class="az-dashboard-header-right">
          <div>
            <label class="tx-13">Penilaian Kinerja</label>
            <div class="az-star">
              <i class="typcn typcn-star active"></i>
              <i class="typcn typcn-star active"></i>
              <i class="typcn typcn-star active"></i>
              <i class="typcn typcn-star active"></i>
              <i class="typcn typcn-star"></i>
              <span>(12,775)</span>
            </div>
          </div>
          <div>
            <label class="tx-13">Total Kontrak Kegiatan</label>
            <h5>12</h5>
          </div>

        </div><!-- az-dashboard-header-right -->
          </div><!-- az-content-header -->

          <!-- <div class="card card-dashboard-twelve mg-b-20">
            <div class="card-header">
              <h6 class="card-title">Monitoring Pelaksanaan Kontrak Kegiatan <span>(Rekapitulasi)</span></h6>
            </div>
            <div class="card-body">

                <div>
                  <h5>Penyediaan Jasa Konsultasi Penelitian Gasifikasi Bahan Bakar Padat</h5>
                  <div class="progress ht-5 mg-b-5">
                    <div class="progress-bar bg-warning wd-90p" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="tx-12 tx-gray-500">Quick Ratio Goal: 1.0 or higher</span>

                  <p class="mg-t-10 mg-b-0">Measures your Current Assets + Accounts Receivable / Current Liabilities <a href="">Learn more</a></p>
                </div>
              </div>
              <div class="card-body">
                <div>
                  <div class="card-icon"><i class="typcn typcn-chart-area-outline"></i></div>
                </div>
                <div>
                  <h6 class="card-title mg-b-7">Current Ratio</h6>
                  <h5>2.8</h5>
                  <div class="progress ht-5 mg-b-5">
                    <div class="progress-bar bg-success wd-60p" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span class="tx-12 tx-gray-500">Quick Ratio Goal: 2.0 or higher</span>
                  <p class="mg-t-10 mg-b-0">Measures your Current Assets / Current Liabilities. <a href="">Learn more</a></p>
                </div>
              </div>
          </div> -->

          <div class="card card-dashboard-twelve mg-b-20">
            <div class="card-header">
              <h6 class="card-title">Monitoring Kontrak Kegiatan <span>(All Events)</span></h6>
            </div><!-- card-header -->
            <div class="card-body">
              <div class="table-responsive">


                  <table id="example1" class="table">
                    <thead>
                        <tr>
                          <th class="wd-lg-5p">No.</th>
                          <th class="wd-lg-25p">Judul kontrak</th>
                          <th class="wd-lg-25p">Nomor kontrak</th>
                          <th class="wd-lg-25p">Perusahaan/client</th>
                          <th class="wd-lg-25p">Nilai kontrak</th>
                          <th class="wd-lg-25p">Aksi</th>

                        </tr>
                    </thead>
                    <tbody>
                      <?php for ($i=0; $i < count($hasil_kontrak); $i++) :?>
                        <tr>

                          <td ><?= $i+1 ?></td>
                          <td ><?= $hasil_kontrak[$i]["nama_kontrak"] ?></td>

                          <td><?= $hasil_kontrak[$i]["no_kontrak"] ?></td>

                          <?php
                          // jumlah kegiatan done
                          $id_kntr = $hasil_kontrak[$i]["id_kontrak"];
                          $jum_kegiatan  = count(query("SELECT * FROM kegiatan WHERE id_kontrak = $id_kntr"));
                          $jum_kegiatan_selesai = query("SELECT sum(status) FROM kegiatan WHERE id_kontrak = $id_kntr")[0]["sum(status)"];

                           ?>

                          <td><?php
                          $id_perus = $hasil_kontrak[$i]["id_perusahaan"];
                          echo query("SELECT * FROM perusahaan WHERE id_perusahaan = $id_perus")[0]["nama_perusahaan"];
                          ?></td>

                          <td><?= "Rp.".number_format($hasil_kontrak[$i]["nilai_kontrak"]).",-" ?></td>
                          <?php if ($jum_kegiatan > 0 ) :?>
                            <?php if ($jum_kegiatan_selesai == $jum_kegiatan):?>
                              <td><center><a href="<?= base_url()."home/penelitian_detail_kontrak?id=".$hasil_kontrak[$i]["id_kontrak"];?>" class="badge badge-success"><?= $jum_kegiatan_selesai." / ".$jum_kegiatan ?></a></center></td>
                            <?php else: ?>
                              <td><center><a href="<?= base_url()."home/penelitian_detail_kontrak?id=".$hasil_kontrak[$i]["id_kontrak"];?>" class="badge badge-danger"><?= $jum_kegiatan_selesai." / ".$jum_kegiatan ?></a></center></td>
                            <?php endif; ?>
                          <?php else: ?>
                            <td><center><a href="<?= base_url()."home/penelitian_detail_kontrak?id=".$hasil_kontrak[$i]["id_kontrak"];?>" class="badge badge-danger">Belum ada</a></center></td>
                          <?php endif; ?>


                        </tr>
                      <?php endfor; ?>

                    </tbody>
                  </table>



                </div><!-- table-responsive -->
            </div><!-- card-body -->
          </div><!-- card -->




        </div><!-- media-body -->

        <div class="media-aside">
          <div class="row row-sm">
            <div class="col-md-6 col-lg-4 col-xl-12">
              <div class="card card-dashboard-calendar">
                <h6 class="card-title">Event Calendar</h6>
                <div class="media az-media-date">
                  <h1>17</h1>
                  <div class="media-body">
                    <p>Nov 2018</p>
                    <span>Saturday</span>
                  </div>
                </div>
                <div class="card-body"><div class="fc-datepicker"></div></div>
              </div><!-- card -->
            </div><!-- col -->
            <div class="col-md-6 col-lg-8 col-xl-12 mg-t-20 mg-md-t-0 mg-xl-t-20">
              <div class="card card-dashboard-events">
                <div class="card-header">
                  <h6 class="card-title">Oktober 2019</h6>
                  <h5 class="card-subtitle">Upcoming Events</h5>
                </div><!-- card-header -->
                <div class="card-body">
                  <div class="list-group">
                    <div class="list-group-item">
                      <div class="event-indicator bg-purple"></div>
                      <label>Okt 15 <span>Tuesday</span></label>
                      <h6>Review Dokumen gamber teknis/gambar detail</h6>
                      <small><span class="tx-danger">Deadline</span> 18 Okt 2019</small>
                    </div><!-- list-group-item -->


                  </div><!-- list-group -->
                </div><!-- card-body -->
              </div><!-- card -->
            </div><!-- col -->
          </div><!-- row -->
        </div><!-- media-aside -->
      </div><!-- media -->

    </div><!-- az-content -->
