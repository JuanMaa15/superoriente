
<div class="col-1 position-relative" id="cont-ppal-menu">

<div class="cont-nav-ppal position-fixed top-0 start-0 ">
            <div class="cont-nav" id="cont_menu">
                <div class="encabezado-menu ">
                    <a href="#" class="logo enlaces">
                        <div class="icono-enlace">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        
                        <h3 class="m-0"><?php echo $_SESSION['nombre_admin']; ?></h3> </a>
                </div>
                <nav id="menu" class="mt-3">
                    <ul>
                        <li><a class="enlaces seleccionado" href="#">
                        <div class="icono-enlace">
                            <i class="fa-solid fa-house"></i>
                        </div>
                        
                        Inicio
                    </a></li>
                        <li>
                            <a class="enlaces" id="enlace-administracion" href="#">
                                <div class="icono-enlace">
                                    <i class="fa-solid fa-gear"></i>
                                </div>
                                
                                Administración 
                                <div class="icono-enlace chico">
                                    <i class="fa-solid fa-chevron-down"></i>
                                </div>
                                
                            </a>
                            <ul class="" id="submenu-administracion">
                                <li>
                                    <a class="enlaces" href="#">
                                        <div class="icono-enlace">
                                            <i class="fa-solid fa-file-lines"></i>
                                        </div>
                                        
                                        Reportes
                                    </a>
                                
                                </li>
                                <li>
                                    <a class="enlaces" href="#">
                                        <div class="icono-enlace">
                                            <i class="fa-solid fa-user-gear"></i>
                                        </div>
                                        
                                        Personal
                                    </a>
                                </li>


                                
                            </ul>
                        </li>
                        <li>
                            <a class="enlaces" href="#">
                            <div class="icono-enlace">
                                <i class="fa-solid fa-cash-register"></i>
                            </div>
                            
                            Register
                            </a>

                        </li>
                        <li>
                            <a class="enlaces" href="#">
                            <div class="icono-enlace">
                                <i class="fa-solid fa-file"></i>
                            </div>
                            
                            Documents
                            </a>

                        </li>
                    </ul>
                    
                    
                    
                    
                </nav>
                
            </div>
            <div id="btn-mostrar-ocultar"  class="position-absolute">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>


    <<!-- div class=" bg-verde-tpt menu position-fixed top-0 start-0" id="menu">
        <div class=" border-bottom border-end">
            <a class="navbar-brand bg-verde text-white d-flex justify-content-center py-3" href="admin.php"><i class="fas fa-user-shield pt-1 pe-2"> </i> Admin - <?php echo $_SESSION['nombre_admin']; ?> </a>
        </div>
        <div class="navbar w-100 h-100 flex-column">
            
            <div class="container-fluid d-flex flex-column justify-content-center text-center">
                

                <ul class="navbar-nav d-flex justify-content-center flex-colum mt-5">
                    <li class="nav-item  text-center">
                        <a class="nav-link link text-white" aria-current="page" href="admin.php"><i class="fas fa-home"> </i> Inicio</a>
                    </li>
                    <li class="nav-item dropdown position-relative w-100">
                        <a class="nav-link link dropdown-toggle text-white text-center" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-users-cog"></i> Gestión de personal
                        </a>
                        <ul class="dropdown-menu position-absolute bg-verde-tpt top-0 start-100" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item text-white" href="registro.php">Registrar empleados</a></li>
                            <li><a class="dropdown-item text-white" href="listas.php">Lista empleados</a></li>
                        
                        </ul>
                    </li>
                    <li class="nav-item position-relative w-100">
                        <a class="nav-link link text-white text-center" href="gestionInformacion.php"> <i class="fas fa-tasks"> </i> Gestión de información </a>
                        
                    </li>
                    <li class="nav-item  text-center">
                        <a class="nav-link link text-white" href="../../controller/usuario/LoginUsuario.php?accion=cerrar"><i class="fas fa-sign-out-alt"> </i> Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="logo-img pequeño w-50 position-absolute bottom-0 mb-5 start-50 translate-middle-x">
            <img src="../img/logo.png" alt="Superoriente">
        </div>
    </div> -->
</div>