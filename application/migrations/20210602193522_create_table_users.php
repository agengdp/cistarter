<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_users extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "users";

	public function up()
	{
		$this->dbforge->add_field('id');
		$this->dbforge->add_field(array('username' => array('type' => 'VARCHAR(255)')));
		$this->dbforge->add_field(array('name' => array('type' => 'VARCHAR(255)')));
		$this->dbforge->add_field(array('email' => array('type' => 'VARCHAR(255)')));
		$this->dbforge->add_field(array('password' => array('type' => 'VARCHAR(255)')));
		$this->dbforge->add_field(array('phone' => array('type' => 'VARCHAR(255)')));
		$this->dbforge->add_field(array('status' => array('type' => 'INT')));
		$this->dbforge->add_field("`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->add_field("`updated_at` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP");
		$this->dbforge->create_table($this->_table_name, TRUE);
	}

	public function down()
	{
		$this->dbforge->drop_table($this->_table_name, TRUE);
	}

}

?>
