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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../public/js/jquery.js"></script>
</head>
<body>
    
    <?php include_once("menuEmp.php") ?>

    <main>
        <section id="carta-laboral" class="py-5">
            <div class="container  border py-4">
                <div class="row">
                    <div class="col-9">
                        <h2>Carta Laboral</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum quis dig
                        nissim mauris. Nam dui nisl, vehicula nec ultricies vitae, aliquam a neque
                        . Donec aliquam gravida aliquet. Pellentesque pretium, ante a fringilla vulputate, e
                        lit diam convallis nulla, id tincidunt diam lacus dictum purus. Vivamus vel eros congue, 
                        molestie diam et, ultricies erat.</p>
                    </div>
                    <div class="col-3 px-5">
                        <a href="../../controller/usuario/cartaLaboral.php?doc=<?php echo $_SESSION['id_empleado']; ?>" target="_blank" id="btn-img-carta" class="btn-img position-relative d-block w-100">
                            <div class="cont-img">
                                <img class="w-100" src="../img/img-contrato.jpg">
                            </div>
                            <div class="cont-descripcion p-2 position-absolute top-100 start-0  bg-negro-tpt w-100">
                                <h5 class="text-white">Carta Laboral</h5>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
        </section>
    </main>

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