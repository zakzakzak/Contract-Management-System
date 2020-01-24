<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <table class="table" width="100%">

            <tbody>
              <?php echo form_open_multipart('home/bendahara_pindah_operasional');?>
              <input type="text" name="id" value="<?= $hasil_po->id_po ?>" hidden="true">
              <tr>
                <td style="text-align:left">Nomor Sertifikat</td>
                <td><input type="text" class="form-control" name= "no_sertifikat" required></td>
              </tr>
              <tr>
                <td style="text-align:left">Tanggal Sertifikat</td>
                <td>
                  <input type="text" class ="form-control" id="datepicker1" name = "tgl_sertifikat">
                  <script>
                    jq_1_12_4( "#datepicker1" ).datepicker({
                      dateFormat : "dd/mm/yy"
                    });
                  </script>
                </td>
              </tr>
              <tr>
                <td style="text-align:left">Keterangan</td>
                <td><textarea  rows="5" class="form-control" placeholder="Tuliskan KETERANGAN" name="keterangan"><?= $hasil_po->keterangan ?></textarea></td>
              </tr>
              <tr>
                <td style="text-align:left"><button type="submit" class="btn btn-info waves-effect text-left">Simpan</button></td>
                <td></td>
              </tr>
              </form>
            </tbody>
          </table>
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->
