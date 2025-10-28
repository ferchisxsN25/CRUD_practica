<!-- READ (leer) PARTE VISUAL DONDE SE PROYECTAN LOS DATOS DE LAS PERSONAS EN UNA TABLA-->
<link rel="stylesheet" href="public/css/bootstrap.min.css">
<?php
    include 'bd.php';
    $con = conectar();
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
    margin-bottom: 30px;
  }
  
  .table {
    background-color: #3a3a3a;
    color: #f0f0f0;
    border-radius: 10px;
    overflow: hidden;
  }

  .table thead {
    background-color: #4b3f5d; 
  }

  .table tbody tr:hover {
    background-color: #514665; 
    transition: 0.3s ease-in-out;
  }

  
  .btn-purple {
    background-color: #b38bfa;
    color: white;
    font-weight: bold;
    border: none;
    border-radius: 10px;
    box-shadow: 0 3px 6px rgba(179,139,250,0.3);
  }

  .btn-purple:hover {
    background-color: #9d6ff5; 
    color: white; 
    transform: scale(1.05);
  }
  
  .btn-blue {
    background-color: #7aa8ff;
    color: white;
    font-weight: bold;
    border-radius: 10px;
    border: none;
  }

  .btn-blue:hover {
    background-color: #6695f0;
    color: white !important;
    transform: scale(1.05);
  }

  .btn-red {
    background-color: #ff7a7a;
    color: white;
    font-weight: bold;
    border-radius: 10px;
    border: none;
  }

  .btn-red:hover {
    background-color: #e96565;
    color: white !important;
    transform: scale(1.05);
  }

  .container {
    background-color: #333;
    padding: 3rem;
    border-radius: 15px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.4);
  }
</style>


<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>CRUD </title>
    </head>

    <body class="container mt-5">

        <h2>CRUD: Datos de Personas</h2>
        
        <a href="create.php" class="btn btn-purple mb-3">Agregar Persona</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "select * from personas ORDER BY id";
                    $result = pg_query($con, $query);

                    while ($row = pg_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['correo']}</td>
                                <td>{$row['direccion']}</td>
                                <td>{$row['telefono']}</td>
                                <td>
                                    <a href='update.php?id={$row['id']}' class='btn btn-blue btn-sm'>Editar</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-red btn-sm'onclick='return confirm(\"¿Estás seguro de que quieres eliminar este registro?\");'>
                                    Eliminar</a>
                               </td>
                            </tr>";
                    }
                ?>
            </tbody>
        </table>

    </body>
</html>