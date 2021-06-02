<?php 

class Auth extends MY_Controller{

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Authorization
	 *
	 * @return void
	 */
	public function index(){
		if(!$this->input->post()){
			if (auth(true)){
				return redirect('/');
			}
			echo 'You are not allowed to perform GET request';
			die();
		}

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() === false){
			$message = [
				'status'		=> 'error',
				'message'		=> 'Cannot validate username & password',
				'data'			=> validation_errors()
			];
			$this->session->set_flashdata('error', $data);
			return redirect($_SERVER['HTTP_REFERER'] . '/?username=' . $this->input->post('username'));
		}

		$this->load->model('user_model');
		$user = $this->user_model->findByUsername($username);

		if (empty($user)){
			$message = [
				'status'		=> 'error',
				'message'		=> 'User tidak ditemukan',
				'data'			=> validation_errors()
			];
			$this->session->set_flashdata('error', $data);
			return redirect($_SERVER['HTTP_REFERER'] . '/?username=' . $this->input->post('username'));
		}

		if(password_verify($this->input->post('password'), $user['password'])){
			$message = [
				'status'		=> 'error',
				'message'		=> 'Password tidak sesuai',
				'data'			=> validation_errors()
			];
			$this->session->set_flashdata('error', $data);
			return redirect($_SERVER['HTTP_REFERER'] . '/?username=' . $this->input->post('username'));
		}

		$data = [
			'login'		=> true,
			'user'		=> $user,
			'time'		=> time()
		];

		$this->session->set_userdata($data);
		return redirect('/');

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
