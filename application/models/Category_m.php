<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/22/2021
 * Time: 11:57 AM
 */
class Category_m extends CI_Model
{

    public function get_category_data()
    {
        $query = $this->db->get('categories');
        $this->db->order_by('id', 'DESC');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function add_category($data)
    {
        $this->db->insert('categories', $data);
        return $this->db->insert_id();
    }

    public function get_category_data_by_id($id)
    {
        $query = $this->db->where('id', $id)
            ->get('categories');
        return $query->row_array();
    }

    public function admin_update_category_data($id, $data)
    {
        $this->db->where('id', $id)->update('categories', $data);
        return TRUE;
    }

    public function admin_delete_category_data($id)
    {
        $this->db->where('id', $id)->delete('categories');
        return TRUE;
    }
}