<?php
class AccessModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function validateFormSession($email,$password)
    {
        $sql="SELECT * FROM distribuidora.acceso
              WHERE acce_usuario='$email' 
              AND acce_contrasena='$password'
              ";

        $this->Connection->query($sql);

        return $this->Connection->fetchAll();
    }


}
?>