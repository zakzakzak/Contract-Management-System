<?php
require('function.php');
$tipe = $_GET["tipe"];
$id_pengajuan = $_GET["id_p"];
$id_kontrak = $_GET["id_k"];
$baseurl       = base_url()."home";

$form_barang        = query("SELECT * FROM form_barang WHERE id_pengajuan = $id_pengajuan");
$form_jasa_perhari  = query("SELECT * FROM form_jasa_perhari WHERE id_pengajuan = $id_pengajuan");
$form_jasa_perjam   = query("SELECT * FROM form_jasa_perjam WHERE id_pengajuan = $id_pengajuan");
$form_modal         = query("SELECT * FROM form_modal WHERE id_pengajuan = $id_pengajuan");
$form_konsumsi      = query("SELECT * FROM form_konsumsi WHERE id_pengajuan = $id_pengajuan");
$form_perjalanan    = query("SELECT * FROM form_perjalanan WHERE id_pengajuan = $id_pengajuan");



$hasil_pegawai = query("SELECT * FROM pegawai2 ORDER BY nama");

if(isset($_POST["submit1"])){
    if(count($form_barang) > 0){
      if (tambah_ttd_peg($_POST, $id_pengajuan) > 0){
        echo "
            <script>
              alert('data tanda tangan BERHASIL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_barang?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
       }else{
        echo "
            <script>
              alert('data tanda tangan GAGAL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_barang?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
      }

    }
    if(count($form_jasa_perhari) > 0){
      if (tambah_ttd_peg($_POST, $id_pengajuan) > 0){
        echo "
            <script>
              alert('data tanda tangan BERHASIL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_perhari?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
       }else{
        echo "
            <script>
              alert('data tanda tangan GAGAL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_perhari?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
      }

    }
    if(count($form_jasa_perjam) > 0){
      if (tambah_ttd_peg($_POST, $id_pengajuan) > 0){
        echo "
            <script>
              alert('data tanda tangan BERHASIL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_perjam?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
       }else{
        echo "
            <script>
              alert('data tanda tangan GAGAL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_perjam?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
      }

    }
    if(count($form_modal) > 0){
      if (tambah_ttd_peg($_POST, $id_pengajuan) > 0){
        echo "
            <script>
              alert('data tanda tangan BERHASIL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_modal?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
       }else{
        echo "
            <script>
              alert('data tanda tangan GAGAL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_modal?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
      }


    }
    if(count($form_konsumsi) > 0){
      if (tambah_ttd_peg($_POST, $id_pengajuan) > 0){
        echo "
            <script>
              alert('data tanda tangan BERHASIL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_konsumsi?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
       }else{
        echo "
            <script>
              alert('data tanda tangan GAGAL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_konsumsi?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
      }

    }
    if(count($form_perjalanan) > 0){
      if (tambah_ttd_peg($_POST, $id_pengajuan) > 0){
        echo "
            <script>
              alert('data tanda tangan BERHASIL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_perjalanan?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
       }else{
        echo "
            <script>
              alert('data tanda tangan GAGAL ditambahkan');
              document.location.href = '$baseurl/penelitian_view_form_perjalanan?id_p=$id_pengajuan&id_k=$id_kontrak';
            </script>
        ";
      }

    }

}

if(isset($_POST["submit2"])){
  if(count($form_barang) > 0){
    if (tambah_ttd_non_peg($_POST, $id_pengajuan) > 0){
      echo "
          <script>
            alert('data tanda tangan BERHASIL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_barang?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
     }else{
      echo "
          <script>
            alert('data tanda tangan GAGAL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_barang?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
    }

  }
  if(count($form_jasa_perhari) > 0){
    if (tambah_ttd_non_peg($_POST, $id_pengajuan) > 0){
      echo "
          <script>
            alert('data tanda tangan BERHASIL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_perhari?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
     }else{
      echo "
          <script>
            alert('data tanda tangan GAGAL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_perhari?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
    }

  }
  if(count($form_jasa_perjam) > 0){
    if (tambah_ttd_non_peg($_POST, $id_pengajuan) > 0){
      echo "
          <script>
            alert('data tanda tangan BERHASIL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_perjam?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
     }else{
      echo "
          <script>
            alert('data tanda tangan GAGAL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_perjam?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
    }

  }
  if(count($form_modal) > 0){
    if (tambah_ttd_non_peg($_POST, $id_pengajuan) > 0){
      echo "
          <script>
            alert('data tanda tangan BERHASIL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_modal?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
     }else{
      echo "
          <script>
            alert('data tanda tangan GAGAL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_modal?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
    }


  }
  if(count($form_konsumsi) > 0){
    if (tambah_ttd_non_peg($_POST, $id_pengajuan) > 0){
      echo "
          <script>
            alert('data tanda tangan BERHASIL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_konsumsi?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
     }else{
      echo "
          <script>
            alert('data tanda tangan GAGAL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_konsumsi?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
    }

  }
  if(count($form_perjalanan) > 0){
    if (tambah_ttd_non_peg($_POST, $id_pengajuan) > 0){
      echo "
          <script>
            alert('data tanda tangan BERHASIL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_perjalanan?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
     }else{
      echo "
          <script>
            alert('data tanda tangan GAGAL ditambahkan');
            document.location.href = '$baseurl/penelitian_view_form_perjalanan?id_p=$id_pengajuan&id_k=$id_kontrak';
          </script>
      ";
    }

  }
}

 ?>
<?php if ($tipe == 1): ?>
  <div class="az-content az-content-dashboard-four">
  <div class="media media-dashboard">
  <div class="media-body">
        <form autocomplete="off" action="" method="post">

        <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card card-body pd-40">
            <h5 class="card-title mg-b-20">Tambah Tanda Tangan Pegawai</h5>

              <div class="form-group">
              <label class="az-content-label tx-11 tx-medium tx-gray-600">Nama Pegawai</label>
              <select class="form-control" name = "peg" required>
                <option value="">Pilih Pegawai</option>
                <?php for ($i=0; $i < count($hasil_pegawai); $i++) : ?>
                  <option value="<?= $hasil_pegawai[$i]["id"] ?>"><?= $hasil_pegawai[$i]["nama"] ?></option>
                <?php endfor; ?>
              </select>
              </div><!-- form-group -->

              <div class="form-group">
                <label class="az-content-label tx-11 tx-medium tx-gray-600" >Sebagai</label>
                <input type="text" class="form-control" name= "sebagai" required>
              </div><!-- form-group -->

            <button class="btn btn-az-primary btn-block" name ="submit1">Simpan</button>
        </div><!-- card -->
        </div><!-- col -->
      </form>

   </div></div></div>

<?php  elseif ($tipe == 2):  ?>
  <div class="az-content az-content-dashboard-four">
  <div class="media media-dashboard">
  <div class="media-body">
        <form autocomplete="off" action="" method="post">

        <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card card-body pd-40">
            <h5 class="card-title mg-b-20">Tambah Tanda Tangan</h5>

              <div class="form-group">
              <label class="az-content-label tx-11 tx-medium tx-gray-600">Nama</label>
              <input type="text" class="form-control" name= "nama" required>
              </div><!-- form-group -->

              <div class="form-group">
                <label class="az-content-label tx-11 tx-medium tx-gray-600" >Sebagai</label>
                <input type="text" class="form-control" name= "sebagai" required>
              </div><!-- form-group -->

            <button class="btn btn-az-primary btn-block" name ="submit2">Simpan</button>
        </div><!-- card -->
        </div><!-- col -->
      </form>

   </div></div></div>

<?php endif; ?>


<script type="text/javascript">
$('select').select2({
    maximumInputLength: 20 // only allow terms up to 20 characters long
});

</script>
