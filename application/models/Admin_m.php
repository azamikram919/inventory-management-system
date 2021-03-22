<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/3/2021
 * Time: 10:55 PM
 */
class Admin_m extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function admin_login($email, $password)
    {
        $query = $this->db->get_where('users', ['email' => $email, 'password' => $password]);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }


    public function count_all_products()
    {
        $query = $this->db->get('products');
        return $query->num_rows();
    }

    public function count_all_orders()
    {
        $query = $this->db->get('orders');
        return $query->num_rows();
    }

    public function get_all_users()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    public function count_all_stores($active)
    {
        $query = $this->db->get_where('stores', ['active' => $active]);
        return $query->num_rows();
    }


    public function get_user_list_data()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }


    /**
     * with pagination get data
     */

    public function count_all_users()
    {
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function admin_get_all_users($limit, $offset)
    {
        $query = $this->db->order_by('id', 'DESC')
            ->limit($limit, $offset)
            ->get('users');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }


    /**
     * add user
     */

    public function admin_add_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    /**
     * get user by id
     */

    public function admin_get_user_by_id($id, $response_type = 'object')
    {
        $query = $this->db->get_where('users', ['id' => $id]);
        if ($query->num_rows() > 0) {
            return $response_type == 'object' ? $query->row() : $query->row_array();
        } else {
            return FALSE;
        }
    }


    /**
     * update user
     */

    public function admin_update_user_save($id, $data)
    {
        $this->db->where('id', $id)->update('users', $data);
        return TRUE;
    }

    /**
     * status update
     */

    public function admin_update_user_status($id, $status)
    {
        $this->db->where('id', $id)
            ->set('status', $status)
            ->update('users');
        return TRUE;
    }

    /**
     * get user by id
     */

    public function admin_delete_get_user_by_id($id)
    {
        $query = $this->db->where('id', $id)
            ->get('users');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    /**
     * delete user
     */

    public function admin_uploads_user_delete_files($file_id)
    {
        $this->db->where('id', $file_id)
            ->delete('users');
        return TRUE;
    }
}