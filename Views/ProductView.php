<?php
class ProductView
{
    function paginateProduct($array_product)
    {
?>
        <div class="card">
            <div class="card-header text-center bg-secondary text-black">
                Registrar Producto
            </div>
            <div class="card-body">
                <form action="" id="insert_product">
                    <div class="row">


                        <div class="form-group col-md-6">
                            <label for="">COD PRODUCTO</label>
                            <input type="text" class="form-control" name="cod_producto" id="cod_producto" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE</label>
                            <input type="text" class="form-control" name="prod_nombre" id="prod_nombre" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">DESCRIPCION</label>
                            <input type="text" class="form-control" name="prod_descripcion" id="prod_descripcion" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">VALOR</label>
                            <input type="number" class="form-control" name="valor" id="valor" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">STOCK</label>
                            <input type="number" class="form-control" name="stock" id="stock" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">ENTRADA</label>
                            <input type="number" class="form-control" name="entrada" id="entrada" required>
                        </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-info float-right" onclick="Product.insertProduct()">
                                <i class=""> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <br>

        <div class="card">
            <div class="card-header text-center bg-secondary text-black">
                Listar Producto
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tabla-striped">
                        <thead>
                            <tr class="text-justify">
                                <th>COD PRODUCTO</th>
                                <th>NOMBRE</th>
                                <th>DESCRIPCION</th>
                                <th>VALOR</th>
                                <th>STOCK</th>
                                <th>ENTRADA</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_product as $object_product) {
                                $cod_producto = $object_product->cod_producto;
                                $prod_nombre = $object_product->prod_nombre;
                                $prod_descripcion = $object_product->prod_descripcion;
                                $valor = $object_product->valor;
                                $stock = $object_product->stock;
                                $entrada = $object_product->entrada;
                            ?>
                                <tr class="text-justify">
                                    <td><?= $cod_producto ?></td>
                                    <td><?= $prod_nombre ?></td>
                                    <td><?= $prod_descripcion ?></td>
                                    <td><?= $valor ?></td>
                                    <td><?= $stock ?></td>
                                    <td><?= $entrada ?></td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Product.showProduct('<?= $cod_producto ?>')"></i>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php
    }
    function showProduct($array_product)
    {
        $cod_producto = $array_product[0]->cod_producto;
        $prod_nombre = $array_product[0]->prod_nombre;
        $prod_descripcion = $array_product[0]->prod_descripcion;
        $valor = $array_product[0]->valor;
        $stock = $array_product[0]->stock;
        $entrada = $array_product[0]->entrada;
    ?>
        <div class="card">
            <div class="card-body">

                <form action="" id="update_product">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">COD PRODUCTO</label>
                            <input type="text" class="form-control" name="cod_producto" id="cod_producto" value="<?= $cod_producto ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE</label>
                            <input type="text" class="form-control" name="prod_nombre" id="prod_nombre" value="<?= $prod_nombre ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">DESCRIPCION</label>
                            <input type="text" class="form-control" name="prod_descripcion" id="prod_descripcion" value="<?= $prod_descripcion ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">VALOR</label>
                            <input type="number" class="form-control" name="valor" id="valor" value="<?= $valor ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">STOCK</label>
                            <input type="number" class="form-control" name="stock" id="stock" value="<?= $stock ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">ENTRADA</label>
                            <input type="number" class="form-control" name="entrada" id="entrada" value="<?= $entrada ?>" required>
                        </div>

                    </div>
                    <input type="hidden" name="id" id="id" value="<?= $cod_producto ?>">
                    <br>
                    <button type="button" class="btn btn-primary" onclick="Product.updateProduct()">
                        <i class=""> Guardar</i>
                    </button>
                </form>
            </div>
        </div>
<?php
    }
}
