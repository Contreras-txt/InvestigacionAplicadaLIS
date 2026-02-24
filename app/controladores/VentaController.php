<?php

require_once ROOT_PATH . '/app/modelos/Venta.php';
require_once ROOT_PATH . '/app/modelos/Libro.php';

class VentaController {
    //Funcion para vender un libro
    public function vender() {

        $database = new Database();
        $db = $database->getConnection();

        $libroModel = new Libro($db);
        $ventaModel = new Venta($db);

        if($_POST){

            $libro_id = $_POST['libro_id'];
            $cantidad = $_POST['cantidad'];

            $libro = $libroModel->obtenerPorId($libro_id);

            if($libro['cantidad'] >= $cantidad){

                $total = $cantidad * $libro['precio'];

                $ventaModel->crear($libro_id, $cantidad, $total);
                $libroModel->reducirStock($libro_id, $cantidad);

                header("Location: /InvestigacionLIS/public/historial");
                exit;

            } else {
                $mensaje = "Stock insuficiente.";
            }
        }

        $libros = $libroModel->obtenerTodos();
        require ROOT_PATH . '/app/vistas/ventas/vender.php';
    }
    //funcion para visualizar el historial de ventas
    public function historial(){

        $database = new Database();
        $db = $database->getConnection();

        $ventaModel = new Venta($db);
        $ventas = $ventaModel->obtenerTodas();

        require ROOT_PATH . '/app/vistas/ventas/historial.php';
    }
}