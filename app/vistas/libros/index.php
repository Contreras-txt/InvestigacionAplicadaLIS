<?php require ROOT_PATH . '/app/vistas/layout/header.php'; ?>
<br>
<h2>Inventario de Libros</h2>
<!--Mensajes al eliminar un libro-->
<?php 
session_start();

if(isset($_SESSION['mensaje_error'])): ?>
    <div class="mensaje">
        <?= $_SESSION['mensaje_error']; ?>
    </div>
    <?php unset($_SESSION['mensaje_error']); ?>
<?php endif; ?>

<?php if(isset($_SESSION['mensaje_exito'])): ?>
    <div class="mensaje">
        <?= $_SESSION['mensaje_exito']; ?>
    </div>
    <?php unset($_SESSION['mensaje_exito']); ?>
<?php endif; ?>

<div class="contenedor-tabla">
    <a href="/InvestigacionLIS/public/crear" class="btn-personalizado">
        Agregar Libro
    </a>
</div>

<table>
    <tr>
        <th><center>Nombre</center></th>
        <th><center>Autor</center></th>
        <th><center>Género</center></th>
        <th><center>Idioma</center></th>
        <th><center>Cantidad</center></th>
        <th><center>Precio</center></th>
        <th><center>Acción</center></th>
    </tr>
    <?php while($row = $libros->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['autor'] ?></td>
        <td><?= $row['genero'] ?></td>
        <td><?= $row['idioma'] ?></td>
        <td><?= $row['cantidad'] ?></td>
        <td>$<?= $row['precio'] ?></td>
        <td>
            <a href="/InvestigacionLIS/public/vender">Vender</a>
            <a href="/InvestigacionLIS/public/eliminar?id=<?= $row['id'] ?>" onclick="return confirm('¿Está seguro de eliminar este libro?');" class="btn-eliminar">Eliminar</a>
        </td>
    </tr>
    <?php } ?>
</table>

<?php require ROOT_PATH . '/app/vistas/layout/footer.php'; ?>