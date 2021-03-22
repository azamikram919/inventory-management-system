<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/22/2021
 * Time: 11:57 AM
 */
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category_m');
    }

    public function index()
    {
        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('categories/category');
        $this->load->view('partials/bottom');
    }

    public function adminGetAllCategories()
    {
        $category_data = $this->Category_m->get_category_data();

        if (!empty($category_data)) {
            $result = array();
            $button = '';
            $i = 1;

            foreach ($category_data as $key => $value) {

            $button = '<a class="btn btn-xs btn-info ml-2" onclick="editCategory(' . $value['id'] . ')">
            <i class="fas fa-edit"></i></a>';

            $button .= '<a class="btn btn-xs btn-danger ml-2" onclick="deleteCategory(' . $value['id'] . ')">
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

    public function adminAddCategory()
    {
        $data = array(
            'name' => $this->input->post('category_name'),
            'active' => $this->input->post('category_status')
        );

        if (!empty($data)) {
            $this->Category_m->add_category($data);

            $response['status'] = 'Success';
            $response['message'] = 'Category Successfully Add Data';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Failed to Add Category Data';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }

    public function adminGetCategoryDataId()
    {
        $edit_id = $this->input->post('id');

        if (!empty($edit_id)) {
            $response = $this->Category_m->get_category_data_by_id($edit_id);
        }
        echo json_encode($response);
        exit();
    }

    public function adminUpdateCategoryData()
    {

    }

    public function adminDeleteCategoryData()
    {
        $category_hide_id = $this->input->post('id');

        $delete_data = $this->Category_m->admin_delete_category_data($category_hide_id);
        if (!empty($delete_data)) {
            $response['status'] = 'Success';
            $response['message'] = 'Category Delete Successfully';
            $response['statusCode'] = 200;
        } else {
            $response['status'] = 'Error';
            $response['message'] = 'Category Data Failed to Delete';
            $response['statusCode'] = 400;
        }
        echo json_encode($response);
        exit();
    }
}