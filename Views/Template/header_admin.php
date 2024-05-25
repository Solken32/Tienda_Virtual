<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Tienda Virtual Abel OSH">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Abel OSH">
    <meta name="theme-color" content="#009688">
    <link rel="shortcut icon" href="<?= media();?>/images/favicon.ico">
    <title><?= $data['page_tag'] ?></title>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?= media();?>/css/bootstrap-select.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?= media();?>/js/datepicker/jquery-ui.min.css"> 
    <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
     <!-- Font-icon css-->
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
    <!-- Page specific javascripts-->
   <link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css">
  </head>
  <body class="app sidebar-mini">
    <div id="divLoading" >
      <div>
        <img src="<?= media(); ?>/images/loading.svg" alt="Loading">
      </div>
    </div>
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?=base_url();?>/dashboard">Tienda</a>
 
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-bs-toggle="dropdown" aria-label="Open Profile Menu"><i class="bi bi-person fs-4"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?= base_url(); ?>/opciones"><i class="bi bi-gear me-2 fs-5"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>/usuarios/perfil"><i class="bi bi-person me-2 fs-5"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?= base_url(); ?>/logout"><i class="bi bi-box-arrow-right me-2 fs-5"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <?php require_once("nav_admin.php"); ?> 