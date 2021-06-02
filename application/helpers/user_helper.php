<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('user'))
{
    function user()
    {
        $ci = &get_instance();
        $ci->load->library('session');
        
        $user = $ci->session->userdata();
        return $user['user'];
    }   
}
