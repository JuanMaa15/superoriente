<?php

session_start();

if (isset($_SESSION['id_empleado'])) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido empleado</title>
    <link rel="shortcut icon" href="../img/logo.png" type="image/ico"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4240342587.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../public/js/jquery.js"></script>
</head>
<body>
    
    <?php include_once("menuEmp.php") ?>

    <main>
        <div class="container">
            <section id="carta-laboral" class="px-5 d-flex align-items-center">     
                <div class="row border p-4">
                    <div class="col-4">
                        <a href="../../controller/usuario/cartaLaboral.php?doc=<?php echo $_SESSION['id_empleado']; ?>"  id="btn-img-carta" class="btn-img position-relative d-block w-100">
                            <div class="cont-img">
                                <img class="w-100" src="../img/img-contrato.jpg">
                            </div>
                            <div class="cont-descripcion p-2 position-absolute top-100 start-0  bg-negro-tpt w-100">
                                <h5 class="text-white">Carta Laboral</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-8 mt-2">
                        <h2>Carta Laboral</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis dig
                        nissim mauris. Nam dui nisl, vehicula nec ultricies vitae, aliquam a neque
                        . Donec aliquam gravida aliquet. Pellentesque pretium, ante a fringilla vulputate, e
                        lit diam convallis nulla, id tincidunt diam lacus dictum purus. Vivamus vel eros congue, 
                        molestie diam et, ultricies erat.</p>

                        <a class="btn btn-verde" href="../../controller/usuario/cartaLaboral.php?doc=<?php echo $_SESSION['id_empleado']; ?>" target="_blank">Generar carta</a>
                    </div>
                    
                </div>
 
            </section>

        </div>
    </main>
    <footer>
        <div class="pie-pagina py-2 bg-verde-oscuro d-flex justify-content-center ">
            <p class="my-2 text-white">Superoriente &copy; <?=date("d-m-Y") ?></p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="../js/app.js"></script>
</body>
</html>

<?php
        
    }else{
        header("Location: ../../index.php");
    }
?>