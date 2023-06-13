<?php

class UserAccessModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listUserAccess()
    {
        $sql = "SELECT * FROM distribuidora.acceso";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function insertUserAccess($emp_documento, $acce_usuario, $acce_contrasena)
    {
        $sql = " INSERT INTO distribuidora.acceso   (emp_documento,acce_usuario,acce_contrasena)
                 VALUES  ('$emp_documento','$acce_usuario','$acce_contrasena');
                ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function consultDocumentUserAccess($emp_documento)
    {
        $sql = "SELECT * FROM distribuidora.acceso WHERE emp_documento = '$emp_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }



    function selectAccessModel($emp_documento)
    {
        $sql = " SELECT * FROM distribuidora.acceso WHERE emp_documento = '$emp_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateDocumentUserAccessRepeat($emp_documento)
    {
        $sql = "SELECT * FROM distribuidora.acceso WHERE emp_documento = '$emp_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateUserAccess($emp_documento, $emp_documento1, $acce_usuario, $acce_contrasena)
    {
        $sql = "UPDATE distribuidora.acceso SET
        
            acce_usuario = '$acce_usuario',
            acce_contrasena = '$acce_contrasena'
            WHERE emp_documento = '$emp_documento1'
            ";
        $this->Connection->query($sql);
    }


}
