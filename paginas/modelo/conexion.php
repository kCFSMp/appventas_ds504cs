<?php

class conexion{
    private $usuario = "root";
    private $servidor = "localhost";
    private $base = "bd_ventas_ds504";

    public function Conectar(){
        try{
            $cnx = new PDO("mysql:host=$this->servidor; dbname=$this->base;",
                            $this->usuario);
            $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cnx;
        }catch(\Throwable $th){
            echo "Hubo un error: ".$th->getMessage();
        }
    }
}


