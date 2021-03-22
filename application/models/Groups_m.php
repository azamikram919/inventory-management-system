<?php

/**
 * Created by PhpStorm.
 * User: Programmers
 * Date: 2/24/2021
 * Time: 11:11 AM
 */
class Groups_m extends CI_Model
{

    public function admin_get_group_data($groupId = null)
    {
        /*$query = $this->db->get('groups');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }*/

        if ($groupId) {
            $sql = "SELECT * FROM groups where id = ?";
            $query = $this->db->query($sql, array($groupId));
            return $query->row_array();
        }

        $query = $this->db->query('SELECT * FROM `groups` WHERE `id` != ? ORDER BY `group_name` DESC', array(1));
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return FALSE;
        }
    }

    public function admin_add_group($data)
    {
        $this->db->insert('groups', $data);
        return $this->db->insert_id();
    }

    public function admin_get_group_by_id($id, $response_type = 'object')
    {
        $query = $this->db->get_where('groups', ['id' => $id]);
        if ($query->num_rows() > 0) {
            return $response_type == 'object' ? $query->row() : $query->row_array();
        } else {
            return FALSE;
        }
    }

    public function admin_update_group_data($id, $data)
    {
        $this->db->where('id', $id)->update('groups', $data);
        return TRUE;
    }

    public function admin_delete_group_data($id)
    {
        $this->db->where('id', $id)->delete('groups');
        return TRUE;
    }
}