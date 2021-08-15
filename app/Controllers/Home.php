<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Session\Session;

class Home extends BaseController
{


	protected $userModel;

	public function __construct()
	{

		$this->userModel = new UserModel();
		$this->session = session();
	}

	public function index()
	{

		$data = [
			'title' => 'Home'
		];

		return view('welcome_message', $data);
	}

	public function login()
	{

		$data = [
			'title' => 'Login'
		];

		if ($this->session->has('log')) {
			$this->session->destroy();
		}
		return view('pages/login', $data);
	}

	public function register()
	{

		$data = [
			'title' => 'Register'
		];

		return view('pages/register', $data);
	}
}
