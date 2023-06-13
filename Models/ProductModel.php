<?php
class ProductModel
{
    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    function listProduct()
    {
        $sql = "SELECT * FROM distribuidora.producto";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function insertProduct($cod_producto, $prod_nombre, $prod_descripcion, $valor, $stock, $entrada)
    {
        $sql = "INSERT INTO distribuidora.producto  (cod_producto,prod_nombre,prod_descripcion,valor,stock,entrada)
                VALUES  ('$cod_producto','$prod_nombre','$prod_descripcion','$valor','$stock','$entrada')
                ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function selectProduct($cod_producto)
    {
        $sql = "SELECT * FROM distribuidora.producto WHERE cod_producto = '$cod_producto'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function updateProduct($cod_producto, $prod_nombre, $prod_descripcion, $valor, $stock, $entrada)
    {
        $sql = "UPDATE distribuidora.producto SET
        prod_nombre = '$prod_nombre',
        prod_descripcion = '$prod_descripcion',
        valor = '$valor',
        stock = '$stock',
        entrada = '$entrada'
        WHERE
        cod_producto = '$cod_producto'
        ";
        $this->Connection->query($sql);
    }

    function consultProduct($cod_producto){
        $sql = "SELECT * FROM distribuidora.producto WHERE cod_producto = '$cod_producto'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
