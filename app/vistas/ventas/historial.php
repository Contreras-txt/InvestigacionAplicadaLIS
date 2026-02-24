<?php require ROOT_PATH . '/app/vistas/layout/header.php'; ?>
<br>
<h2>Historial de Ventas</h2>

<table>
    <tr>
        <th><center>ID</center></th>
        <th><center>Libro</center></th>
        <th><center>Cantidad</center></th>
        <th><center>Total</center></th>
        <th><center>Fecha</center></th>
    </tr>

    <?php while($row = $ventas->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['nombre'] ?></td>
        <td><?= $row['cantidad'] ?></td>
        <td>$<?= $row['total'] ?></td>
        <td><?= $row['fecha'] ?></td>
    </tr>
    <?php } ?>
</table>

<?php require ROOT_PATH . '/app/vistas/layout/footer.php'; ?>