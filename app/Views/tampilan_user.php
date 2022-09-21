<?=$this->extend('/componen/admin')?>
<?=$this->section('content')?>
<div class="card">
    <div class="card-header bg-info"><h3>Petugas</h3>
    <a href="/fuser" class="btn btn-primary">User Baru</a></div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Hak Akses</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=0;
            foreach ($user as $row){
                $data = $row['id_user'].",".$row['nama'].",".$row['username'].",".$row['password'].",".$row['hak_akses'].",".base_url('user/edit/'.$row['id_user']);
                $no++;
                ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$row['nama']?></td>
                        <td><?=$row['username']?></td>
                        <td><?=$row['password']?></td>
                        <td><?=$row['hak_akses']?></td>
                    <td>
                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" data-user="<?=$data?>">Edit</a>    
                        <a href="<?=base_url('user/delete/'. $row['id_user'])?>" onclick="return confirm('yakin dek ?')" class="btn btn-danger" class="btn btn-danger">Hapus</a>
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
                    <h5>Edit Petugas</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form id="fuser" action="" method="post">
                    <div class="form-group">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-label">
                        <label for="hak_akses" class="form-label">Hak Akses</label><br>
                        <select name="hak_akses" id="hak_akses">
                            <option value="ADMIN">ADMIN</option>
                            <option value="KASIR">KASIR</option>
                        </select>
                 </div><br>
                    <div class="modal-footer">
                        <button type="submit"  class="btn btn-primary">Simpan</button>
                        <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if(!empty(session()->getFlashdata('sukses'))) : ?>

<div class="alert alert-success">
    <?php echo session()->getFlashdata('sukses');?>
</div>
<?php endif ?>
<?=$this->endSection()?>
<?=$this->section('script')?>
    <script>
        $(document).ready(function(){
            $("#modalEdit").on('show.bs.modal',function(event){
                var button = $(event.relatedTarget);
                var data = button.data('user');
                if (data != ""){
                    const barisdata = data.split(",");
                    $("#nama").val(barisdata[1]);
                    $("#username").val(barisdata[2]);
                    $("#password").val(barisdata[3]);
                    $("#hak_akses").val(barisdata[4]);
                    $("#fuser").attr('action',barisdata[5]);
                }
            });
        })
    </script>
<?=$this->endSection()?>