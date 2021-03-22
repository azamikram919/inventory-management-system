<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/19/2021
 * Time: 12:17 PM
 */
class Brand_m extends CI_Model
{
    public function admin_get_brands()
    {
        $query = $this->db->get('brands');
        $this->db->order_by('id', 'DESC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function admin_add_brand_data($brand_data)
    {
        $this->db->insert('brands', $brand_data);
        return $this->db->insert_id();
    }

    public function admin_get_brand_data_by_id($id)
    {
        $query = $this->db->get_where('brands', ['id' => $id]);
        return $query->row_array();
    }

    public function admin_update_brand_data($id, $data)
    {
        $this->db->where('id', $id)->update('brands', $data);
        return TRUE;
    }

    public function admin_delete_brand_data($id)
    {
        $this->db->where('id', $id)->delete('brands');
        return TRUE;
    }
}