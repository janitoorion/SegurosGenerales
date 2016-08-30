<?php

class MenuModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    public function menu_padre($id){
        $cursor = oci_new_cursor($this->db->conn_id);    
        $cod_error = 0;
        $desc_error = "";

        $params = array(array('name' => ':p_usucodigo'      , 'value' => $id,           'type' => SQLT_INT), //NUMBER
                        array('name' => ':o_cursor'         , 'value' => $cursor,       'type' => OCI_B_CURSOR), //CURSOR
                        array('name' => ':o_coderror'       , 'value' => $cod_error,    'type' => SQLT_INT), //NUMEBR
                        array('name' => ':o_descerror'      , 'value' => $desc_error,   'type' => SQLT_CHR)  //VARCHAR2
                  );
        
        $stmt = oci_parse($this->db->conn_id, "begin pkg_menu.pr_recupera_menu_nivel0(:p_usucodigo, :o_cursor, :o_coderror, :o_descerror); end;");
        
        foreach($params as $p){
            oci_bind_by_name($stmt, $p['name'], $p['value'], null, $p['type']);
        }

        $res = ociexecute($stmt);
        if ($res){
            $result = Array();
            
            oci_execute($cursor); // Execute the cursor
            while ($entry = oci_fetch_assoc($cursor)) {
                array_push($result, $entry);
            }
        }else{
            $result = null;
        }

        return $result;
    }

    public function menu_hijo($id, $codigo){
        $cursor = oci_new_cursor($this->db->conn_id);    
        $cod_error = 0;
        $desc_error = "";

        $params = array(array('name' => ':p_usucodigo'      , 'value' => $id,           'type' => SQLT_INT), //NUMBER
                        array('name' => ':p_opccodigo'      , 'value' => $codigo,       'type' => SQLT_INT), //NUMBER
                        array('name' => ':o_cursor'         , 'value' => $cursor,       'type' => OCI_B_CURSOR), //CURSOR
                        array('name' => ':o_coderror'       , 'value' => $cod_error,    'type' => SQLT_INT), //NUMEBR
                        array('name' => ':o_descerror'      , 'value' => $desc_error,   'type' => SQLT_CHR)  //VARCHAR2
                  );
        
        $stmt = oci_parse($this->db->conn_id, "begin pkg_menu.pr_recupera_menu_nivel_hijo(:p_usucodigo, :p_opccodigo, :o_cursor, :o_coderror, :o_descerror); end;");
        
        foreach($params as $p){
            oci_bind_by_name($stmt, $p['name'], $p['value'], null, $p['type']);
        }

        $res = ociexecute($stmt);
        if ($res){
            $result = Array();
            
            oci_execute($cursor); // Execute the cursor
            while ($entry = oci_fetch_assoc($cursor)) {
                array_push($result, $entry);
            }
        }else{
            $result = false;
        }

        return $result;
    }
}