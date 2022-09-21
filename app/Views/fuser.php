<?=$this->extend('/componen/admin')?>
<?=$this->section('title')?>
cobaba
<?= $this->endSection()?>
<?= $this->section('content')?>
<div class="card">
    <div class="card-header bg-info">
       <b>Login</b>
    </div>
    <form action="/suser" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="password">
            </div>
            <div class="form-label">
                <label for="hak_akses" class="form-label">Hak_akses</label><br>
                <select name="hak_akses" id="hak_akses">
                    <option value="ADMIN">ADMIN</option>
                    <option value="KASIR">KASIR</option>
                </select>
            </div><br>
        </div>
        <div class="card-footer">
            <input type="submit" value="Kirim" class="btn btn-info">
            <input type="reset" value="Kembali" class="btn btn-secondary">
        </div>
</div>
<?=$this->endSection()?>