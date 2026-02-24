<?php
class Libro {
    private $conn;
    private $table = "libros";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function obtenerTodos() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function crear($nombre, $autor, $genero, $idioma, $cantidad, $precio) {
        $query = "INSERT INTO " . $this->table . "
                  SET nombre=?, autor=?, genero=?, idioma=?, cantidad=?, precio=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$nombre, $autor, $genero, $idioma, $cantidad, $precio]);
    }

    public function reducirStock($id, $cantidad) {
        $query = "UPDATE libros SET cantidad = cantidad - ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$cantidad, $id]);
    }

    public function obtenerPorId($id) {
        $query = "SELECT * FROM libros WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //funcion para que antes de agregar un nuevo libro, se verifique si ya existe en la base de datos
    public function existePorNombre($nombre) {
    $query = "SELECT COUNT(*) as total FROM libros WHERE nombre = :nombre";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['total'] > 0;
    }

    //funcion que verifica si el libro ya se ha vendido
    public function tieneVentas($id){
    $query = "SELECT COUNT(*) as total FROM ventas WHERE libro_id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['total'] > 0;
    }

    //funcion para eliminar el libro
    public function eliminar($id){
    $query = "DELETE FROM libros WHERE id = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    return $stmt->execute();
    }
}
?>