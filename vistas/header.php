<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="/estilos/style.css">
    <!-- Google Font -->
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@1,700&family=Roboto:wght@300&display=swap');
    </style>
    <!-- Favicon -->
    <link rel="icon" href="img/favicon.png">
    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/7f40cbe45f.js" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <title>Blog</title>
</head>
<body>

  <?php 
  require_once('includes/conexion.php');
  require_once('includes/funciones.php');

  $logout_show = 'none';
  $registro_show = 'block';
  $usuario = '';

  if(isset($_SESSION['usuario'])){
    $logout_show = 'block';
    $registro_show = 'none';
    $nombre = $_SESSION['usuario'];
  };


  ?>

    <nav class="navbar sticky-top bg-light navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand nav_link_logo" href="/index.php" ><img src="/img/logo.png" class="nav_img_logo" alt="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="#" style="display:<?=$logout_show?>;">Hola, <?=$nombre?>!</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?contacto">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?login" style="display:<?=$registro_show?>;">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?registro" style="display:<?=$registro_show?>;">Registro</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="includes/logout.php" style="display:<?=$logout_show?> ;">Logout</a>
              </li>
              <li style="display:<?=$logout_show?> ;" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Entradas
                </a>
                <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="index.php?crear_entrada">Crear Entrada</a></li>
                 <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item" href="index.php?borrar_entrada">Eliminar Entrada</a></li>
                 <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item" href="index.php?modificar_entrada">Modificar Entrada</a></li>
                </ul>
              </li>
              <li style="display:<?=$logout_show?> ;" class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorías
                </a>
                <ul class="dropdown-menu">
                  <?php $categorias = listar_categorias($conexion_db);
                        while($categoria = mysqli_fetch_assoc($categorias)){
                          echo '<li><a class="dropdown-item" href="categoria.php?id='.$categoria["id"].'">'.$categoria['nombre'].'</a></li>';
                        };
                  ?>
                 <li><hr class="dropdown-divider"></li>
                 <li><a class="dropdown-item" href="index.php?categoria">Agregar categoría</a></li>
                 <li><a class="dropdown-item" href="index.php?categoria_borrar">Eliminar categoría</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </nav>



