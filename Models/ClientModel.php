<?php

class ClientModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listClient()
    {
        //$sql = "SELECT * FROM distribuidora.cliente";
        $sql = "SELECT pr.* , pa.* , de.* , ci.* FROM
        distribuidora.cliente pr,
        distribuidora.pais pa,
        distribuidora.departamento de,
        distribuidora.ciudad ci
        WHERE
        pr.cod_pais = pa.cod_pais AND
        pr.cod_departamento = de.cod_departamento AND
        pr.cod_ciudad = ci.cod_ciudad
        ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

  

    function insertClient($clie_documento, $clie_nombre1, $clie_nombre2, $clie_apellido1, $clie_apellido2, $clie_direccion, $clie_sexo, $clie_celular, $clie_email, $clie_pais, $clie_departamento, $clie_ciudad)
    {
        $sql = "INSERT INTO distribuidora.cliente (clie_documento,clie_nombre1,clie_nombre2, clie_apellido1,clie_apellido2 ,clie_direccion ,clie_sexo ,clie_celular ,clie_email ,cod_pais ,cod_departamento ,cod_ciudad)
                VALUES ('$clie_documento','$clie_nombre1','$clie_nombre2','$clie_apellido1','$clie_apellido2','$clie_direccion','$clie_sexo','$clie_celular','$clie_email','$clie_pais','$clie_departamento','$clie_ciudad')
        ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function selectClient($clie_documento)
    {
        $sql = "SELECT * FROM distribuidora.cliente WHERE clie_documento = '$clie_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function UpdateClient($clie_documento, $clie_nombre1, $clie_nombre2, $clie_apellido1, $clie_apellido2, $clie_direccion, $clie_sexo, $clie_celular, $clie_email, $clie_pais, $clie_departamento, $clie_ciudad)
    {
        $sql = "UPDATE distribuidora.cliente SET
            clie_nombre1 = '$clie_nombre1',
            clie_nombre2 = '$clie_nombre2',
            clie_apellido1 = '$clie_apellido1',
            clie_apellido2 = '$clie_apellido2',
            clie_direccion = '$clie_direccion',
            clie_sexo = '$clie_sexo',
            clie_celular = '$clie_celular',
            clie_email = '$clie_email',
            cod_pais = '$clie_pais',
            cod_departamento = '$clie_departamento',
            cod_ciudad = '$clie_ciudad'
            WHERE
            clie_documento = '$clie_documento'
        ";
        $this->Connection->query($sql);
    }

    function consultDocumentClient($clie_documento)
    {
        $sql = "SELECT * FROM distribuidora.cliente WHERE clie_documento='$clie_documento'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    
}
