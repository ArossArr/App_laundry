<?=$this->extend('/componen/admin')?>
<?=$this->section('title')?>

<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="card">
    <div class="card-header bg-info">
       <b> From Input Pelanggan</b> 
    </div>
    <form action="/spelanggan" method="post">
        <div class="card">

            <div class="form-group">
                <label for="nama" class="from-label">NAMA</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="alamat" class="from-label">ALAMAT</label>
                <input type="text" name="alamat" class="form-control" id="alamat">
            </div>
            <div class="form-group">
                <label for="no_hp" class="from-label">NOMER</label>
                <input type="number" name="no_hp" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Kirim" class="btn btn-info">
            <input type="reset" value="Kembali" class="btn btn-secondary">
        </div>
</div>
<?=$this->endSection()?>