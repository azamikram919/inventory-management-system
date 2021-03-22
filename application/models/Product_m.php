<?php
/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/5/2021
 * Time: 12:56 PM
 */

class Product_m extends CI_Model
{
    /**
     * with pagination get data
     */
    public function admin_get_all_product_list($limit, $offset)
    {
        $query = $this->db->order_by('id', 'DESC')
            ->limit($limit, $offset)
            ->get('products');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function admin_count_all_products()
    {
        $query = $this->db->get('products');
        return $query->num_rows();
    }


    /**
     * add product
     */

    public function admin_add_product($data)
    {
        $this->db->insert('products', $data);
        return $this->db->insert_id();
    }

    /**
     * admin get product by id
     */

    public function admin_get_product_by_id($id, $data = 'object')
    {
        $query = $this->db->get_where('products', ['id' => $id]);
        if ($query->num_rows() > 0) {
            return $data == 'object' ? $query->row() : $query->row_array();
        } else {
            return FALSE;
        }
    }


    /**s
     * Admin update product
     */

    public function admin_edit_product($id, $data)
    {
        $this->db->where('id', $id)->update('products', $data);
        return TRUE;
    }

    /**
     * Admin delete product
     */

    public function admin_delete_product($id)
    {
        $this->db->where('id', $id)
            ->delete('products');
        return TRUE;
    }
}