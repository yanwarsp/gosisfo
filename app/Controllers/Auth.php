<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AuthModel;


class Auth extends BaseController
{
  protected $userModel;



  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->authModel = new AuthModel();
  }

  public function valid_register()
  {

    if (!$this->validate([
      'username' => [
        'rules' => 'required|is_unique[auth_tbl.username]',
        'errors' => [
          'required' => '{field} required.',
          'is_unique' => '{field} not available.'
        ]
      ],
      'password' => [
        'rules' => 'required|min_length[5]',
        'errors' => [
          'required' => '{field} required',
          'min_length' => '{field} minimal 8 character'
        ]
      ],
      'roles' => 'required'
    ])) {
      session()->setFlashdata('err', 'Failed to create account.');
      return redirect()->to('/register')->withInput();
    }

    $this->userModel->save([
      'username' => $this->request->getVar('username'),
      'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
      'roles' => $this->request->getVar('roles')
    ]);


    session()->setFlashdata('msg', 'Account created!');

    return redirect()->to('/login');
  }

  public function valid_login()
  {

    $table = 'auth_tbl';
    $username = $this->request->getVar('username');
    $password = $this->request->getVar('password');
    $row = $this->authModel->get_data_login($username, $table);

    if ($row == NULL) {
      session()->setFlashdata('err', 'Invalid username.');
      return redirect()->to('/login');
    }

    if (password_verify($password, $row->password)) {
      $data = [
        'log' => TRUE,
        'username' => $row->username,
        'roles' => $row->roles
      ];

      session()->set($data);
      session()->setFlashdata('msg', 'Login succeed!');
      return redirect()->to('/user/' . $data['roles'] . '/' . $data['username']);
    }

    session()->setFlashdata('err', 'Invalid password');
    return redirect()->to('/login');
  }

  public function logout()
  {

    $session = session();
    $session->destroy();
    $session->setFlashdata('msg', 'Logout succeed');

    return redirect()->to('/login');
  }
}
