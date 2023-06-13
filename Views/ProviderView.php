<?php
class ProviderView
{
    function paginateProvider($array_provider, $array_pais)
    {
?>
        <div class="card">
            <div class="card-header text-center bg-secondary text-black">
                Registrar Proveedor
            </div>
            <br>
            <div class="card-body">
                <form action="" id="insert_proveedor">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">NIT:</label>
                            <input type="text" class="form-control" name="nit" id="nit" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">DIRECCION:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">CELULAR:</label>
                            <input type="text" class="form-control" name="celular" id="celular" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">PAIS</label>
                            <select class="form-select" name="cod_pais" id="cod_pais" onchange="Provider.Pais(this.value)">
                                <option value="">Seleccione...</option>
                                <?php
                                if ($array_pais) {
                                    foreach ($array_pais as $object_pais) {
                                        $cod_pais = $object_pais->cod_pais;
                                        $nombre_pais = $object_pais->nombre_pais;
                                ?>



                                        <option value="<?= $cod_pais ?>"><?= $nombre_pais ?></option>

                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="">
                                <label for="exampleSelectRounded0">DEPARTAMETO</code></label>
                                <select class="form-select" id="cod_departamento" name="cod_departamento" onchange="Provider.Departamento(this.value)">
                                    <option>SELECCIONE...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="">
                                <label for="exampleSelectRounded0">CIUDAD</code></label>
                                <select class="form-select" id="cod_ciudad" name="cod_ciudad" onchange="Provider.ciudad(this.value)">
                                    <option>SELECCIONE...</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class=" row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-info float-right" onclick="Provider.insertProvider()">
                                <i class=""> Guardar</i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header text-center bg-secondary text-black">
                Lista de Proveedores
            </div>
            <div class="card-body">
                <br>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="text-justify">
                                <th>NIT</th>
                                <th>NOMBRE</th>
                                <th>DIRECCION</th>
                                <th>CELULAR</th>
                                <th>PAIS</th>
                                <th>DEPARTAMENTO</th>
                                <th>CIUDAD</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($array_provider as $object_provider) {
                                $nit = $object_provider->nit;
                                $nombre = $object_provider->nombre;
                                $direccion = $object_provider->direccion;
                                $celular = $object_provider->celular;
                                $cod_pais = $object_provider->nombre_pais;
                                $cod_departamento = $object_provider->nombre_departamento;
                                $cod_ciudad = $object_provider->nombre_ciudad;
                            ?>
                                <tr class="text-justify">
                                    <td><?= $nit ?></td>
                                    <td><?= $nombre ?></td>
                                    <td><?= $direccion ?></td>
                                    <td><?= $celular ?></td>
                                    <td><?= $cod_pais ?></td>
                                    <td><?= $cod_departamento ?></td>
                                    <td><?= $cod_ciudad ?></td>
                                    <td style="text-align: center;">
                                        <i class="bi bi-pencil-fill" onclick="Provider.showProvider('<?= $nit ?>')"></i>
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
    function showProvider($array_provider, $array_pais)
    {
        $nit = $array_provider[0]->nit;
        $nombre = $array_provider[0]->nombre;
        $direccion = $array_provider[0]->direccion;
        $celular = $array_provider[0]->celular;
        $cod_pais = $array_provider[0]->cod_pais;
        $cod_departamento = $array_provider[0]->cod_departamento;
        $cod_ciudad = $array_provider[0]->cod_ciudad;
    ?>
        <div class="card">
            <div class="card-body">
                <form action="" id="update_provider">
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="">NIT:</label>
                            <input type="text" class="form-control" name="nit" id="nit" value="<?= $nit ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">NOMBRE:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $nombre ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">DIRECCION:</label>
                            <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $direccion ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">CELULAR:</label>
                            <input type="text" class="form-control" name="celular" id="celular" value="<?= $celular ?>" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="">PAIS</label>
                            <select class="form-select" name="cod_pais" id="cod_pais" onchange="Provider.u_Pais(this.value)">
                                <option value="">Seleccione...</option>
                                <?php
                                if ($array_pais) {
                                    foreach ($array_pais as $object_pais) {
                                        $cod_pais = $object_pais->cod_pais;
                                        $nombre_pais = $object_pais->nombre_pais;
                                ?>
                                        <option value="<?= $cod_pais ?>"><?= $nombre_pais ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="">
                                <label for="exampleSelectRounded0">DEPARTAMETO</code></label>
                                <select class="form-select" id="u_proveedor_departamento" name="u_proveedor_departamento" onchange="Provider.u_Departamento(this.value)">
                                    <option>SELECCIONE...</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="">
                                <label for="exampleSelectRounded0">CIUDAD</code></label>
                                <select class="form-select" id="u_proveedor_ciudad" name="u_proveedor_ciudad" onchange="Provider.u_ciudad(this.value)">
                                    <option>SELECCIONE...</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <input type="hidden" id="id" name="id" value="<?= $nit; ?>">
                    <br>
                    <button type="button" class="btn btn-primary" onclick="Provider.updateProvider()">
                        <i class="bi bi-check-square"> Guardar</i>
                    </button>
                </form>
            </div>
        </div>
<?php
    }
}
