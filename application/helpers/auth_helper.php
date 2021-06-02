<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('auth'))
{
    /**
     * Authentication helper
     * Check if user has been authenticated
     *
     * @param boolean $redirect if true redirect to auth page
     * @param string $role the user role
     * @return void
     */
    function auth( $redirect = false, $roles = array())
    {
        $ci = &get_instance();
        $ci->load->library('session');
        if ($ci->session->userdata('login') != true) {
            if($redirect == true){
                return redirect(base_url('auth/login'));
            }
            return false;
        }

        if(!empty($roles) && $ci->session->userdata('user')->role_name != 'root'){

            if(!in_array($ci->session->userdata('user')->role_name, $roles)){
                if($redirect == true){
                    return redirect(base_url('auth/login'));
                }
                return false;
            }
        }
        return true;
    }   
}
