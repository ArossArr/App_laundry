<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TransaksiModel;
use App\Models\PaketModel;
use App\Models\PelangganModel;
use App\Models\DetailModel;
use CodeIgniter\Database\SQLSRV\Result;
class Transaksi extends Controller{
  protected $pelanggans, $pakets, $transaksi, $detail, $session, $db;

  function __construct(){
    $this->db = \Config\Database::connect();
    $this->pelanggans = new PelangganModel();
    $this->pakets = new PaketModel();
    $this->transaksi = new TransaksiModel();
    $this->detail = new DetailModel();
    $this->session = session();
  }
  public function tampil(){
    $data['pelanggan'] = $this->pelanggans->findAll();
    $data['paket'] = $this->pakets->findAll();
    if(session('cart') !=null){
      $data['trans'] = array_values(session('cart'));
    } else {
      $data['trans'] = null;
    }
    return view('tampil_transaksi',$data);
  }
  private function cek($id){
    $cart = array_values(session('cart'));
    for($i=0;$i<count(session('cart'));$i++){
      if($cart[$i]['id_paket']==$id){
        return $i;
      }
    }
    return -1;
  }
   public function addcart(){
    $id = $this->request->getPost('paket');
    $jumlah = $this->request->getPost('jumlah');
    if ($jumlah==0){
      return redirect('transaksi')->with('sukses','data gagal ditambahkan, Jumlah tidak boleh 0');
    }
    $paket = $this->pakets->find($id);
    if ($paket!=null){
    $isi = array(
      'id_paket'=>$id,
      'nama_paket'=>$paket['nama_paket'],
      'harga'=>$paket['harga'],
      'jumlah'=>$jumlah
    );
    if($this->session->has('cart')){
      $index = $this->cek($id);
      $cart = array_values(session('cart'));
      if($index == -1){
        array_push($cart,$isi);
      } else {
        $cart[$index]['jumlah'] += $jumlah;
      }
      $this->session->set('cart',$cart);
    } else {
      $this->session->set('cart',array($isi));
    }
    return redirect('transaksi')->with('sukses','Ws nambah');
   } else {
    return redirect('transaksi')->with('sukses','data gagal ditambahkan');
   }
}

   public function hapusCart($id){
    $cart = array_values(session('cart'));
    $index = $this->cek($id);
    unset($cart[$index]);
    $this->session->set('cart',$cart);
    return redirect('transaksi')->with('sukses','data dadi dihapus');
   }
   public function simpan(){
    if (session('cart') !=null){
      if($this->session->get('id_user')!=null){
    $datatrans = array(
      'id_pelanggan'=>$this->request->getPost('pelanggan'),
      'tanggal_masuk'=>date('Y/m/d H:i:s'),
      'tanggal_ambil'=>$this->request->getPost('tanggal'),
      'id_user'=>$this->session->get('id_user')
    );
    $id = $this->transaksi->insert($datatrans);
    $cart = array_values(session('cart'));
    foreach ($cart as $val) {
      $datadetail = array (
        'id_transaksi'=>$id,
        'id_paket'=>$val['id_paket'],
        'jumlah'=>$val['jumlah']
      );
      $this->detail->insert($datadetail);
    }
    $this->session->remove('cart');
      return redirect('transaksi')->with('sukses','nyimpen');
    } else {
      return redirect('transaksi')->with('sukses','ra iso');
    }
  }else {
    return redirect('transaksi')->with('sukses','gagal');
  }
}
  public function laporan(){
    $query = $this->db->query('select a.*,b.* from tbtransaksi a,tbpelanggan b where a.id_pelanggan = b.id_pelanggan and deleted=0');
    $result = $query->getResultArray();
    $data['trans'] = $result;

    return view('tampil_laporan',$data);
  }

  public function ambil($id){
    //$this->pelanggans->delete($id);
    $data = array('status'=>1,);
  //dd($data);
  $this->transaksi->update($id,$data);
  session()->setFlashdata('message','Ws Diambil');
  return redirect('laporan');
  }
  public function detail($id){
    $query = $this->db->query("select a.*,b.* from tbdetail a,tbpaket b where a.id_paket = b.id_paket and a.id_transaksi=$id");
    $result = $query->getResultArray();
    $no=1;
    $data='<tr>
    <th>No.</th>
    <th>Paket</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Sub Total</th>
    </tr>';
    foreach ($result as $value){
      #code
      $data = $data. '<tr><td>'.$no.'</td><td>'.$value['nama_paket'].'</td><td>'.$value['harga'].'</td><td>'.$value['jumlah'].'</td><td>'.$value['jumlah']*$value['harga'].'</td></td>';
      $no++;
    }
    echo $data;
  }
  public function delete($id){
    $data = array('deleted'=>1,
  );
    $this->transaksi->update($id,$data);
    session()->setFlashdata('sukses','laundry dihapus');
    return redirect('laporan');
  }
  public function filter(){
    $status = $this->request->getPost('status');
    if($status == "" || $status == null){
      $query = $this->db->query('select a.*,b.* from tbtransaksi a,tbpelanggan b where a.id_pelanggan = b.id_pelanggan');
    } else {
      $query =$this->db->query("select a.*,b.* from tbtransaksi a,tbpelanggan b where a.id_pelanggan = b.id_pelanggan and a.status='$status'");
    }
    $result = $query->getResultArray();
    $data['trans'] = $result;
    return view('tampil_laporan',$data);
  }
}