<div class="cont-nav-vertical position-fixed d-flex justify-content-end top-0 left-0 w-100  px-5 bg-light">
    <ul class="navbar-nav">
        <li class="nav-item dropdown bg-danger text-white" id="lista-cuenta">
          <a class="nav-link dropdown-toggle px-3" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="border-end d-inline me-3">
              <i class="fa-solid fa-user"></i>
            </div>
            <?php echo $_SESSION['nombre_admin'] ?>

          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">Cambiar contraseña</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../controller/usuario/LoginUsuario.php?accion=cerrar">Cerrar Sesión</a></li>
          </ul>
        </li>
    </ul>
</div>