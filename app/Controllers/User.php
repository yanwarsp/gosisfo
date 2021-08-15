<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{

  protected $userModel;


  public function __construct()
  {

    $this->userModel = new UserModel();

    $this->session = session();
  }

  public function admin($username)
  {

    $data = [
      'title' => 'Dashboard',
      'username' => $this->userModel->getUsername($username),
      'roles' => $this->userModel->where(['roles' => 'admin'])->findAll()


    ];

    if (!$this->session->has('log')) {
      return redirect()->to('/login');
    }

    if ($this->session->get('roles') != 'admin') {
      if ($this->session->get('roles') == 'staff') {
        $this->session->setFlashdata('err', 'You cannot access admin page!');
        return redirect()->to('/user/staff' . '/' . $this->session->get('username'));
      } else if ($this->session->get('roles') == 'dosen') {
        $this->session->setFlashdata('err', 'You cannot access admin page!');
        return redirect()->to('/user/dosen' . '/' . $this->session->get('username'));
      }
    }

    return view('/pages/admin', $data);
  }

  public function dosen($username)
  {

    $data = [
      'title' => 'Dashboard',
      'username' => $this->userModel->getUsername($username)
    ];

    if (!$this->session->has('log')) {
      return redirect()->to('/login');
    }

    if ($this->session->get('roles') != 'dosen') {
      if ($this->session->get('roles') == 'staff') {
        $this->session->setFlashdata('err', 'You cannot access lecturer page!');
        return redirect()->to('/user/staff' . '/' . $this->session->get('username'));
      }
    }

    if (empty($data['username'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Profile ' . $username . ' not found.');
    }

    return view('/pages/dosen', $data);
  }

  public function staff($username)
  {

    $data = [
      'title' => 'Dashboard',
      'username' => $this->userModel->getUsername($username)
    ];

    if (!$this->session->has('log')) {
      return redirect()->to('/login');
    }

    if ($this->session->get('roles') != 'staff') {
      if ($this->session->get('roles') == 'dosen') {
        $this->session->setFlashdata('err', 'You cannot access staff page!');
        return redirect()->to('/user/dosen' . '/' . $this->session->get('username'));
      }
    }

    if (empty($data['username'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Profile ' . $username . ' not found.');
    }

    return view('/pages/staff', $data);
  }


  public function profile_dosen($username)
  {
    $data = [
      'title' => 'Profile',
      'username' => $this->userModel->getUsername($username),
      'institute' => [
        'Universitas Pembangunan Jaya', 'Universitas Pamulang', 'Binus University', 'Institut Teknologi Bandung', 'Univesitas Padjadjaran', 'Universitas Telkom Bandung', 'Universitas Pelita Harapan', 'IAIN Syarif Hidayatullah'
      ],
      'class' => [
        'Cyber Security', 'Programmming', 'Networking', 'Artificial Intelligence', 'Robotics'
      ]
    ];

    if (!$this->session->has('log')) {
      return redirect()->to('/login');
    }

    if ($this->session->get('roles') != 'dosen') {
      if ($this->session->get('roles') == 'staff') {
        $this->session->setFlashdata('err', 'You cannot access lecturer page!');
        return redirect()->to('/user/staff' . '/' . $this->session->get('username'));
      }
    }
    return view('profile/dosen', $data);
  }


  public function profile_staff($username)
  {
    $data = [
      'title' => 'Profile',
      'username' => $this->userModel->getUsername($username),
      'institute' => [
        'Universitas Pembangunan Jaya', 'Universitas Pamulang', 'Binus University', 'Insitut Teknologi Bandung', 'Univesitas Padjadjaran'
      ],
      'job' => [
        'Staff Admin', 'Accountant', 'Librarian', 'HRD', 'Supervisor', 'Staff BP'
      ]
    ];
    if (!$this->session->has('log')) {
      return redirect()->to('/login');
    }

    if ($this->session->get('roles') != 'staff') {
      if ($this->session->get('roles') == 'dosen') {
        $this->session->setFlashdata('err', 'You cannot access staff page!');
        return redirect()->to('/user/dosen' . '/' . $this->session->get('username'));
      }
    }
    return view('profile/staff', $data);
  }

  public function update_dosen($id)
  {
    if (!$this->validate([
      'name' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} name must be filled'
        ]
      ],
      'institute' => 'required',
      'job_desc' => 'required'
    ])) {

      session()->setFlashdata('err', 'Failed to update profile');

      if (session('roles') == 'admin') {
        return redirect()->to('user/list_dosen');
      }
      return redirect()->to('/user/dosen/' . $this->session->get('username') . '')->withInput();
    }

    $this->userModel->save([
      'id' => $id,
      'name' => $this->request->getVar('name'),
      'institute' => $this->request->getVar('institute'),
      'job_desc' => $this->request->getVar('job_desc')
    ]);

    session()->setFlashdata('msg', 'Profile Changed');

    if (session('roles') == 'admin') {
      return redirect()->to('user/list_dosen');
    }
    return redirect()->to('/user/dosen/' . $this->session->get('username') . '')->withInput();
  }

  public function update_staff($id)
  {
    if (!$this->validate([
      'name' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} name must be filled'
        ]
      ],
      'institute' => 'required',
      'job_desc' => 'required'
    ])) {

      session()->setFlashdata('err', 'Failed to update profile');

      if (session('roles') == 'admin') {
        return redirect()->to('user/list_staff');
      }
      return redirect()->to('/user/staff/' . $this->session->get('username') . '')->withInput();
    }

    $this->userModel->save([
      'id' => $id,
      'name' => $this->request->getVar('name'),
      'institute' => $this->request->getVar('institute'),
      'job_desc' => $this->request->getVar('job_desc')
    ]);

    session()->setFlashdata('msg', 'Profile Changed');

    if (session('roles') == 'admin') {
      return redirect()->to('user/list_staff');
    }
    return redirect()->to('/user/staff/' . $this->session->get('username') . '')->withInput();
  }


  public function listDosen()
  {
    $data = [
      'title' => 'Dosen List',
      'roles' => $this->userModel->where(['roles' => 'dosen'])->findAll()
    ];

    if (!$this->session->has('log')) {
      return redirect()->to('/login');
    }

    if ($this->session->get('roles') != 'admin') {
      if ($this->session->get('roles') == 'staff') {
        $this->session->setFlashdata('err', 'You cannot access admin page!');
        return redirect()->to('/user/staff' . '/' . $this->session->get('username'));
      } else if ($this->session->get('roles') == 'dosen') {
        $this->session->setFlashdata('err', 'You cannot access admin page!');
        return redirect()->to('/user/dosen' . '/' . $this->session->get('username'));
      }
    }



    return view('/components/list_dosen', $data);
  }

  public function listStaff()
  {
    $data = [
      'title' => 'Staff List',
      'roles' => $this->userModel->where(['roles' => 'staff'])->findAll()
    ];

    if (!$this->session->has('log')) {
      return redirect()->to('/login');
    }

    if ($this->session->get('roles') != 'admin') {
      if ($this->session->get('roles') == 'staff') {
        $this->session->setFlashdata('err', 'You cannot access admin page!');
        return redirect()->to('/user/staff' . '/' . $this->session->get('username'));
      } else if ($this->session->get('roles') == 'dosen') {
        $this->session->setFlashdata('err', 'You cannot access admin page!');
        return redirect()->to('/user/dosen' . '/' . $this->session->get('username'));
      }
    }


    return view('/components/list_staff', $data);
  }

  public function deleteDosen($id)
  {
    $this->userModel->where('id', $id);
    $this->userModel->delete();

    session()->setFlashdata('message', 'User deleted');

    return redirect()->to('/user/listDosen');
  }


  public function deleteStaff($id)
  {
    $this->userModel->where('id', $id);
    $this->userModel->delete();

    session()->setFlashdata('message', 'User deleted');

    return redirect()->to('/user/listStaff');
  }

  public function deleteAdmin($id)
  {
    $this->userModel->where('id', $id);
    $this->userModel->delete();

    session()->setFlashdata('message', 'User deleted');

    return redirect()->to('/user/admin' . '/' . $this->session->get('username'));
  }
}
