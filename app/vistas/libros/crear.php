<?php require ROOT_PATH . '/app/vistas/layout/header.php'; ?>
<br>
<h2>Agregar Nuevo Libro</h2>
<!--Muestra mensaje en caso el libro a agregar ya existe en la base de datos-->
<?php if(isset($mensaje)) { ?>
    <p class="mensaje"><?= $mensaje ?></p>
<?php } ?>

<form method="POST">

    <label>Nombre:</label>
    <input type="text" name="nombre" required>

    <label>Autor:</label>
    <input type="text" name="autor" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" title="Solo se permiten letras" required>

    <label>Género:</label>
    <select name="genero" required>
        <option value="">Seleccione un género</option>
        <option value="Novela">Novela</option>
        <option value="Ciencia Ficción">Ciencia Ficción</option>
        <option value="Fantasía">Fantasía</option>
        <option value="Misterio / Suspenso">Misterio / Suspenso</option>
        <option value="Romance">Romance</option>
        <option value="Terror">Terror</option>
        <option value="Ensayo">Ensayo</option>
        <option value="Poesía">Poesía</option>
        <option value="Biografía / Autobiografía">Biografía / Autobiografía</option>
        <option value="Historia">Historia</option>
        <option value="Infantil / Juvenil">Infantil / Juvenil</option>
        <option value="Autoayuda">Autoayuda</option>
    </select>

    <label>Idioma:</label>
    <select name="idioma" required>
        <option value="">Seleccione un idioma</option>
        <option value="Inglés">Inglés</option>
        <option value="Chino (Mandarín)">Chino (Mandarín)</option>
        <option value="Español">Español</option>
        <option value="Alemán">Alemán</option>
        <option value="Francés">Francés</option>
        <option value="Japonés">Japonés</option>
        <option value="Ruso">Ruso</option>
        <option value="Portugués">Portugués</option>
        <option value="Italiano">Italiano</option>
        <option value="Coreano">Coreano</option>
        <option value="Árabe">Árabe</option>
    </select>

    <label>Cantidad:</label>
    <input type="number" name="cantidad" min="0" required>

    <label>Precio:</label>
    <input type="number" step="0.01" name="precio" required>

    <div>
        <br>
        <button type="submit" class="btn-personalizado">Guardar Libro</button>
    </div>
</form>

<?php require ROOT_PATH . '/app/vistas/layout/footer.php'; ?>