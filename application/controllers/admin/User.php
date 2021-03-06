<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
  }

  public function index()
  {
     $user = $this->user_model->listing();
     $data = array(  'judul'  => 'Daftar User',
                     'user'   => $user,
                     'isi'    => 'admin/user/list');
     $this->load->view('admin/layout/wrapper', $data, FALSE);

  }

  public function tambah()
  {
      $valid = $this->form_validation;
      $valid->set_rules('nama','Nama','required',
            array(   'required'  => 'Nama Harus Diisi'));

      $valid->set_rules('email','Email','required|valid_email',
            array(   'required'  => 'Password Harus Diisi',
                     'valid_email' => 'Format Email Tidak Benar'));

      $valid->set_rules('username','Username','required|is_unique[user.username]',
            array(   'required'  => 'Username Harus Diisi',
                     'is_unique' => 'Username <strong>'.$this->input->post('username'),
                                    '</strong> Sudah Ada. Buat username Baru'));

      $valid->set_rules('password','Password','required|min_length[6]',
            array(   'required'  => 'Password Harus Diisi',
                     'min_lenght' => 'Password Minimal 6 Karakter'));

      if($valid->run()=== FALSE)
      {
         $data = array(  'judul'  => 'Tambah User',
                         'isi'    => 'admin/user/tambah');
         $this->load->view('admin/layout/wrapper', $data, FALSE);
      }
      else
      {
         $i = $this->input;
         $data = array( 'nama'         => $i->post('nama'),
                        'email'        => $i->post('email'),
                        'username'     => $i->post('username'),
                        'password'     => sha1($i->post('password')),
                        'akses_level'  => $i->post('akses_level'),
                        'keterangan'   => $i->post('keterangan'));
         $this->user_model->tambah($data);
         $this->session->set_flashdata('sukses', 'Data Telah Ditambahkan');
         redirect(base_url('admin/user'),'refresh');
      }
  }

  public function edit($id_user)
  {
     $user = $this->user_model->detail($id_user);

      $valid = $this->form_validation;
      $valid->set_rules('nama','Nama','required',
            array(   'required'  => 'Nama Harus Diisi'));

      $valid->set_rules('email','Email','required|valid_email',
            array(   'required'  => 'Password Harus Diisi',
                     'valid_email' => 'Format Email Tidak Benar'));


      if($valid->run()=== FALSE)
      {
         $data = array( 'judul'  => 'Edit User',
                        'user'   => $user,
                        'isi'    => 'admin/user/edit');
         $this->load->view('admin/layout/wrapper', $data, FALSE);
      }
      else
      {
         $i = $this->input;
         if(strlen($i->post('password')) > 6 ) {
            $data = array( 'id_user'      => $id_user,
                           'nama'         => $i->post('nama'),
                           'email'        => $i->post('email'),
                           'password'     => sha1($i->post('password')),
                           'akses_level'  => $i->post('akses_level'),
                           'keterangan'   => $i->post('keterangan'));
         }
         else
         {
            $data = array( 'id_user'      => $id_user,
                           'nama'         => $i->post('nama'),
                           'email'        => $i->post('email'),
                           'akses_level'  => $i->post('akses_level'),
                           'keterangan'   => $i->post('keterangan'));
         }
         $this->user_model->edit($data);
         $this->session->set_flashdata('sukses', 'Data Telah Diedit');
         redirect(base_url('admin/user'),'refresh');
      }
  }

  public function delete($id_user)
  {
     if($this->session->userdata('username') == "" && $this->session->userdata('akses_level')=="")
     {
       $this->session->set_flashdata('sukses', 'Silahkan Login Dahulu');
       redirect(base_url('login'), 'refresh');
     }
     $data = array('id_user'  => $id_user);
     $this->user_model->delete($data);
     $this->session->set_flashdata('sukses', 'Data Telah Didelete');
     redirect(base_url('admin/user'),'refresh');

  }

}
