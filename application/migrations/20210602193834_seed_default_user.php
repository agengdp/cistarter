<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_seed_default_user extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $user_table = "users";
	protected $role_table = "roles";
	protected $user_has_role_table = "user_has_roles";
	
	public function up()
	{
		/**
		 * Create root user
		 * @var array
		 */
		$admin = [
			'username'		=> 'admin',
			'name'			=> 'Administrator',
			'password'		=> password_hash('admin', PASSWORD_DEFAULT),
			'email'			=> 'mail@admin.com',
			'status'		=> 1,
			'phone'			=> '08123456708'
		];

		$this->db->insert($this->user_table, $admin);
		$admin_id = $this->db->insert_id();

		/**
		 * Create root user
		 * @var array
		 */
		$editor = [
			'username'		=> 'editor',
			'name'			=> 'Editor',
			'password'		=> password_hash('editor', PASSWORD_DEFAULT),
			'email'			=> 'mail@editor.com',
			'status'		=> 1,
			'phone'			=> '08123456708'
		];

		$this->db->insert($this->user_table, $editor);
		$editor_id = $this->db->insert_id();


		/**
		 * Create roles
		 * @var array
		 */
		$roles = [
			['name' => 'admin', 'status' => 1],
			['name' => 'editor', 'status' => 1],
		];

		$this->db->insert_batch($this->role_table, $roles);
		$admin_role = $this->db->get_where('roles', array('name' => 'admin'))->row();
		$editor_role = $this->db->get_where('roles', array('name' => 'editor'))->row();

		/**
		 * Sync role user
		 */
		$this->db->insert($this->user_has_role_table, [
			'user_id' 	=> $admin_id,
			'role_id' 	=> $admin_role->id,
			'status'	=> 1
		]);

		$this->db->insert($this->user_has_role_table, [
			'user_id' 	=> $editor_id,
			'role_id' 	=> $editor_role->id,
			'status'	=> 1
		]);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>
