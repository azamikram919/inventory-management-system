<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attribute extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Attribute_m');
    }

    public function index()
    {
        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('attributes/manage_attribute');
        $this->load->view('partials/bottom');
    }

    public function adminAddAttributeData()
    {
        $data = array(
            'name' => $this->input->post('attribute_name'),
            'active' => $this->input->post('attribute_status'),
        );

        $create_data = $this->Attribute_m->adminAddAttribute($data);

        if (!empty($create_data)) {
            $response['status'] = 'Success';
            $response['message'] = 'Attribute Successfully created';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Attribute Failed to Created';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminManageAttributeData()
    {
        $attribute_data = $this->Attribute_m->admin_get_attributes_data();

        $result = array();
        $button = '';
        $i = 1;
        foreach ($attribute_data as $key => $value) {

            $count_attribute_value = $this->Attribute_m->admin_count_attribute_value($value['id']);

            $button = '<a href="' . base_url('admin/get-attribute-value/' . $value['id']) . '" class="btn btn-xs text-white btn-primary">
            <i class="fas fa-plus"></i> Add Value</a>';

            $button .= '<a class="btn btn-xs btn-info ml-2" onclick="editAttribute(' . $value['id'] . ')">
            <i class="fas fa-edit"></i></a>';

            $button .= '<a class="btn btn-xs btn-danger ml-2" onclick="deleteAttribute(' . $value['id'] . ')">
            <i class="far fa-trash-alt"></i></a>';

            $status = ($value['active'] == 1) ? '<span class="badge rounded-pill badge-success">Active</span>' : '<span class="badge rounded-pill badge-warning">Inactive</span>';

            $result['data'][] = array(
                $i++,
                $value['name'],
                $count_attribute_value,
                $status,
                $button,
            );
        }
        echo json_encode($result);
        exit();
    }

    public function adminGetEditAttributeData()
    {
        $edit_id = $this->input->post('id');

        $response = $this->Attribute_m->admin_get_attribute_data_by_id($edit_id);
        echo json_encode($response);
        exit();
    }


    public function adminUpdateAttributeSaveData()
    {
        $attribute_hide_id = $this->input->post('id');
        $update_attribute_name = $this->input->post('update_attribute_name');
        $update_attribute_status = $this->input->post('update_attribute_status');

        $update_data = array(
            'name' => $update_attribute_name,
            'active' => $update_attribute_status
        );

        $data = $this->Attribute_m->admin_update_attribute_save_data($attribute_hide_id, $update_data);

        if (!empty($data)) {
            $response['status'] = 'Success';
            $response['message'] = 'Attribute Data Update Successfully';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Attribute Data Failed to Update';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminDeleteAttributeData()
    {
        $attribute_hide_id = $this->input->post('id');

        $delete_data = $this->Attribute_m->admin_delete_attribute_data($attribute_hide_id);
        if (!empty($delete_data)) {
            $response['status'] = 'Success';
            $response['message'] = 'Attribute Delete Successfully';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Attribute Data Failed to Delete';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminGetAttributeValue()
    {
        $attribute_id = $this->uri->segment(3);

        if (!$attribute_id) {
            return redirect('/');
        }

        $data['attribute_data'] = $this->Attribute_m->admin_get_attribute_value($attribute_id);
//        $data['attribute_data'] = $this->Attribute_m->allvalues($attribute_id);
//        $data['attribute_id'] = $attribute_id;

        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('attributes/attribute_value', $data);
        $this->load->view('partials/bottom');
    }

    public function adminGetAttributeValueData()
    {
        $parent_id = $this->uri->segment(3);

//        $attribute_parent_id = $this->Attribute_m->admin_get_attribute_value_data($parent_id);
        $attribute_parent_id = $this->Attribute_m->allValues($parent_id);

        $result = array();
        $i = 1;
        foreach ($attribute_parent_id as $key => $value) {

            $button = '<a class="btn btn-xs btn-info edit-btn ml-2" onclick="editAttributeValueData(' . $value['id'] . ')">
            <i class="fas fa-edit"></i></a>';

            $button .= '<a class="btn btn-xs btn-danger ml-2" onclick="deleteAttributeValueData(' . $value['id'] . ')">
            <i class="far fa-trash-alt"></i></a>';

            $result['data'][] = array(
                $i++,
                $value['value'],
                $button,
            );
        }
        echo json_encode($result);
        exit();

    }

    public function adminAddAttributeValueData()
    {
        $attribute_value_name = $this->input->post('attribute_value_name');
        $hidden_attribute_id = $this->input->post('hidden_attribute_id');

        $attribute_value_data = array(
            'value' => $attribute_value_name,
            'attribute_id' => $hidden_attribute_id
        );

        if (!empty($attribute_value_data)) {

            $this->Attribute_m->add_attribute_value_data($attribute_value_data);

            $response['status'] = 'Success';
            $response['message'] = 'Attribute Add Value Successfully';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Attribute Failed to Insert Value';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminGetAttributeValueDataId()
    {
        $get_attribute_id = $this->input->post('id');

        $response = $this->Attribute_m->admin_get_attribute_value_by_id($get_attribute_id);
        echo json_encode($response);
        exit();
    }

    public function adminGetAttributeValueDataUpdate()
    {
        $attribute_value_data_hide_id = $this->input->post('attribute_value_data_hide_id');
        $attribute_value_data_field = $this->input->post('attribute_value_data_field');

        $attribute_value_data = array(
            'value' => $attribute_value_data_field
        );

        if (!empty($attribute_value_data)) {
            $this->Attribute_m->admin_get_attribute_value_data_update($attribute_value_data_hide_id, $attribute_value_data);
            $response['status'] = 'Success';
            $response['message'] = 'Attribute Value Update Successfully';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Attribute Value Failed to Update';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminDeleteAttributeValueData()
    {

        $attribute_delete_id = $this->input->post('id');

        if (!empty($attribute_delete_id)) {

            $this->Attribute_m->admin_delete_attribute_value_data($attribute_delete_id);
            $response['status'] = 'Success';
            $response['message'] = 'Attribute Value Delete Successfully';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Attribute Value Failed to Delete';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();

    }
}


?>