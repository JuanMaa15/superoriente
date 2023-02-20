<header>
        <nav class="navbar navbar-expand-lg  bg-verde-tpt">
            <div class="container  d-flex justify-content-beetwen">
              <a class="navbar-brand" href="#">
                <div class="logo-img logo-empleado">
                  <img src="../img/logo.png" alt="Superoriente">
                </div>
              </a>

                <ul class="navbar-nav">
                  <li class="nav-item dropdown bg-verde-oscuro" id="lista-cuenta">
                    <a class="nav-link dropdown-toggle px-3" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      <div class="border-end d-inline me-3">
                        <i class="fa-solid fa-user"></i>
                      </div>
                      <?php echo $_SESSION['nombre_empleado'] ?>

                    </a>
                    <ul class="dropdown-menu w-100" aria-labelledby="navbarScrollingDropdown">
                      <li><a class="dropdown-item" href="#">Mis datos</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="../../controller/usuario/LoginUsuario.php?accion=cerrar">Cerrar Sesión</a></li>
                    </ul>
                  </li>
                </ul>
            
            </div>
          </nav>
</header>