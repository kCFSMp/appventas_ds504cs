<?php
    class CRUDProducto extends Conexion {

        //Listar Producto

        public function ListarProducto(){
            
            $arr_prod = null;

            $cn = $this->Conectar();

            $sql = "call sp_ListarProducto()";
            
            $snt = $cn->prepare($sql);

            $snt->execute();

            $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);

            $cn = null;

            return $arr_prod;
        }

        //Buscar Producto por codigo

        public function BuscarProductoPorCodigo($codprod) {
            $arr_prod = null;

            $cn = $this->Conectar();

            $sql = "call sp_BuscarProductoPorCodigo(:codprod)";
            
            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod" ,$codprod, PDO::PARAM_STR, 5);

            $snt->execute();

            $nr = $snt->rowCount();

            if($nr > 0) {
                $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
            }

            $cn = null;

            return $arr_prod;
        }

        //Mostrar Producto por codigo

        public function MostrarProductoPorCodigo($codprod) {
            $arr_prod = null;

            $cn = $this->Conectar();

            $sql = "call  sp_MostrarProductoPorCodigo(:codprod);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod", $codprod, PDO::PARAM_STR, 5);

            $snt->execute();

            $nr = $snt->rowCount();

            if($nr > 0){
                $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
            }

            $cn = null;

            return $arr_prod;
        }

        //Consultar Por Codigo(JSON)

        public function ConsultarProductoPorCodigo($codprod) {
            $arr_prod = null;

            $cn = $this->Conectar();

            $sql = "call sp_MostrarProductoPorCodigo(:codprod);";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod", $codprod, PDO::PARAM_STR, 5);

            $snt->execute();

            $nr = $snt->rowCount();

            if($nr > 0){
                $arr_prod = $snt->fetch(PDO::FETCH_OBJ);
            }

            $cn = null;

            echo json_encode($arr_prod);
        }

        //Filtrar Producto

        public function FiltrarProducto($valor) {
            $arr_prod = null;
        
            $cn = $this->Conectar();
        
            $sql = "CALL sp_FiltrarProducto(:valor)";
            
            $snt = $cn->prepare($sql);
        
            $snt->bindParam(":valor", $valor, PDO::PARAM_STR, 40);
        
            $snt->execute();
        
            $arr_prod = $snt->fetchAll(PDO::FETCH_OBJ);
        
            $nr = $snt->rowCount();
        
            if ($nr > 0) {
                echo "<table class ='table table-hover table-sm table-success table-striped'>";
                echo "<tr class='table-primary'>";
                echo "<th>N°</th>";
                echo "<th>Código</th>";
                echo "<th>Producto</th>";
                echo "<th>Stock Disponible</th>";
                echo "<th>Costo</th>";
                echo "<th>% Ganancia</th>";
                echo "<th>Precio</th>";
                echo "<th>Marca</th>";
                echo "<th>Categoría</th>";
                echo "</tr>";
                
                $i = 0; //Contador del numero de registros
                
        
                foreach ($arr_prod as $prod) {
                    $i++;
        
                    $precio = $prod->costo / (1 - ($prod->ganancia));
                    $ganancia = $prod->ganancia * 100;
        
                    echo "<tr>";
                    echo "<td>".$i."</th>";
                    echo "<td>".$prod->codigo_producto."</td>";
                    echo "<td>".$prod->producto."</td>";
                    echo "<td class='text-center'>".$prod->stock_disponible."</td>";
                    echo "<td>S/ ".$prod->costo."</td>";
                    echo "<td class='text-center'>".$ganancia."</td>";
                    echo "<td>S/ ".number_format($precio, 2)."</td>";
                    echo "<td>".$prod->nombre_marca."</td>";
                    echo "<td>".$prod->nombre_categoria."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<div class ='alert alert-danger alert-dismissible fade show' role ='alert'>";
                echo "No existen registros";
                echo "<button type='button' class='btn-clase' data-bs-dismiss='alert' aria-label>";
                echo "</div>";
            }
        
            $cn = null;
        }

    //Registrar Producto

    public function RegistrarProducto(Producto $producto) {
        try {
            $cn = $this->Conectar();

            $sql = "call sp_RegistrarProducto(:codprod, :prod, :stk, :cst, :gnc, :codmar, :codcat)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod", $producto->codigo_producto);
            $snt->bindParam(":prod", $producto->producto);
            $snt->bindParam(":stk", $producto->stock_disponible);
            $snt->bindParam(":cst", $producto->costo);
            $snt->bindParam(":gnc", $producto->ganancia);
            $snt->bindParam(":codmar", $producto->producto_codigo_marca);
            $snt->bindParam(":codcat", $producto->producto_codigo_categoria);

            $snt ->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    }

    //Editar Producto

    public function EditarProducto(Producto $producto){
        try{
            $cn = $this->Conectar();

            $sql = "call sp_EditarProducto(:codprod, :prod, :stk, :cst, :gnc, :codmar, :codcat)";

            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod", $producto->codigo_producto);
            $snt->bindParam(":prod", $producto->producto);
            $snt->bindParam(":stk", $producto->stock_disponible);
            $snt->bindParam(":cst", $producto->costo);
            $snt->bindParam(":gnc", $producto->ganancia);
            $snt->bindParam(":codmar", $producto->producto_codigo_marca);
            $snt->bindParam(":codcat", $producto->producto_codigo_categoria);

            $snt ->execute();

            $cn = null;
        } catch (PDOException $ex) {
            die($ex ->getMessage());
        }
    }

    //Borrar Producto

    public function BorrarProducto($codprod) {
        try{

            $cn = $this->Conectar();

            $sql = "call sp_BorrarProducto(:codprod)";
            
            $snt = $cn->prepare($sql);

            $snt->bindParam(":codprod" ,$codprod);

            $snt->execute();

            $cn = null;

        }catch (PDOException $ex) {
            die($ex->getMessage()); 
        }
    }
}