<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PelangganModel;
class Pelanggan extends Controller{
    protected $pelanggans;

    function __construct(){
        $this->pelanggans = new PelangganModel();
    }
    public function tampil(){
        $data['pelanggan'] = $this->pelanggans->findAll();
        return view('tampilan_pelanggan',$data);
    }
    public function form(){
        return view('fpelanggan');
    }
    public function save(){
        $this->pelanggans->insert([
            'nama'=>$this->request->getPost('nama'),
            'alamat'=>$this->request->getPost('alamat'),
            'no_hp'=>$this->request->getPost('no_hp')
        ]);
        return redirect('pelanggan')->with('message','Simpan Berhasil');
    }
    public function delete($id){
        $this->pelanggans->delete($id);
        return redirect('pelanggan');
    }                
    public function edit($id){
        $data = array('nama'=>$this->request->getPost('nama'),
                    'alamat'=>$this->request->getPost('alamat'),
                    'no_hp'=>$this->request->getPost('no_hp')
    );
    $this->pelanggans->update($id,$data);
    session()->setFlashdata('message','Update ws sampee');
    return redirect('pelanggan')->with('message','update berhasil');
    }  

}