<?php

class ParametrosModel extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    function lista(){
        $cursor = oci_new_cursor($this->db->conn_id);    
        $coderror = 0;
        $descerror = "";
        $sql = "";

        $sql = $sql . "begin PKG_SISTEMA.pr_lista_parametros_sis(:o_cursor, :o_coderror, :o_descerror); end;";
        
        $stmt = oci_parse($this->db->conn_id, $sql);
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
        
        return $result;
    }

    function grilla($editar, $eliminar) {
        $result = $this->lista();
        
        $titulo = '<thead>
            <tr>
                <th data-class="expand">Cod. Parámetro</th>
                <th data-hide="phone">Nombre</th>
                <th data-hide="phone">Descripción</th>
                <th data-hide="phone">Tipo</th>
                <th data-hide="phone">Número</th>
                <th data-hide="phone,tablet">Texto</th>
                <th data-hide="phone,tablet">Fecha</th>';
                if ($editar || $eliminar) { $titulo = $titulo . '<td></td>'; }      
                $titulo = $titulo . '</tr>
        </thead>';
        
        $cuerpo = '<tbody>';
        if (!$result) {
            
        } else {
            foreach ($result as $row) {
                if ($editar) { $editar = '<a href="Clientes/Clientes/EditarCliente/' . $row["PASCODIGO"] . '" data-backdrop="static" data-toggle="modal" data-target="#remoteModal" class="btn btn-primary btn-xs">Editar</a>'; }
                if ($eliminar) { 
                    if ($row["PASELIMINABLE"] == "0") {  
                        $eliminar = '<a href="Clientes/Clientes/EliminarCliente/' . $row["PASCODIGO"] . '" class="btn btn-danger btn-xs btnEliminar">Eliminar</a>';
                    }else{ $eliminar = ""; }
                }

                $cuerpo = $cuerpo . '<tr>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["PASCODIGO"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">'     . $row["PASNOMBRE"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">'     . $row["PASDESCRIPCION"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">'     . $row["DESCTIPPAR"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["PASVALORNUM"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["PASVALORTEX"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["PASVALORFEC"] . '</td>';

                if ($editar||$eliminar) { 
                    $cuerpo = $cuerpo . '<td style="text-align:center;">' . $editar . ' ' . $eliminar . '</td>';   
                }
                           
                $cuerpo = $cuerpo . '</tr>';
            }
        }
        $cuerpo = $cuerpo . '</tbody>';
        
        return $titulo . $cuerpo;
    }
    
    function cbo($estado, $empresa) {
        $result = $this->lista_clientes($estado, $empresa);
        $cuerpo = '';
        if (!$result) {} 
        else {
            foreach ($result as $row) {
                $cuerpo = $cuerpo . '<option value="' . $row->rut . '">' . '(' . $row->rut . ') ' . $row->nombre . '</option>';
            }    
        }
        
        return $cuerpo;
    }
}
