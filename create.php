<!-- ESTA PARTE EN EL "CRUD" ES LA DE "CREATE" (CREAR), PERMITE AGREGAR NUEVOS REGISTROS -->  
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<?php
    include 'bd.php';
    $con = conectar();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];

        $query = "insert into personas (nombre, correo, direccion, telefono) 
                  values ('$nombre', '$correo', '$direccion', '$telefono')";
        $result = pg_query($con, $query);

        if ($result) {
            header("Location: read.php?mensaje=Registro agregado");
            exit();
        } else {
            $error = "Error al agregar la persona: " . pg_last_error($con);
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
      transform: scale(1.05);
    }

  </style>

<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>CREATE: Agregar Persona</title>
    
    </head>

    <body class="d-flex justify-content-center align-items-center vh-100">

    <div class="w-100" style="max-width: 700px;"> 
        <div class="container form-container m-5">

        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

        <form method="POST" action="">
            <h2>Agregar Persona </h2>
            
            <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" required>
            </div>

            <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control">
            </div>

            <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control">
            </div>
            
            <div class="d-flex justify-content-between mt-4">
            <a href="read.php" class="btn btn-purple">Volver</a>
            <button type="submit" class="btn btn-blue">Guardar</button>
            </div>
        </form>

        </div>
    </div>

    </body>
</html>
