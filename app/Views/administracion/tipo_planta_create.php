<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Planta</title>
</head>
<body>
    <h1>Agregar Nueva Planta</h1>
    <form action="<?=base_url()?>plantas/store" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= old('nombre') ?>"><br>

        <label for="variedad">Variedad:</label>
        <input type="text" name="variedad" id="variedad" value="<?= old('variedad') ?>"><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"><?= old('descripcion') ?></textarea><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>
