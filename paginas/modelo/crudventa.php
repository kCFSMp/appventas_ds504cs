<?php

class CrudVenta extends Conexion{

    public function ListarVenta(){
        $arr_ven = null;
        $cn = $this->Conectar();
        $sql = "call sp_ListarVentas()";
        $snt = $cn->prepare($sql);
        $snt->execute();
        $arr_ven = $snt->fetchAll(PDO::FETCH_OBJ);
        $cn = null;

        return $arr_ven;
    }

}






