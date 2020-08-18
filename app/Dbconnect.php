<?php

namespace CLS;

use \PDO;

class Dbconnect
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;
    private $charset;
    private $port;

    public function Dbconnect()
    {
        $this->db_host = "127.0.0.1";
        $this->db_name = "CLS";
        $this->db_user = "root";
        $this->db_pass = "root";
        $this->charset = "utf8mb4";
        $this->port = "8889";

        try {
            $dns = "mysql:host=" . $this->db_host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=" . $this->charset;
            $pdo = new PDO($dns, $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            echo "Connexion failed:" .$e->getMessage();
        }

    }
}
