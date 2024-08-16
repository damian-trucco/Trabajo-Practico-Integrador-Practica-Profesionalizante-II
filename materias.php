<?php
require 'db.php';

if (isset($_GET['carrera_id'])) {
    $carrera_id = $_GET['carrera_id'];

    $sql = "SELECT * FROM materias WHERE carrera_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$carrera_id]);
    $materias = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materias Disponibles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .materia {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Materias disponibles</h1>
        <form action="inscribir.php" method="POST">
            <input type="hidden" name="carrera_id" value="<?php echo $carrera_id; ?>">
            <?php foreach ($materias as $materia) { ?>
                <div class="materia">
                    <input type="checkbox" name="materias[]" value="<?php echo $materia['id']; ?>">
                    <?php echo $materia['nombre']; ?> (Año <?php echo $materia['anio']; ?>)
                </div>
            <?php } ?>
            <br>
            <input type="submit" value="Inscribirse">
        </form>
    </div>
</body>
</html>

