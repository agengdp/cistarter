<?php 

class Auth extends MY_Controller{

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
	}

	/**
	 * Login Page
	 *
	 * @return void
	 */
	public function login(){

		$data = [
			'title'			=> 'Login',
			'content'		=> 'pages/login'
		];

		return $this->render('blank', $data);
	}

	/**
	 * Do Logout
	 *
	 * @return void
	 */
	public function logout(){
		$this->session->sess_destroy();
        redirect(base_url('auth/login'));
	}
}
