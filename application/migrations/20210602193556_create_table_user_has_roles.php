<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_table_user_has_roles extends CI_Migration {

	/**
	 * Name of the table to be used in this migration!
	 *
	 * @var string
	 */
	protected $_table_name = "user_has_roles";

	public function up()
	{
		$this->dbforge->add_field('id');
		$this->dbforge->add_field(array('user_id' => array('type' => 'INT')));
		$this->dbforge->add_field(array('role_id' => array('type' => 'INT')));
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
