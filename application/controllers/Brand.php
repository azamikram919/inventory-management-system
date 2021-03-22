<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/19/2021
 * Time: 12:13 PM
 */
class Brand extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brand_m');

    }

    public function index()
    {
        $data['data'] = $this->Brand_m->admin_get_brands();
        if (!empty($data)) {
            $this->load->view('partials/top');
            $this->load->view('partials/sidebar');
            $this->load->view('brands/manage_brand', $data);
            $this->load->view('partials/bottom');
        }
    }

    public function adminAddBrandData()
    {
        $brand_name = $this->input->post('brand_name');
        $brand_status = $this->input->post('brand_status');

        $brand_data = array(
            'name' => $brand_name,
            'active' => $brand_status
        );

        $create_data = $this->Brand_m->admin_add_brand_data($brand_data);
        if (!empty($create_data)) {
            $response['status'] = 'Success';
            $response['message'] = 'Brand Successfully created';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Brand Failed to Created';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminManageBrandData()
    {
        /*$data['data'] = $this->Brand_m->admin_get_brands();
        if (!empty($data)) {
                    $response['status'] = 'Success';
                    $response['message'] = 'Brand Data Found Successfully';
                    $response['statusCode'] = 200;
                } else {
                    $response['status'] = 'Error';
                    $response['message'] = 'Brand Data Not Found';
                    $response['statusCode'] = 404;
                }
                echo json_encode($response);
                exit();*/
    }


    public function adminGetEditBrandDataById()
    {
        $edit_id = $this->input->post('id');

        if (!empty($edit_id)) {
            $response = $this->Brand_m->admin_get_brand_data_by_id($edit_id);
        }
        echo json_encode($response);
        exit();
    }

    public function adminUpdateBrandData()
    {
        $id = $this->input->post('edit_brand_data_id');

        $data = array(
            'name' => $this->input->post('edit_brand_name'),
            'active' => $this->input->post('edit_brand_status')
        );

        if (!empty($data) && !empty($id)) {
            $this->Brand_m->admin_update_brand_data($id, $data);
            $response['status'] = 'Success';
            $response['message'] = 'Brand Successfully Updated';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Brand Failed to Update';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminDeleteBrandData()
    {
        $id = $this->input->post('id');
        if (!empty($id)) {
            $this->Brand_m->admin_delete_brand_data($id);
            $response['status'] = 'Success';
            $response['message'] = 'Delete Brand Data Successfully';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Failed to Delete Brand';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }
}