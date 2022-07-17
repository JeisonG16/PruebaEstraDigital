<?php session_start(); ?>
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./interfaz_style.css" media="screen" />
    <script src="https://kit.fontawesome.com/98511cdd8b.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
    </style>
    <title>Jeison García</title>
</head>

<body style="background-image: url(./img/fondo_azul.png); background-repeat: no-repeat; background-size: 100% 100%;">

    <?php

    $carrito_mio = $_SESSION['carrito'];
    $_SESSION['carrito'] = $carrito_mio;

    // contamos nuestro carrito
    if (isset($_SESSION['carrito'])) {
        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
            if ($carrito_mio[$i] != NULL) {
                $total_cantidad = $carrito_mio['cantidad'];
                $total_cantidad++;
                $totalcantidad += $total_cantidad;
            }
        }
    }
    ?>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg" style="background-color: transparent; height:130px">
        <div class="container-fluid">
            <div class="card" style="width: 10rem;" id="img_navbar">
                <img src="./img/logo167.jpg" id="" class="card-img-top">
            </div>
            <div class="d-flex" style="padding-right: 30px; justify-content: space-around">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <button type="button" id="circulo1" class=""><b>ES</b></button>
                <button type="button" style="border-color: 2px solid #502c1d" id="circulo2" class=""><b>EN</b></button>
                <!-- CARRITO -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#modal_cart" style="display: flex; border-color: 2px solid #502c1d; border-radius:20px; color:#502c1d; font-size: 18px; background-color:transparent; padding: 6px 25px 5px 25px; font-family: 'Poppins', sans-serif; height:40px; margin:auto"><b>CARRITO</b><i class="fa-solid fa-basket-shopping" style="margin: 4px 0px 5px 10px;"></i>
                    <div style="color: green;"><?php echo $totalcantidad; ?></div>
                </button>
                <!-- CARRITO -->
            </div>
            <button style="margin-bottom: 180px; background-color:white;" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" id="navbar-toggles"></span>
            </button>
        </div>
        </div>
    </nav>
    </div>
    <!-- FIN NAVBAR -->

    <!-- MODAL -->
    <div class="modal fade" id="modal_cart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tu carrito de compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <div class="modal-body">
                        <div>
                            <div class="p-2">
                                <ul class="list-group mb-3">
                                    <?php
                                    if (isset($_SESSION['carrito'])) {
                                        $total = 0;
                                        for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                            if ($carrito_mio[$i] != NULL) {

                                    ?>
                                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                                    <div class="row col-12">
                                                        <div class="col-6 p-0" style="text-align: left; color: #000000;">
                                                            <h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; ?> - <?php echo $carrito_mio[$i]['tamaño']; ?> - <?php echo $carrito_mio[$i]['toste']; ?></h6>
                                                        </div>
                                                        <div class="col-6 p-0" style="text-align: right; color: #000000;">
                                                            <span style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> $</span>
                                                        </div>
                                                    </div>
                                                </li>
                                    <?php
                                                $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                            }
                                        }
                                    }
                                    ?>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span style="text-align: left; color: #000000;">Total (COP)</span>
                                        <strong style="text-align: left; color: #000000;"><?php
                                                                                            if (isset($_SESSION['carrito'])) {
                                                                                                $total = 0;
                                                                                                for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                                                                                    if ($carrito_mio[$i] != NULL) {
                                                                                                        $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                            echo $total; ?> $</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-primary" href="vaciarcarro.php">Vaciar carrito</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN MODAL  -->
    <div>
        <div class="row g-2">
            <div class="col-md-6">
                <img class="offset-md-6" src="./img/bolsa1.png" width="48%">
            </div>
            <!-- CARD PRODUCT -->
            <div class="col-md-6">
                <div class="card" id="card-producto" style="width: 21rem; padding:25px 15px; border-radius:10px">
                    <div class="card-body">
                        <h5 class="card-title" style="font-family: 'Poppins', sans-serif; color:#502c1d; font-size:16px"><b>C O F F E E </b>
                            <h5 />
                            <form id="formulario" name="formulario" method="post" action="cart.php">
                                <input name="precio" type="hidden" id="precio" value="1000" />
                                <input name="titulo" type="hidden" id="titulo" value="Sweet Energy" />

                                <h1 class="card-title" style="font-family: 'Poppins', sans-serif; color:#502c1d; font-size:50px"><b>SWEET ENERGY</b></h1>
                                <div class="row g-2" style="margin-bottom: 7px;">
                                    <div class="row">
                                        <div class="col-md-4" style="padding: 4px;">
                                            <p class="card-text" style="font-family: 'Poppins', sans-serif; font-size:11px; letter-spacing: 2px;"><b>ROAST</b></p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input id="roast-radio" type="radio" name="toste" id="flexRadioDefault1" value="Roast Light" checked>
                                                    <label for="flexRadioDefault1" style="font-family: 'Poppins', sans-serif; font-size:14px;">Roast Light</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input id="roast-radio" type="radio" name="toste" id="flexRadioDefault1" value="Roast Medium">
                                                    <label for="flexRadioDefault1" style="font-family: 'Poppins', sans-serif; font-size:14px; ">Roast Medium</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input id="roast-radio" type="radio" name="toste" id="flexRadioDefault1" value="Roast Black">
                                                    <label for="flexRadioDefault1" style="font-family: 'Poppins', sans-serif; font-size:14px; ">Roast Black</label>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row g-2" style="margin-bottom: 7px;">
                                    <div class="col-md-3">
                                        <p class="card-text" style="font-family: 'Poppins', sans-serif; font-size:11px; letter-spacing: 2px;"><b>CANT</b></p>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control form-control-sm" maxlength="3" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="please enter the amount" name="cantidad" type="text" id="cantidad" value="" required />
                                    </div>
                                </div>
                                <div class="row g-2" style="margin-bottom: -8px;">
                                    <div class="col-md-3">
                                        <p class="card-text" style="font-family: 'Poppins', sans-serif; font-size:11px; letter-spacing: 2px;"><b>TASTE</b></p>
                                    </div>
                                    <div class="col-md-9">
                                        <p style="font-size: 12px;">Caramelly & Rich Blend. Sweet like Butterscotch. Flavours like Red Fruit & Apricot</p>
                                    </div>
                                </div>
                                <label class="card-text" style="font-family: 'Poppins', sans-serif; font-size:11px; letter-spacing: 2px; margin-bottom:7px"><b>BAG SIZE</b></label>
                                <select class="form-select form-select-sm" name="tamaño" id="tamaño" style="width: 250px;" aria-label="Default select example">
                                    <option selected value="pequeña">Small $1.000</option>
                                    <option value="mediana">Medium $2.000</option>
                                    <option value="grande">Large $3.000</option>
                                </select>

                                <div class="col-md-11">
                                    <p style="font-size:11px">Tenemos envios a domicilio a Bogotá, Cali, Montería, Neiva, Soledad y Valledupar</p>
                                </div>
                                <div>
                                    <button type="submit" class="btn" style="border-color:#502c1d; border-radius:20px; color:white; font-size: 12px; background-color:#280760; font-family: 'Poppins', sans-serif; height:40px; margin:auto">AÑADIR AL CARRITO</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            <!-- FIN CARD PRODUCT -->
        </div>
    </div>
    <div class="row g-2" style="margin-bottom: 60px; margin-top:20px;">
        <div class="col-sm-5 offset-md-2" style="padding: 0 !important;">
            <h1 style="font-family: 'Poppins', sans-serif; font-size:61px; margin-top:30px; color:#502c1d; line-height:0.9; letter-spacing: 0.3px"><b>Una mezcla de café con notas dulces de frutos del bosque.</b></h1>
            <br />
            <div class="col-md-10">
                <p style="font-size: 18px; line-height:1.2; font-family: 'Poppins', sans-serif; color:#502c1d; margin-bottom:200px; font-weight: 400">A través de un proceso único de tostado y mezcla, hemos marcado los sabores de lo que más amamos. Desarrollando un café a base de granos seleccionados y con sabor natural que ofrece un sabor dulce y rico para compartir con tu momento preferido</p>
            </div>
        </div>
        <div class="col-md-1" style="transform: translateX(-50px); padding-top:30px">
            <img src="./img/semillas.png" />
        </div>
    </div>
</body>
<!-- FOOTER -->
<footer class="text-white py-4" style="background-color: #502c1d">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
            <a href="" class=" text-reset align-items-center" style="text-decoration: none;">
                <img src="./img/logo_footer.png" width="100%" alt="" class="img-logo mr-2 list-unstyled" style="margin-right: 25px; width: 17%" /> © 2021 JAVIER PEREIRA. All Rights Reserved
            </a>
            </div>
            <div class="col-md-2" style="display: flex; justify-content: center">
            <ul class="col-2 list-unstyled justify-content-center" style="margin: auto 0; text-align: center; font-family: 'Poppins', sans-serif; display: flex;">
                <a style="letter-spacing: 2px; margin-right:10px">Follow US</a>
                <li class="d-flex justify-content-evenly">
                    <a href="#" class="text-reset">
                        <i class="fa-brands fa-facebook-f" style="padding:5px; background-color: #c4a083; border-radius: 40%; margin-right:5px"></i>
                    </a>
                    <a href="#" class="text-reset">
                        <i class="fa-brands fa-instagram" style="padding:5px; background-color: #c4a083; border-radius: 40%"></i>
                    </a>
                </li>
            </ul>
            </div>
            <div style="height:100px">

            </div>
        </div>
    </div>
</footer>
<!-- FIN FOOTER -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


</html>