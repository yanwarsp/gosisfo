<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{

  public function get_data_login($username, $tbl)
  {
    $builder = $this->db->table($tbl);
    $builder->where('username', $username);
    $log = $builder->get()->getRow();
    return $log;
  }
  public function getUsername($username = false)
  {
    if ($username == false) {
      return $this->findAll();
    }

    return $this->where(['username' => $username])->first();
  }
}
