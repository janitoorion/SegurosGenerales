<?php

class MenuModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    public function menu_padre($usunomusu){
        $cursor = oci_new_cursor($this->db->conn_id);    
        $coderror = 0;
        $descerror = "";
        $sql = "";

        $sql = $sql . "begin pkg_menu.pr_recupera_menu_nivel0(:p_usucodigo, :o_cursor, :o_coderror, :o_descerror); end;";
        
        $stmt = oci_parse($this->db->conn_id, $sql);
        oci_bind_by_name($stmt, ":p_usucodigo", $usunomusu);
        oci_bind_by_name($stmt, ":o_cursor", $cursor, null, OCI_B_CURSOR);
        oci_bind_by_name($stmt, ":o_coderror", $coderror, 2000);
        oci_bind_by_name($stmt, ":o_descerror", $descerror, 2000);

        $res = ociexecute($stmt);
        if ($res){
            $result = array();
            $tieneDatos = false;
            oci_execute($cursor); // Execute the cursor
            
            while ($entry = oci_fetch_assoc($cursor)) {
                $tieneDatos = true;
                array_push($result, $entry);
            }
            
            if (!$tieneDatos){ $result = false; }
        }else{
            $result = false;
        }
        
        
        return array("coderror"  => $coderror, 
                     "descerror" => $descerror,
                     "cursor"    => $result);
    }
    
    public function menu_hijo($usucodigo, $opccodigo){
        $cursor = oci_new_cursor($this->db->conn_id);    
        $coderror = 0;
        $descerror = "";
        $sql = "";

        $sql = $sql . "begin pkg_menu.pr_recupera_menu_nivel_hijo(";
        $sql = $sql . "p_usucodigo => :p_usucodigo, ";
        $sql = $sql . "p_opccodigo => :p_opccodigo, ";
        $sql = $sql . "o_cursor => :o_cursor, ";
        $sql = $sql . "o_coderror => :o_coderror, ";
        $sql = $sql . "o_descerror => :o_descerror); ";
        $sql = $sql . "end; ";
        
        $stmt = oci_parse($this->db->conn_id, $sql);
        oci_bind_by_name($stmt, ":p_usucodigo", $usucodigo);
        oci_bind_by_name($stmt, ":p_opccodigo", $opccodigo);
        oci_bind_by_name($stmt, ":o_cursor", $cursor, null, OCI_B_CURSOR);
        oci_bind_by_name($stmt, ":o_coderror", $coderror, 2000);
        oci_bind_by_name($stmt, ":o_descerror", $descerror, 2000);

        $res = ociexecute($stmt);
        if ($res){
            $result = array();
            $tieneDatos = false;
            oci_execute($cursor); // Execute the cursor
            
            while ($entry = oci_fetch_assoc($cursor)) {
                $tieneDatos = true;
                array_push($result, $entry);
            }
            
            if (!$tieneDatos){ $result = false; }
        }else{
            $result = false;
        }
        
        return array("coderror"  => $coderror, 
                     "descerror" => $descerror,
                     "cursor"    => $result);
    }
}