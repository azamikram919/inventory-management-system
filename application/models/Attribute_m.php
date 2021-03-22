<?php
/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/18/2021
 * Time: 10:13 AM
 */

class Attribute_m extends CI_Model
{
    public function adminAddAttribute($data)
    {
        $this->db->insert('attributes', $data);
        return $this->db->insert_id();
    }

    public function admin_get_attributes_data()
    {
        $query = $this->db->get('attributes');
        $this->db->order_by('id', 'DESC');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    public function admin_get_attribute_data_by_id($id)
    {
        $query = $this->db->where('id', $id)
            ->get('attributes');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function admin_update_attribute_save_data($id, $data)
    {
        $this->db->where('id', $id)->update('attributes', $data);
        return TRUE;
    }

    public function admin_delete_attribute_data($id)
    {
        $this->db->where('id', $id)->delete('attributes');
        return TRUE;
    }

    public function admin_count_attribute_value($id)
    {
        /*if ($id) {
            $sql = "SELECT * FROM attribute_value WHERE `attribute_id` = $id";
            $query = $this->db->query($sql, array($id));
            return $query->num_rows();
        }*/

        $query = $this->db->get_where('attribute_value', ['attribute_id' => $id]);
        return $query->num_rows();
    }

    /**
     * Attribute Value Data
     */

    public function allValues($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM attribute_value where `attribute_id` = $id";
            $query = $this->db->query($sql, array($id));
            return $query->result_array();
        }

    }

    public function admin_get_attribute_value($id = null)
    {
        if ($id) {
            $sql = "SELECT * FROM attributes where id = ?";
            $query = $this->db->query($sql, array($id));
            return $query->row_array();
        }

        /*$sql = "SELECT * FROM attributes";
        $query = $this->db->query($sql);
        return $query->result_array();*/
    }

    public function admin_get_attribute_value_data($parent_id)
    {
        $query = $this->db->where('attribute_id', $parent_id)
            ->get('attribute_value');
        return $query->row_array();
    }

    /**
     * Add Attribute Value Data
     */

    public function add_attribute_value_data($data)
    {
        $this->db->insert('attribute_value', $data);
        return $this->db->insert_id();
    }

    public function admin_get_attribute_value_by_id($id)
    {
        $query = $this->db->where('id', $id)
            ->get('attribute_value');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function admin_get_attribute_value_data_update($id, $data)
    {
        $this->db->where('id', $id)->update('attribute_value', $data);
        return TRUE;
    }

    public function admin_delete_attribute_value_data($id)
    {
        $this->db->where('id', $id)->delete('attribute_value');
        return TRUE;
    }
}

?>