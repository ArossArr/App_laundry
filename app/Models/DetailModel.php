<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model{
    protected $table      = 'tbdetail';
    protected $primaryKey = 'id_detail';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_transaksi','id_paket','jumlah'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}