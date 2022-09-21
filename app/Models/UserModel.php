<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table      = 'tbuser';
    protected $primaryKey = 'id_user';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nama','username','password','hak_akses'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}