<?php

class Database extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($table_name, $array) {
        $this->db->insert($table_name, $array);
        //$this->db->last_query();
        return $this->db->insert_id();
    }

    function insert_with_name_array($table_name, $array) {
        
    }

    function select_qry_array($query) {
        $query = $this->db->query($query);
        return $query->result();
    }

    function update($cond, $array, $table_name) {
        $fields = '';
        foreach ($array as $key => $value) {
            $fields .= "`" . $key . "`='" . $value . "',";
        }
        $fields = rtrim($fields, ",");
        $sql = "UPDATE " . $table_name . " SET " . $fields . " WHERE " . $cond . "";
        try {
            $message = $this->db->query($sql);
        } catch (Exception $ex) {
            $message = 'Fail' . $sql;
        }
        return $message;
    }

    function select_data($column, $table, $where = '') {

        if ($where != '') {
            $this->db->select($column);
            $this->db->from($table);
            $this->db->where($where);
            $query = $this->db->get();
            return $result = $query->result();
            //$this->db->last_query();exit;
        } else {
            $this->db->select($column);
            $this->db->from($table);
            $query = $this->db->get();
            return $result = $query->result();
            // echo $this->db->last_query();exit;
        }
    }

    function num_rows($query) {
        $query = $this->db->query($query);
        $toatal_rows = $query->num_rows();
        return $toatal_rows;
    }

    function delete($query) {
        $query = $this->db->query($query);
        return $query;
    }

    function update_data($id, $data, $table_nm) {
        $this->db->where('id', $id);
        $result = $this->db->update($table_nm, $data);
        return $result;
        // echo $this->db->last_query();exit;
    }

}
