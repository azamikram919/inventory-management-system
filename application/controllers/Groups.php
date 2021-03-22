<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/24/2021
 * Time: 11:10 AM
 */
class Groups extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Groups_m');
    }

    public function index()
    {
        $groups_data = $this->Groups_m->admin_get_group_data();
        $data['groups_data'] = $groups_data;

        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('groups/manage_groups', $data);
        $this->load->view('partials/bottom');
    }

    public function adminAddGroup()
    {
        $this->form_validation->set_rules('group_name', 'Group Name', 'required');
        if ($this->form_validation->run() == TRUE) {
            $permission = serialize($this->input->post('permission'));

            $group_data = array(
                'group_name' => $this->input->post('group_name'),
                'permission' => $permission
            );

            if (!empty($group_data)) {
                $this->Groups_m->admin_add_group($group_data);
                $this->session->set_flashdata('success', 'Successfully created');
                redirect('admin/manage-group');
            } else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('admin/add-group');
            }
        } else {
            $this->load->view('partials/top');
            $this->load->view('partials/sidebar');
            $this->load->view('groups/add_group');
            $this->load->view('partials/bottom');
        }
    }

    public function adminGetGroupById()
    {

        $data['page_name'] = 'admin Edit Group Data';
        $id = $this->uri->segment(3);

        if (isset($id) && !empty($id)) {
            if (empty($this->Groups_m->admin_get_group_by_id($id, 'array'))) {

                $this->session->set_flashdata('msg', 'Group not found.');
                return redirect('admin/manage-group');
            }

            $data['row'] = $this->Groups_m->admin_get_group_by_id($id, 'array');

        } else {
            $this->session->set_flashdata('msg', 'Group Data not found.');
            return redirect('admin/manage-group');
        }
        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('groups/edit_group', $data);
        $this->load->view('partials/bottom');
    }

    public function adminUpdateGroupData()
    {
        $group_hide_id = $this->input->post('group_hide_id');

        $this->form_validation->set_rules('group_name', 'Group Name', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('partials/top');
            $this->load->view('partials/sidebar');
            $this->load->view('groups/edit_group');
            $this->load->view('partials/bottom');

        } else {
            $permission = serialize($this->input->post('permission'));

            $group_data = array(
                'group_name' => $this->input->post('group_name'),
                'permission' => $permission
            );

            if (!empty($group_hide_id) && !empty($group_data)) {
                $this->Groups_m->admin_update_group_data($group_hide_id, $group_data);
                $this->session->set_flashdata('success', 'Successfully Update');
                redirect('admin/manage-group');
            } else {
                $this->session->set_flashdata('errors', 'Error occurred!!');
                redirect('admin/manage-group');
            }
        }
    }

    public function adminDeleteGroupData()
    {
        $id = $this->uri->segment(3);

        if (!empty($id)) {
            $delete_data = $this->Groups_m->admin_delete_group_data($id);
            if (isset($delete_data) && !empty($delete_data)) {
                $this->session->set_flashdata('msg', 'Group Deleted successfully.');
                redirect('admin/manage-group');
            } else {
                $this->session->set_flashdata('msg', 'Failed to Delete Group.');
            }
        } else {
            redirect('admin/manage-group');
        }

    }

}