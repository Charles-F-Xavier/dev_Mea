<?php

class Data
{
    private array $con_info = [
        "host" => "localhost",
        "user" => "root",
        "passwd" => "",
        "database" => "dev_measesoro",
        "port" => 3306
    ];


    public mixed $nameDB = null;

    private ?mysqli $con;

    public function __construct()
    {
        $this->con = new mysqli(
            $this->con_info["host"],
            $this->con_info["user"],
            $this->con_info["passwd"],
            $this->con_info["database"],
            $this->con_info["port"]
        );

        $this->nameDB = $this->con_info["database"];

        if ($this->con->connect_error) {
            die("Error de conexión! : " . $this->con->connect_error);
        }
    }

    public function getConnection(): mysqli
    {
        return $this->con;
    }

    public function isUserPassValid($correo, $pass): bool
    {
        $sql = "SELECT COUNT(*) AS 'existe' FROM usuario WHERE correo = '$correo' AND clave = SHA2('$pass', 0);";

        $result = $this->con->query($sql);

        return ($result && $result->fetch_assoc()['existe'] > 0);
    }

    public function getUserbyMail($correo)
    {
        $sql = "SELECT * FROM usuario WHERE correo = '$correo';";

        $query = $this->con->query($sql);

        if ($query) {
            $result = $query->fetch_assoc();
            return $result;
        } else {
            return $this->con->error; // Retorna el mensaje de error de la conexión.
        }
    }

}