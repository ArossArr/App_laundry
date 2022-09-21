<?=$this->extend('/componen/admin')?>
<?=$this->section('title')?>
Transaksi
<?=$this->endSection()?>
<?=$this->section('content')?>
  <div class="container">
  <div class="row">
    <div class="col-md-5">
      <!-- From Input -->
      <div class="card">
        <div class="card-header bg-info">Input Data</div>
        <div class="card-body">
            <form action="/addcart" method="post">
              <div class="form-group">
                <label for="paket">Paket</label>
                <select name="paket" id="paket" class="form-control" required>
                  <option value="">Pilih Paket</option>
                  <?php
                    foreach($paket as $keyp => $valp){
                      ?>
                    <option value="<?=$valp['id_paket']?>"><?=$valp['nama_paket']?></option>
                    <?php  
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" value="0">
              </div>
              <div class="form-group mt-4">
                <button class="btn btn-primary" type="submit">Tambah</button>
                <button class="btn btn-secondary mx-3" type="reset">Reset</button>
              </div>
            </form>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <!-- Tampil Data -->
      <div class="card">
        <div class="card-header bg-info">Data Pesanan</div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <tr>
              <th>No.</th>
              <th>Paket</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Sub Total</th>
              <th>Opsi</th>
            </tr>
            <?php
            if($trans != null){
              $no=0;
              foreach($trans as $val){
                $no++;
                ?>
              <tr>
                <td><?=$no?></td>
                <td><?=$val['nama_paket']?></td>
                <td><?=$val['harga']?></td>
                <td><?=$val['jumlah']?></td>
                <td><?=$val['harga']*$val['jumlah']?></td>
                <td>
                  <a href="transaksi/hapus/<?=$val['id_paket']?>" class="btn btn-danger" onclick="return('Hooh Tenan e')">Hapus</a>
                </td>
              </tr>
                <?php
              }
            
            ?>
          </table>
          <form action="/stransaksi" method="post">
              <tr>
                <td colspan="6">
                <div class="form-group">
                  <label for="pelanggan">Pilih Pelanggan</label>
                  <select name="pelanggan" id="pelanggan" class="form-control" required>
                    <option value="">==Pilih Nama Pelanggan==</option>
                    <?php
                        foreach($pelanggan as $keyp => $valp){
                            ?>
                        <option value="<?=$valp['id_pelanggan']?>"><?=$valp['nama']?></option>
                            <?php
                        }  
                      ?>
                  </select> 
                </div>
                <div class="form-group">
                  <label for="tanggal">Tanggal Ambil</label>
                  <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>
                      </tr>
                      <tr>
                          <td colspan="6">
                            <button type="submit" class="btn btn-success">Simpan</button>
                          </td>
                      </tr>
                      </form>
                      <?php
                    }
                  ?>
               </table>
            </div>
          </div>
        </div>
      </div>
    <?php if(!empty(session()->getFlashdata('sukses'))) : ?>
      <div class="alert alert-success">
          <?php echo session()->getFlashdata('sukses');?>
      </div>
  <?php endif ?>
      </div?
<?=$this->endSection()?>