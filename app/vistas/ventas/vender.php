<?php require ROOT_PATH . '/app/vistas/layout/header.php'; ?>
<br>
<h2>Registrar Venta</h2>
<!--Muestra mensaje en caso el libro ya no tenga stock-->
<?php if(isset($mensaje)) { ?>
    <p class="mensaje"><?= $mensaje ?></p>
<?php } ?>

<form method="POST">
    <label>Libro:</label>
    <select name="libro_id" required>
        <?php while($row = $libros->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $row['id'] ?>">
                <?= $row['nombre'] ?> (Stock: <?= $row['cantidad'] ?>)
            </option>
        <?php } ?>
    </select>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" min="1" required>

    <div>
        <br>
        <button type="submit" class="btn-personalizado">Vender</button>
    </div>
</form>

<a href="index.php?action=historial" class="btn-secundario">
    Ver Historial
</a>

<?php require ROOT_PATH . '/app/vistas/layout/footer.php'; ?>