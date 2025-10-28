<?php
    function conectar (){
        $host = "localhost";
        $port = "5432";
        $dbname = "crud_bd";
        $user = "postgres";
        $password = "fer131625N";

        $con = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");


        if(!$con){
            die ("Error al intentar conectar a la base de datos". pg_last_error());
        }

        return $con;

    }
?>