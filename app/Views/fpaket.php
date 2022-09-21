<?=$this->extend('/componen/admin')?>
<?=$this->section('title')?>

<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="card">
    <div class="card-header bg-info">
        From Input Paket
    </div>
    <form action="/spaket" method="post">
        <div class="card">
            <div class="form-group">
                <label for="nama_paket" class="from-label">NAMA PAKET</label>
                <input type="text" name="nama_paket" id="nama_paket" class="form-control">
            </div>
            <div class="from-group">
                <label for="satuan" class="from-label">SATUAN</label>
                <input type="text" name="satuan" class="form-control" id="satuan">
            </div>
            <div class="form-group">
                <label for="harga" class="from-label">HARGA</label>
                <input type="text" name="harga" class="form-control">
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" value="Kirim" class="btn btn-info">
            <input type="reset" value="Kembali" class="btn btn-secondary">
        </div>
</div>
<?=$this->endSection()?>