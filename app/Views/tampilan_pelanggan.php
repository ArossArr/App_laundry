<?=$this->extend('/componen/admin')?>
<?=$this->section('content')?>
<div class="card">
    <div class="card-header bg-info"><h3>Data Pelanggan </h3>
    <a href="/form" class="btn btn-primary">Pelanggan Baru</a></div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                 <th>No</th>
                 <th>Nama</th>
                 <th>Alamat</th>
                 <th>No HP</th>
                 <th>Aksi</th>
            </tr>
            <?php
                $no=0;
                foreach($pelanggan as $row){
                    $data = $row['id_pelanggan'].",".$row['nama'].",".$row['alamat'].",".$row['no_hp'].",".base_url('pelanggan/edit/'.$row['id_pelanggan']);
                    $no++;
                ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$row['nama']?></td>
                        <td><?=$row['alamat']?></td>
                        <td><?=$row['no_hp']?></td>
                        <td>
                            <a href="#" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#modalEdit" data-pelanggan="<?=$data?>">Edit</a>
                            <a href="<?=base_url('pelanggan/delete/'. $row['id_pelanggan'])?>" onclick="return confirm('yakin dek ?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                 <?php
                }
            ?>
        </table>
    </div>
</div>
<div class="modal fade" id="modalEdit" tab-index="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit Pelanggan</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form id="fpelanggan" action="" method="post">
                <div class="form-group">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control">
                </div>
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                </div>
                <div class="form-group">
                    <label for="no_hp" class="form-label">No_Hp</label>
                    <input type="number" name="no_hp" id="no_hp" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php if(!empty(session()->getFlashdata('message'))) : ?>

    <div class="alert alert-success">
        <?php echo session()->getFlashdata('message');?>
    </div>
    
<?php endif ?>
<?=$this->endSection()?>
<?=$this->section('script')?>
    <script>
        $(document).ready(function(){
            $("#modalEdit").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('pelanggan');
                if (data != ""){
                    const barisdata = data.split(",");
                    $("#nama").val(barisdata[1]);
                    $("#alamat").val(barisdata[2]);
                    $("#no_hp").val(barisdata[3]);
                    $("#fpelanggan").attr('action',barisdata[4]);
                }
            });
        })
    </script>
<?=$this->endSection()?>