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
                if ($editar) { $editar = '<a href="Clientes/Clientes/EditarCliente/' . $row["pascodigo"] . '" data-backdrop="static" data-toggle="modal" data-target="#remoteModal" class="btn btn-primary btn-xs">Editar</a>'; }
                if ($eliminar) { $eliminar = '<a href="Clientes/Clientes/EliminarCliente/' . $row["pascodigo"] . '" class="btn btn-danger btn-xs btnEliminar">Eliminar</a>'; }
                
                $cuerpo = $cuerpo . '<tr>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["pascodigo"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">'     . $row["pasnombre"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">'     . $row["pasdescripcion"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:left;">'     . $row["desctippar"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["pasvalornum"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["pasvalortex"] . '</td>';
                $cuerpo = $cuerpo . '<td style="text-align:center;">'   . $row["pasvalorfec"] . '</td>';

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
