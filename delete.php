<!-- DELETE (ELIMINAR) ESTE ELIMINA REGISTROS -->
<?php
    include 'bd.php';
    $con = conectar();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $deleteQuery = "delete from personas where id = $id";
        $result = pg_query($con, $deleteQuery);

        if ($result) {
            header("Location: index.php?mensaje=Registro eliminado correctamente");
            exit();
        } else {
            echo "Error al eliminar el registro: " . pg_last_error($con);
        }
    } else {
        echo "ID no especificado.";
    }
?>
