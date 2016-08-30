<?php

class LoginModel extends CI_Model {
    
    function __construct() {
        parent::__construct();
    }
    
    function busca_usuario_login($usunomusu){
        $cursor = oci_new_cursor($this->db->conn_id);    
        $coderror = 0;
        $descerror = "";
        $sql = "";

        $sql = $sql . "begin PKG_SISTEMA.pr_recupera_usuario(:p_usucodigo, :o_cursor, :o_coderror, :o_descerror); end;";
        
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
    
}