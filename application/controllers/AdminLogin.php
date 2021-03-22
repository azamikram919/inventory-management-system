<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/3/2021
 * Time: 6:04 PM
 */
class AdminLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_m');

    }

    public function login()
    {
     //   $this->logged_in();

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $user = $this->Admin_m->admin_login($email, $password);
            if (!empty($user)) {
                /**
                 * Set user session
                 */
                $logged_in_sess = array(
                    'id' => $user->id,
                    'username'  => $user->username,
                    'email'     => $user->email,
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($logged_in_sess);
                return redirect('/');
            } else {
                $this->session->set_flashdata('msg', 'Your email address/password are incorrect Please try Again');
                return redirect('login');
            }
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        return redirect('login');
    }


}

?>