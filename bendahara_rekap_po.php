<div class="az-content az-content-mail">
      <div class="container">
        <div class="az-content-body az-content-body-mail">
          <table class="table" width="100%">
            <thead>
              <tr>
                <th width="10%" style="text-align:center">No.</th>
                <th width="70%">Jenis Layanan</th>
                <th width="20%" style="text-align:center">Jumlah (Dana Kelola)</th>
                <th width="20%" style="text-align:center">Jumlah (Dana Operasional)</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; $total=0;foreach ($layanan as $a) { ?>
                  <tr>
                    <td style="text-align:center"><?php echo $no; ?></td>
                    <td><b><?php echo $a->jenis; ?></b></td>
                    <td style="text-align:center"></td>
                    <td style="text-align:center"></td>
                  </tr>
                  <?php $detail = $this->db->query("SELECT * FROM detail_layanan WHERE id_layanan = $a->id_jenis_layanan")->result();?>
                  <?php foreach ($detail as $b) { ?>
                  <?php $hasil_detail = $this->db->query("SELECT SUM(nilai_po) AS jumlah FROM po WHERE id_jasa = $b->id_detail AND status = 1")->row();?>
                  <tr>
                    <td></td>
                    <td><a href="<?php echo base_url();?>home/bendahara_detail/<?php echo $b->id_detail;?>"><?php echo $b->nama_layanan; ?></a></td>
                    <?php $kelola = $this->db->query("SELECT SUM(nilai_po) AS jumlah FROM po WHERE id_jasa = $b->id_detail AND status = 0")->row();?>
                    <?php $hasil_kelola = $this->db->query("SELECT SUM(nilai_po) AS jumlah FROM po WHERE status = 0")->row();?>
                    <td style="text-align:center"><?= "Rp.".number_format($kelola->jumlah).",-" ?></td>
                    <td style="text-align:center"><?= "Rp.".number_format($hasil_detail->jumlah).",-" ?></td>
                  </tr>
                  <?php } ?>
            <?php $no=$no+1;} ?>
            <tr>
              <td></td>
              <td><b>DANA KELOLAAN</b></td>
              <td style="text-align:center"><?= "Rp.".number_format($hasil_kelola->jumlah).",-" ?></td>
              <td style="text-align:center"><?= "Rp.".number_format($hasil_detail->jumlah).",-" ?></td>
            </tr>
            </tbody>
          </table>
        </div><!-- az-content-body -->
      </div><!-- container -->
    </div><!-- az-content -->
