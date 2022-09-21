<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PaketModel;
class Paket extends Controller{
    protected $pakets;
    function __construct(){
        $this->pakets = new PaketModel(); 
    }
    public function tampil(){
        $data['paket'] = $this->pakets->findAll();
        return view('tampilan_paket',$data);
    }
    public function form(){
        return view('fpaket');
    }
    public function save(){
        $this->pakets->insert([
            'nama_paket'=>$this->request->getPost('nama_paket'),
            'satuan'=>$this->request->getPost('satuan'),
            'harga'=>$this->request->getPost('harga')
        ]);
        return redirect('paket')->with('sukses','Simpan Berhasil');
    }
    public function edit($id){
        $data = array('nama_paket'=>$this->request->getPost('nama_paket'),
            'satuan'=>$this->request->getPost('satuan'),
            'harga'=>$this->request->getPost('harga')
        );
        $this->pakets->update($id,$data);
        session()->setFlashdata('sukses','Update ws sampee');
        return redirect('paket')->with('sukses','update berhasil');
    }
    public function delete($id){
        $this->pakets->delete($id);
        return redirect('paket');
    } 
}