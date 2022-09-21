<?=$this->extend('/componen/admin')?>
<?=$this->section('content')?>
<div class="card">
    <div class="card-header bg-info"><h3>Data </h3>
    <a href="/fpaket" class="btn btn-primary">Pesan Paket</a></div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Paket Nama</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
                <?php
                $no=0;
                foreach($paket as $row){
                    $data = $row['id_paket'].",".$row['nama_paket'].",".$row['satuan'].",".$row['harga'].",".base_url('paket/edit/'.$row['id_paket']);
                    $no++;
                    ?>
                    <tr>
                        <td><?=$no?></td>
                        <td><?=$row['nama_paket']?></td>
                        <td><?=$row['satuan']?></td>
                        <td><?=$row['harga']?></td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit" data-paket="<?=$data?>">Edit</a>
                            <a href="<?=base_url('paket/delete/'. $row['id_paket'])?>" onclick="return confirm('yakin dek ?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    </div>