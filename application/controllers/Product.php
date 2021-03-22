<?php
/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/5/2021
 * Time: 12:56 PM
 */


class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $title['Page Title'] = 'Admin Dashboard';
        if (!$this->session->userdata('id')) {
            return redirect('login');
        }

        $this->load->model('Product_m');


    }

    public function index()
    {
        $this->load->library('pagination');

        $config = [                        //pagination
            'base_url' => base_url('admin/index'),
            'per_page' => 5,
            'total_rows' => $this->Product_m->admin_count_all_products(),
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
        $data['get_products'] = $this->Product_m->admin_get_all_product_list($config['per_page'],
            $this->uri->segment(3));

//        $data['links'] = $this->pagination->create_links();

        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('products/get_products', $data);
        $this->load->view('partials/bottom');
    }

    public function adminAddProduct()
    {
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('product_price', 'product Price', 'required');
        $this->form_validation->set_rules('product_brand', 'Product Brand', 'required');
        $this->form_validation->set_rules('product_items', 'Product Item', 'required');
        $this->form_validation->set_rules('availability', 'Product Availability', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('partials/top');
            $this->load->view('partials/sidebar');
            $this->load->view('products/add_product');
            $this->load->view('partials/bottom');

        } else {

            $user_id = $this->session->userdata('id');
            $picture = '';
            $config = array(
                'upload_path' => "./uploads/products",
                'allowed_types' => "gif|jpg|png|jpeg",
                'encrypt_name' => TRUE,
            );

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image')) {
                $file_data = $this->upload->data();
                $picture = 'uploads/products/' . $file_data['file_name'];
            }

            $product_name = $this->input->post('product_name');
            $product_price = $this->input->post('product_price');
            $product_brand = $this->input->post('product_brand');
            $product_items = $this->input->post('product_items');
            $availability = $this->input->post('availability');
            $product_description = $this->input->post('product_description');

            $product_data = array(
                'name' => $product_name,
                'price' => $product_price,
                'brand' => $product_brand,
                'total_items' => $product_items,
                'availability' => $availability,
                'image' => $picture,
                'user_id' => $user_id,
                'description' => $product_description
            );

            if (!empty($product_data)) {
                $this->Product_m->admin_add_product($product_data);

                $this->session->set_flashdata('msg', 'Add Product Successfully');
                return redirect('admin/index');
            } else {
                $this->session->set_flashdata('msg', 'Failed to Add Product');
                return redirect('admin/add-product');
            }
        }
    }

    public function adminEditProduct()
    {
        $data['Page Name'] = 'Edit Product';
        $slug = $this->uri->segment(3);
        if (isset($slug) && !empty($slug)) {
            if (empty($this->Product_m->admin_get_product_by_id($slug, 'array'))) {
                $this->session->set_flashdata('msg', 'Product Not Found');
                return redirect('admin/index');
            }
            $data['row'] = $this->Product_m->admin_get_product_by_id($slug, 'array');

        } else {
            $this->session->set_flashdata('msg', 'Product Data Not Found');
            return redirect('admin/index');
        }

        $this->load->view('partials/top');
        $this->load->view('partials/sidebar');
        $this->load->view('products/edit_product', $data);
        $this->load->view('partials/bottom');
    }

    public function adminProductUpdateSave()
    {
        if (!empty($_FILES['picture']['name'])) {
            $this->session->set_flashdata('msg', 'Product picture required');
            return redirect('admin/index');
        }

        $this->form_validation->set_rules('product_name', 'Product Name', 'required');
        $this->form_validation->set_rules('product_price', 'product Price', 'required');
        $this->form_validation->set_rules('product_brand', 'Product Brand', 'required');
        $this->form_validation->set_rules('product_items', 'Product Item', 'required');
        $this->form_validation->set_rules('availability', 'Product Availability', 'required');

        if ($this->form_validation->run() == false) {
            return redirect('admin/index');
        } else {
            $picture = '';

            $old_product_picture = $this->input->post('old_product_picture');

            $config = array(
                'upload_path' => "./uploads/products",
                'allowed_types' => "gif|jpg|png|jpeg",
                'encrypt_name' => TRUE,
            );

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('product_image')) {
                $file_data = $this->upload->data();
                $picture = 'uploads/products/' . $file_data['file_name'];
                unlink($old_product_picture);
            }

            $item = $this->input->post('hide_id');
            $product_name = $this->input->post('product_name');
            $product_price = $this->input->post('product_price');
            $product_brand = $this->input->post('product_brand');
            $product_items = $this->input->post('product_items');
            $availability = $this->input->post('availability');
            $product_description = $this->input->post('product_description ');

            $product_data = array(
                'name' => $product_name,
                'price' => $product_price,
                'brand' => $product_brand,
                'total_items' => $product_items,
                'availability' => $availability,
                'image' => $picture,
                'description' => $product_description
            );


            if (!empty($product_data)) {
                $this->Product_m->admin_edit_product($item, $product_data);
                $this->session->set_flashdata('msg', 'Product Update Successfully');
                return redirect('admin/index');
            } else {
                $this->session->set_flashdata('msg', 'Product Failed to Update');
                return redirect('admin/edit-product');
            }
        }
    }

    public function adminDeleteProduct()
    {
        $id = $this->uri->segment(3);

        $file = $this->Product_m->admin_delete_product($id);

        if (isset($file) && !empty($file)) {

            if ($this->Product_m->admin_delete_product($id)) {
                $this->session->set_flashdata('msg', 'Delete Product successfully.');
            } else {
                $this->session->set_flashdata('msg', 'Failed to delete Product.');
            }
            /**
             * Delete File
             */
            if (file_exists($file->image)) {
                unlink($file->image);
            }
            return redirect('admin/index');
        } else {
            $this->session->set_flashdata('msg', 'File not found.');
            return redirect('admin/delete-product');
        }
    }

}