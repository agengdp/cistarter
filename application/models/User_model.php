<?php 

class User_model extends CI_Model{

	/**
	 * User table
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Find user by username
	 *
	 * @param string $username
	 * @return array
	 */
	public function findByUsername($username){

		$this->db->select('usr.*, rol.name as role_name, rol.id as role_id')->from($this->table . ' usr');
		$this->db->join('user_has_roles uhr', 'uhr.user_id = usr.id');
		$this->db->join('roles rol', 'rol.id = uhr.role_id');
		$this->db->where('usr.username', $username);
		return $this->db->get()->row_array();

	}

}
