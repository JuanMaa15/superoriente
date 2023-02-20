<?php

class Conexion {

    protected $cnx;

    public static function conectar() {

        $user = "sa";
        $pass = "simona2021";

        try {
            $cnx = new PDO("sqlsrv:server=nombre_server;database=nombre_db", $user, $pass);
            return $cnx;
        } catch (Exception $e) {
            echo "Error al conectar con la base de datos ". $e->getMessage();
        }

        return null;

    }

}