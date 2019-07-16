<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <!-- SCRIPT JQUERY DATEPICKER -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/cupertino/jquery-ui.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
<header class="fluid-container">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../recursos/images/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
            PassageSystem
        </a>
    </nav>
</header>
<section class="container">
    <article>
            <div class="card text-center">
                <div class="card-header">
                    Viaje Seleccionado
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="p-2 bd-highlight w-25">
                            <ul class="list-group">
                                <li class="list-group-item">Ciudad Salida</li>
                                <li class="list-group-item">Ciudad Destino</li>
                                <li class="list-group-item">Fecha de Salida</li>
                                <li class="list-group-item">Día de Salida</li>
                                <li class="list-group-item">Tarifa Normal</li>
                            </ul>
                        </div>
                        <div class="p-2 bd-highlight w-25">
                            <ul class="list-group">
                                <li class="list-group-item"><?php echo $datosViaje[0]->origen ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->destino ?></li>
                                <li class="list-group-item"><?php echo $datos['fecha'] ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->hora ?></li>
                                <li class="list-group-item"><?php echo $datosViaje[0]->tarifa ?></li>
                            </ul>
                        </div>
                    </div>


                </div>
                <div class="card-footer text-muted">
                    <table class="table table-borderless">
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <?php
                        $x = 0;
                        $fila = 0;
                        for ($x;$x<$datosViaje[0]->capacidadSuperior;$x++){
                            echo "<tr>" ;
                            echo "<th>x</th>";
                            echo"</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </article>
</section>
<?php
print_r($datosViaje);
?>
</body>
</html>