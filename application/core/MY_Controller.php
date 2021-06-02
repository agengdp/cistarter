<?php 

class MY_Controller extends CI_Controller{

	/**
	 * Constructor
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Perform sending email
	 * @param  array $data email data
	 * @return void
	 */
	public function send_mail($data){

        $config = array(
        	'protocol'		=> getenv('SMTP_PROTOCOL'),
        	'smtp_host'		=> getenv('SMTP_HOST'),
        	'smtp_port'		=> getenv('SMTP_PORT'),
        	'smtp_user'		=> getenv('SMTP_USER'),
        	'smtp_pass'		=> getenv('SMTP_PASS'),
        	'smtp_crypto'	=> 'tls',
        	'newline'		=> "\r\n",
        	'crlf'			=> "\r\n",
        	'mailtype'		=> 'html',
        	'charset'		=> 'utf-8',
        	'useragent'		=> 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.100 Safari/537.36'
        );
        
        $this->email->initialize($config);
        $this->email->from(getenv('MAIL_FROM'), getenv('APP_NAME'));
        $this->email->to($data['to']);
        $this->email->subject($data['subject']);
        $this->email->message($data['message']);
        $this->email->send();
	}

	/**
	 * Render layout
	 * @param  string $layout layout style {app | blank}
	 * @param  array  $data   layout data
	 * @return void
	 */
	public function render($layout, $data = array()){

		/**
		 * Field wajib yang dimiliki setiap template
		 * @var array
		 */
		$args = [
			'title'		=> getenv('APP_NAME'),
			'menu'		=> '',
			'sub_menu'	=> ''
		];

		$data = array_merge($args, $data);

		$this->load->view('layouts/' .$layout, $data);
	}


	/**
	 * Set pagination
	 * @param string $url      url
	 * @param int $total_rows  jumlah row
	 * @param int $per_page    per halaman ada berapa
	 * @param int $uri_segment uri segment ke berapa 
	 * @param int $num_links   
	 */
	public function set_pagination($url, $total_rows, $per_page, $uri_segment, $num_links){
        $this->load->library('pagination'); //load pagination library

		$settings['base_url'] = $url;
        $settings['total_rows'] = $total_rows;
        $settings['per_page'] = $per_page;
        $settings['uri_segment'] = $uri_segment;
        $settings['attributes'] = array('class' => 'page-link');

        // custom paging configuration
        $settings['num_links'] = $num_links;
        $settings['use_page_numbers'] = TRUE;
        $settings['reuse_query_string'] = TRUE;

        $settings['full_tag_open'] = '<nav><ul class="pagination">';
        $settings['full_tag_close'] = '</ul></nav>';

        $settings['first_link'] = 'First';
        $settings['first_tag_open'] = '<li class="page-item nextlink firstlink">';
        $settings['first_tag_close'] = '</li>';

        $settings['last_link'] = 'Last';
        $settings['last_tag_open'] = '<li class="page-item prevlink lastlink">';
        $settings['last_tag_close'] = '</li>';

        $settings['next_link'] = '>';
        $settings['next_tag_open'] = '<li class="page-item nextlink">';
        $settings['next_tag_close'] = '</li>';

        $settings['prev_link'] = '<';
        $settings['prev_tag_open'] = '<li class="page-item prevlink">';
        $settings['prev_tag_close'] = '</li>';

        $settings['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $settings['cur_tag_close'] = '</a></li>';

        $settings['num_tag_open'] = '<li class="page-item">';
        $settings['num_tag_close'] = '</li>';

        return $this->pagination->initialize($settings);
	}

	/**
	 * Send success json response
	 *
	 * @param array $data
	 * @return json
	 */
	public function successResponse($data){

		$response = array(
			'status'		=> 'success'
		);

		$response = array_merge($response, $data);

		return $this->output->set_content_type('application/json')
            ->set_output(json_encode($response));
	}

	/**
	 * Send error json response
	 *
	 * @param array $data
	 * @return json
	 */
	public function errorResponse($data){

		$response = array(
			'status'		=> 'error'
		);

		$response = array_merge($response, $data);

		return $this->output->set_content_type('application/json')
            ->set_output(json_encode($response));
	}
}
