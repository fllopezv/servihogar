<?php

class ProviderModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listProvider()
    {
        $sql = "SELECT pr.* , pa.* , de.* , ci.* FROM
            distribuidora.proveedor pr,
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

    function selectProvider($nit)
    {
        $sql = "SELECT * FROM distribuidora.proveedor WHERE nit = '$nit'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function insertProvider($nit, $nombre, $direccion, $celular, $cod_pais, $cod_departamento, $cod_ciudad)
    {
        $sql = "INSERT INTO distribuidora.proveedor (nit,nombre,direccion,celular,cod_pais,cod_departamento,cod_ciudad)
                VALUES ('$nit','$nombre','$direccion','$celular','$cod_pais','$cod_departamento','$cod_ciudad')
                ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateProvider($nit, $nombre, $direccion, $celular, $cod_pais, $cod_departamento, $cod_ciudad)
    {
        $sql = "UPDATE distribuidora.proveedor SET
            nombre = '$nombre',
            direccion = '$direccion',
            celular = '$celular',
            cod_pais = '$cod_pais',
            cod_departamento = '$cod_departamento',
            cod_ciudad = '$cod_ciudad'
            WHERE
            nit = '$nit'
        ";
        $this->Connection->query($sql);
    }
}
