<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

  protected $table = 'auth_tbl';
  protected $primaryKey = 'id';
  protected $useTimestamps = true;

  protected $allowedFields = ['username', 'password', 'roles', 'name', 'institute', 'job_desc', 'created_at', 'updated_at'];

  public function getUsername($username = false)
  {
    if ($username == false) {
      return $this->findAll();
    }

    return $this->where(['username' => $username])->first();
  }
}
