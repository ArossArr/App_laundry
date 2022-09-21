<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;
class User extends Controller{
    protected $users;
    function __construct(){
        $this->users = new UserModel();
    }
    public function tampil(){
        $data['user'] = $this->users->findAll();
        return view('tampilan_user',$data);
    }
    public function form(){
        return view('fuser');
    }
    public function save(){
        $this->users->insert([
            'nama'=>$this->request->getPost('nama'),
            'username'=>$this->request->getPost('username'),
            'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            'hak_akses'=>$this->request->getPost('hak_akses')
        ]);
        return redirect('user')->with('sukses','Simpan Berhasil');
        
    }
    public function edit($id){
        $data = array('nama'=>$this->request->getPost('nama'),
                    'username'=>$this->request->getPost('username'),
                    'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
                    'hak_akses'=>$this->request->getPost('hak_akses')
    );
    $this->users->update($id,$data);
    session()->setFlashdata('sukses','Update ws sampee');
    return redirect('user')->with('sukses','update berhasil');
    }  
    public function delete($id){
        $this->users->delete($id);
        session()->setFlashdata('sukses','ws dihapus');
        return redirect('user');
    }

}