<?php 
namespace App\Models;

use CodeIgniter\Model;

class PaketModel extends Model{
    protected $table      = 'tbpaket';
    protected $primaryKey = 'id_paket';
    protected $useAutoIncrement = true;
    protected $allowedFields =  ['nama_paket','satuan','harga'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}