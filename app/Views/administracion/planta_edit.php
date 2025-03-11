<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Planta</title>
</head>
<body>
    <h1>Editar Planta</h1>
    <form action="<?=base_url()?>plantas/update/<?= $planta['id']; ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?= esc($planta['nombre']) ?>"><br>

        <label for="variedad">Variedad:</label>
        <input type="text" name="variedad" id="variedad" value="<?= esc($planta['variedad']) ?>"><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"><?= esc($planta['descripcion']) ?></textarea><br>

        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
