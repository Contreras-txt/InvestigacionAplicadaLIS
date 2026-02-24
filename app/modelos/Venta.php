<?php
class Venta {
    private $conn;
    private $table = "ventas";

    public function __construct($db) {
        $this->conn = $db;
    }
    //funcion para crear una nueva venta
    public function crear($libro_id, $cantidad, $total) {
        $query = "INSERT INTO " . $this->table . "
                  (libro_id, cantidad, total)
                  VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$libro_id, $cantidad, $total]);
    }
    //funcion para seleccionar el libro
    public function obtenerTodas() {
        $query = "SELECT v.id, l.nombre, v.cantidad, v.total, v.fecha
                  FROM ventas v
                  INNER JOIN libros l ON v.libro_id = l.id
                  ORDER BY v.fecha DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>