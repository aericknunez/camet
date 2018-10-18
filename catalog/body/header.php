<body class="fixed-sn grey-skin">

<!--Double navigation-->
<header>
<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav sn-bg-4 fixed">
<ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
        <div class="logo-wrapper waves-light">
            <a href="<?php echo BASE_URL ?>"><img src="assets/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
        </div>
    </li>
    <!--/. Logo -->

    <!--Search Form-->
    <li>
        <form class="search-form" role="search">
            <div class="form-group md-form mt-0 pt-1 waves-light">
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </form>
    </li>
    <!--/.Search Form-->
    <!-- Side navigation links -->
    <li>
        <ul class="collapsible collapsible-accordion">

            <li><a href="?cobros" class="collapsible-header waves-effect arrow-r"><i class="fa fa-ban"></i> Cobros Pendientes<i class="fa fa-angle-down rotate-icon"></i></a></li>
            
            <li><a href="?conexion" class="collapsible-header waves-effect arrow-r"><i class="fa fa-tv"></i> Activar Conexi&oacuten<i class="fa fa-angle-down rotate-icon"></i></a></li>

            <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Clientes<i class="fa fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                    <ul class="list-unstyled">
                        <li><a href="?addcliente" class="waves-effect">Agregar Cliente</a></li>
                        <li><a href="?findcliente" class="waves-effect">Buscar Clientes</a></li>
                    </ul>
                </div>
            </li>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Contratos<i class="fa fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                    <ul class="list-unstyled">
                        <li><a href="?cable" class="waves-effect">Agregar Contrato Cable</a></li>
                        <li><a href="?internet" class="waves-effect">Agregar Contrato Internet</a></li>
                     </ul>
                </div>
            </li>

            <li><a href="?imprimir" class="collapsible-header waves-effect arrow-r"><i class="fa fa-print"></i> Imprimir<i class="fa fa-angle-down rotate-icon"></i></a></li>

            <li><a href="?user" class="collapsible-header waves-effect arrow-r"><i class="fa fa-user"></i> Usuarios<i class="fa fa-angle-down rotate-icon"></i></a></li>

            <li><a href="application/includes/logout.php" class="collapsible-header waves-effect arrow-r"><i class="fa fa-power-off"></i> Salir<i class="fa fa-angle-down rotate-icon"></i></a></li>
            

        </ul>
    </li>
    <hr>
    <small> Powewered By</small>  
    <a href="https://www.hibridosv.com" target="_blank"><img src="assets/img/logo/lgb.png" class="img-fluid flex-center"></a>
    <!--/. Side navigation links -->
</ul>
<div class="sidenav-bg mask-strong"></div>
</div>
<!--/. Sidebar navigation -->
<!-- Navbar -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
<!-- SideNav slide-out button -->
<div class="float-left">
    <a href="#" data-activates="slide-out" class="button-collapse"><i class="fa fa-bars"></i></a>
</div>
<!-- Breadcrumb-->
<div class="breadcrumb-dn mr-auto">
    <p><?php echo $_SESSION["nombre"]; ?></p>
</div>

</nav>
<!-- /.Navbar -->
</header>

<main>