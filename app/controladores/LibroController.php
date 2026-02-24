<?php

require_once ROOT_PATH . '/app/modelos/Libro.php';

class LibroController {

    public function index(){
        $database = new Database();
        $db = $database->getConnection();

        $libro = new Libro($db);
        $libros = $libro->obtenerTodos();

        require ROOT_PATH . '/app/vistas/libros/index.php';
    }
    //Funcion para agregar un nuevo libro
    public function crear(){
    $database = new Database();
    $db = $database->getConnection();

    $mensaje = "";

    if($_POST){
        $libro = new Libro($db);

        if($libro->existePorNombre($_POST['nombre'])){
            $mensaje = "El libro ya existe en la base de datos.";
        } else {

            $libro->crear(
                $_POST['nombre'],
                $_POST['autor'],
                $_POST['genero'],
                $_POST['idioma'],
                $_POST['cantidad'],
                $_POST['precio']
            );

            header("Location: /InvestigacionLIS/public/");
            exit;
        }
    }

    require ROOT_PATH . '/app/vistas/libros/crear.php';
    }
    //Funcion para eliminar libro
    public function eliminar(){

    session_start();

    if(isset($_GET['id']) && is_numeric($_GET['id'])){

        $database = new Database();
        $db = $database->getConnection();

        $libro = new Libro($db);
        $id = (int) $_GET['id'];

        //Verificar si tiene ventas, si es asi, no se podria eliminar
        if($libro->tieneVentas($id)){
            $_SESSION['mensaje_error'] = 
            "No se puede eliminar el libro porque cuenta con ventas en el historial.";
        } else {
            $libro->eliminar($id);
            $_SESSION['mensaje_exito'] = 
            "Libro eliminado correctamente.";
        }
    }

    header("Location: /InvestigacionLIS/public/");
    exit;
    }


}
?>