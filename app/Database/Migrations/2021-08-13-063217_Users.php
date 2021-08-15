<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'				=> [
				'type'			=> 'INT',
				'constraint'	 => '11',
				'auto_increment' => true
			],
			'username'          => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'			=> false,
			],
			'password'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'			=> false,
			],
			'roles'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '10',
				'null'			=> false,
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'			=> true,
			],
			'institute'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'			=> true,
			],
			'job_desc'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
				'null'			=> true,
			],
			'created_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			],
			'updated_at' => [
				'type'           => 'DATETIME',
				'null'       	 => true,
			]
		]);
		$this->forge->addPrimaryKey('id', true);
		$this->forge->createTable('auth_tbl');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('auth_tbl');
	}
}
