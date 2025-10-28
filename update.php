<link rel="stylesheet" href="public/css/bootstrap.min.css">
<?php
    include 'bd.php';
    $con = conectar();

    if (!isset($_GET['id'])) {
        header("Location: read.php");
        exit();
    }

    $id = $_GET['id'];
    $query = "select * from personas where id = $id";
    $result = pg_query($con, $query);
    $persona = pg_fetch_assoc($result);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $updateQuery = "update personas set nombre='$nombre', correo='$correo', direccion='$direccion', telefono='$telefono'
                        where id=$id";
        $updateResult = pg_query($con, $updateQuery);

        if ($updateResult) {
            header("Location: read.php?mensaje=Registro actualizado");
            exit();
        } else {
            $error = "Error al actualizar: " . pg_last_error($con);
        }
    }
?>

<style>
    body {
      background-color: #2b2b2b;
      color: #eaeaea;
      font-family: 'Segoe UI', sans-serif;
    }

    h2 {
      color: #d9c3ff;
      text-align: center;
      margin-bottom: 25px;
    }

    .form-container {
      background-color: #3a3a3a;
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 4px 20px rgba(0,0,0,0.4);
    }

    label {
      color: #dcdcdc;
      font-weight: 600;
    }

    .form-control {
      background-color: #4a4a4a;
      border: 1px solid #666;
      color: #fff;
    }

    .form-control:focus {
      background-color: #514665;
      border-color: #b38bfa;
      color: #fff;
      box-shadow: 0 0 5px #b38bfa;
    }

    .btn-purple {
      background-color: #b38bfa;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      box-shadow: 0 3px 6px rgba(179,139,250,0.3);
      transition: 0.2s ease;
    }

    .btn-purple:hover {
      background-color: #9d6ff5;
      color: white !important;
      transform: scale(1.05);
    }

    .btn-blue {
      background-color: #7aa8ff;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 10px;
      transition: 0.2s ease;
    }

    .btn-blue:hover {
      background-color: #6695f0;
      color: white !important;
      transform: scale(1.05);
    }

    .alert-danger {
      background-color: #ff7a7a;
      border: none;
      color: white;
      border-radius: 10px;
      text-align: center;
      font-weight: 500;
    }
    
</style>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UPDATE: Editar Persona</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="w-100" style="max-width: 700px;">
        <div class="container form-container m-5">

            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

            <form method="POST" action="">
                <h2>Editar Persona</h2>

                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre" value="<?= htmlspecialchars($persona['nombre']) ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Correo</label>
                    <input type="email" name="correo" value="<?= htmlspecialchars($persona['correo']) ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Dirección</label>
                    <input type="text" name="direccion" value="<?= htmlspecialchars($persona['direccion']) ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" value="<?= htmlspecialchars($persona['telefono']) ?>" class="form-control">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="read.php" class="btn btn-purple">Volver</a>
                    <button type="submit" class="btn btn-blue">Actualizar</button>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
