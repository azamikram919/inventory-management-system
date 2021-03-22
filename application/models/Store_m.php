<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/24/2021
 * Time: 8:49 AM
 */
class Store_m extends CI_Model
{
    public function admin_get_all_store_data()
    {
        $query = $this->db->get('stores');
        $this->db->order_by('id', 'DESC');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function admin_add_store_data($data)
    {
        $this->db->insert('stores', $data);
        return $this->db->insert_id();
    }

    public function admin_get_edit_store_data_by_id($id)
    {
        $query = $this->db->where('id', $id)
            ->get('stores');
        return $query->row_array();
    }

    public function admin_update_store_data($id, $data)
    {
        $this->db->where('id', $id)->update('stores', $data);
        return TRUE;
    }

    public function admin_delete_store_data($id)
    {
        $this->db->where('id', $id)->delete('stores');
        return TRUE;
    }
}