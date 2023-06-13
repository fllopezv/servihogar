<?php

class Connection
{
    private $link;
    private $result;
    
    function __construct($option)
    {
        $ip="localhost";
        $data_base="servihogar";
        $user="postgres";
        $password="123";

        try
        {
            $connectionString = "pgsql:host=".$ip.";dbname=".$data_base.";";
            $this->link = new PDO($connectionString,$user,$password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "CONEXION EXITOSA";

        }
        catch(PDOException $e)
        {
            exit($e->getMessage());
        }
    }

    function query($sql)
    {
        $this->result=$this->link->query($sql) or exit('Consulta mal estructurada');
    }

    function fetchAll()
    {
        return $this->result->fetchAll(PDO::FETCH_OBJ);
    }
}
