<div class="card">
    <div class="card-header bg-info text-center">MENU</div>
    <div class="list-group">
        <?php
            if(session('hak_akses')=="KASIR"){
                ?>        
                <a href="/transaksi" class="list-group-item list-group-action lis-group-item-primary">Transaksi</a>
                <a href="/laporan" class="list-group-item list-group-action lis-group-item-primary">Laporan</a>
                 <?php if(!empty(session()->get('logged_in'))) : ?>
                    <a href="/logout" class="list-group-item list-group-action list-group-item-primary">logout</a>
                <?php endif?>
                <?php
            }else {
                ?>
                <a href="/user" class="list-group-item list-group-action lis-group-item-primary">Petugas</a>
            <a href="/pelanggan" class="list-group-item list-group-action lis-group-item-primary">Pelanggan</a>
            <a href="/paket" class="list-group-item list-group-action lis-group-item-primary">Paket</a>
            <a href="/transaksi" class="list-group-item list-group-action lis-group-item-primary">Transaksi</a>
            <a href="/laporan" class="list-group-item list-group-action lis-group-item-primary">Laporan</a>
            <?php if(!empty(session()->get('logged_in'))) : ?>
                <a href="/logout" class="list-group-item list-group-action list-group-item-primary">logout</a>
            <?php endif?>
            <?php
            }?>
            
    </div>
</div>