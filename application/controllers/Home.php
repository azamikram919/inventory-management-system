<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $data['Page Title'] = 'Admin Dashboard';
        if (!$this->session->userdata('id')) {
            return redirect('login');
        }

        $this->load->model('Admin_m');
    }

    public function index()
    {
        $data['total_products'] = $this->Admin_m->count_all_products();
        $data['total_orders'] = $this->Admin_m->count_all_orders();
        $data['total_users'] = $this->Admin_m->get_all_users();
        $data['total_stores'] = $this->Admin_m->count_all_stores(1);

        $user_id = $this->session->userdata('id');
        $is_admin = ($user_id > 0) ? true : false;
        $data['is_admin'] = $is_admin;

        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('index', $data);
        $this->load->view('partials/bottom');
    }

    public function adminGetAllUsers()
    {
        $config = [                        //pagination
            'base_url' => base_url('admin/get-all-users'),
            'per_page' => 5,
            'total_rows' => $this->Admin_m->get_user_list_data(),
            'full_tag_open' => "<ul class='pagination pagination-md'>",
            'full_tag_close' => "</ul>",
            'next_tag_open' => "<li class='pg-next'>",
            'next_tag_close' => "</li>",
            'first_tag_open' => "<li>",
            'first_tag_close' => "</li>",
            'next_link' => "Next",
            'last_tag_open' => "<li>",
            'last_tag_close' => "</li>",
            'prev_link' => "Prev",
            'prev_tag_open' => "<li>",
            'prev_tag_close' => "</li>",
            'num_tag_open' => "<li>",
            'num_tag_close' => "</li>",
            'cur_tag_open' => "<li class='page-item active'><a class='page-link'>",
            'cur_tag_close' => "</a></li>",
            'attributes' => array('class' => 'page-link'),
        ];

        $this->pagination->initialize($config);
        $data['get_users'] = $this->Admin_m->admin_get_all_users($config['per_page'],
            $this->uri->segment(3));
        $data['links'] = $this->pagination->create_links();

        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('users/get_users', $data);
        $this->load->view('partials/bottom');

        /*if (!empty($get_data)) {
            $response['status'] = 'success';
            $response['message'] = 'Record Successfully Found';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Record Not Found';
            $response['statusCode'] = 404;
        }
        echo json_encode($response);
        exit();*/
    }

    public function adminAddUser()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('cpassword', 'Confirm password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('user_detail', 'User Detail', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('partials/top');
            $this->load->view('partials/sidebar');
            $this->load->view('users/add_user');
            $this->load->view('partials/bottom');

        } else {

            $picture = '';
            $config = array(
                'upload_path' => "./uploads/users",
                'allowed_types' => "gif|jpg|png|jpeg",
                'encrypt_name' => TRUE,
            );

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('picture')) {
                $file_data = $this->upload->data();
                $picture = 'uploads/users/' . $file_data['file_name'];
            }

            $first_name = $this->input->post('fname');
            $last_name = $this->input->post('lname');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $retype_password = md5($this->input->post('cpassword'));
            $phone = $this->input->post('phone');
            $gender = $this->input->post('gender');
            $detail = $this->input->post('user_detail');
            $role = $this->input->post('role');

            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $email,
                'password' => md5($password),
                'retype_password' => md5($retype_password),
                'picture' => $picture,
                'phone' => $phone,
                'gender' => $gender,
                'details' => $detail,
                'role' => $role
            );

            if (!empty($data)) {
                $this->Admin_m->admin_add_user($data);

                $this->session->set_flashdata('msg', 'Add User successfully.');
                return redirect('admin/get-all-users');
            } else {
                $this->session->set_flashdata('msg', 'Failed to Add User');
                return redirect('admin/add-user');
            }
        }
    }

    public function adminEditUser()
    {
        $data['page_name'] = 'admin Edit User Data';
        $slug = $this->uri->segment(3);
        if (isset($slug) && !empty($slug)) {
            if (empty($this->Admin_m->admin_get_user_by_id($slug, 'array'))) {
                $this->session->set_flashdata('msg', 'User not found.');
                return redirect('admin/get-all-users');
            }
            $data['row'] = $this->Admin_m->admin_get_user_by_id($slug, 'array');

        } else {
            $this->session->set_flashdata('msg', 'User Data not found.');
            return redirect('admin/get-all-users');
        }

        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('users/edit_user', $data);
        $this->load->view('partials/bottom');
    }

    public function adminUpdateUserSave()
    {
        if (empty($_FILES['product_image']['name'])) {
            $this->session->set_flashdata('msg', 'Profile picture required');
            return redirect('admin/get-all-users');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('lname', 'Last Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required');

        if ($this->form_validation->run() == false) {
            return redirect('admin/get-all-users');
        } else {

            $picture = '';
            $old_picture = $this->input->post('old_product_picture');

            $config = array(
                'upload_path' => "./uploads/users",
                'allowed_types' => "gif|jpg|png|jpeg",
                'encrypt_name' => TRUE,
            );

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('picture')) {
                $file_data = $this->upload->data();
                $picture = 'uploads/users/' . $file_data['file_name'];
                unlink($old_picture);//remove old
            }

            $item = $this->input->post('hide_id');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $first_name = $this->input->post('fname');
            $last_name = $this->input->post('lname');
            $phone = $this->input->post('phone');
            $status = $this->input->post('status');
            $role = $this->input->post('role');

            $userData = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $email,
                'phone' => $phone,
                'picture' => $picture,
                'status' => $status,
                'role' => $role,
            );

            if (isset($userData)) {
                $this->Admin_m->admin_update_user_save($item, $userData);

                $this->session->set_flashdata('msg', 'Update User successfully.');
                return redirect('admin/get-all-users');
            } else {
                $this->session->set_flashdata('msg', 'Failed to Update User');
                return redirect('admin/edit_user');
            }

        }
    }

    public function adminDeleteUser()
    {
        $id = $this->uri->segment(3);

        $file = $this->Admin_m->admin_delete_get_user_by_id($id);

        if (isset($file) && !empty($file)) {

            if ($this->Admin_m->admin_uploads_user_delete_files($id)) {
                $this->session->set_flashdata('msg', 'Delete User successfully.');
            } else {
                $this->session->set_flashdata('msg', 'Failed to delete User.');
            }
            /**
             * Delete File
             */
            if (file_exists($file->picture)) {
                unlink($file->picture);
            }
            return redirect('admin/get-all-users');
        } else {
            $this->session->set_flashdata('msg', 'File not found.');
            return redirect('admin/delete-user');
        }

    }

    public function adminUpdateSaveUserStatus()
    {
        $status_id = $this->input->post('id');
        /*print_r($status_id);
        die();*/
        $status = $this->input->post('status');

        if (!empty ($this->Admin_m->admin_update_user_status($status_id, $status))) {
            $response['message'] = 'Status Record Update';
            $response['status'] = 'success';
            $response['statusCode'] = 200;
        } else {
            $response['message'] = 'Filed to Update Record';
            $response['status'] = 'Error';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }


}
