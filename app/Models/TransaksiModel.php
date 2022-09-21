<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model{
    protected $table      = 'tbtransaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_pelanggan','tanggal_masuk','tanggal_ambil','id_user','status','deleted'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}