<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/24/2021
 * Time: 8:48 AM
 */
class Store extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Store_m');

    }

    public function index()
    {
        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('store/store');
        $this->load->view('partials/bottom');
    }

    public function adminGetStoreData()
    {
        $store_data = $this->Store_m->admin_get_all_store_data();

//        echo '<pre>';
//        print_r($store_data);die();

        if (!empty($store_data)) {
            $result = array();
            $button = '';
            $i = 1;

            foreach ($store_data as $key => $value) {


                $button = $button = '<a class="btn btn-xs btn-info ml-2" onclick="editStore(' . $value['id'] . ')">
            <i class="fas fa-edit"></i></a>';

                $button .= '<a class="btn btn-xs btn-danger ml-2" onclick="deleteStore(' . $value['id'] . ')">
            <i class="far fa-trash-alt"></i></a>';

                $status = ($value['active'] == 1) ? '<span class="badge rounded-pill badge-success">Active</span>' : '<span class="badge rounded-pill badge-warning">Inactive</span>';

                $result['data'][] = array(
                    $i++,
                    $value['name'],
                    $status,
                    $value['created_at'],
                    $button
                );
            }
        }
        echo json_encode($result);
        exit();
    }

    public function adminAddStoreData()
    {
        $store_data = array(
            'name' => $this->input->post('store_name'),
            'active' => $this->input->post('store_status')
        );

        if (!empty($store_data)) {
            $this->Store_m->admin_add_store_data($store_data);

            $response['status'] = 'Success';
            $response['message'] = 'Successfully Add Store Data';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Failed to Add Store Data';
            $response['statusCode'] = 4004;
        }
        echo json_encode($response);
        exit();
    }

    public function adminGetEditStoreDataById()
    {
        $update_store_hidden_id = $this->input->post('id');

        if (!empty($update_store_hidden_id)) {
            $response = $this->Store_m->admin_get_edit_store_data_by_id($update_store_hidden_id);
        }
        echo json_encode($response);
        exit();
    }

    public function adminUpdateStoreData()
    {
        $update_store_hidden_id = $this->input->post('update_store_hidden_id');

        $update_data = array(
            'name' => $this->input->post('edit_store_name'),
            'active' => $this->input->post('edit_store_status')
        );

        if (!empty($update_store_hidden_id) && !empty($update_data)) {
            $this->Store_m->admin_update_store_data($update_store_hidden_id, $update_data);

            $response['status'] = 'Success';
            $response['message'] = 'Successfully Update Store Data';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Failed to Update Store Data';
            $response['statusCode'] = 4004;
        }
        echo json_encode($response);
        exit();
    }

    public function adminDeleteStoreData()
    {
        $delete_id = $this->input->post('id');

        if (!empty($delete_id)) {
            $this->Store_m->admin_delete_store_data($delete_id);

            $response['status'] = 'Success';
            $response['message'] = 'Successfully Delete this Record';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Failed to Delete this Record';
            $response['statusCode'] = 4004;
        }
        echo json_encode($response);
        exit();
    }
}