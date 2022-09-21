<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller{

  protected  $request;

  public function index(){
    return view("tampil_login");
  }
  public function login(){
    $users = new UserModel();
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $dataUser = $users->where([
      'username' => $username,
    ])->first();
    d ($dataUser);
    if ($dataUser) {
      if (password_verify($password,$dataUser['password'])) {
        session()->set(
          [
            'username'=>$dataUser['username'],
            'nama'=>$dataUser['nama'],
            'logged_in'=>true,
            'id_user'=>$dataUser['id_user'],
            'hak_akses'=>$dataUser['hak_akses']
          ]
        );
        return $this->response->redirect('/home');
      } else {
        session()->setFlashdata('eror','username password salah');
        return $this->response->redirect('/');
      }
    } else{
      session()->setFlashdata('eror','username tidak ditemukan');
      return $this->response->redirect('/');
    }
  }
  function logout(){
    session()->destroy();
    return $this->response->redirect('/');
  }
  public function tampil(){
    return view('tampilan_login2');
  }
}