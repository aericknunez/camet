<body class="fixed-sn grey-skin">
     
<div class="progress md-progress primary-color-dark">
    <div class="indeterminate"></div>
</div>
    
    <!--Double navigation-->
    <header>
        
 
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="breadcrumb-dn mr-auto">
                <p>Panel de administraci&oacuten</p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a href="<?php echo BASE_URL . "admin/fileUpload/"; ?>" class="nav-link"><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Imagenes</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL . "admin/?add"; ?>" class="nav-link"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">Agregar</span></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo BASE_URL . "admin/?view"; ?>" class="nav-link"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Ver</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo BASE_URL . "plantilla/"; ?>">Action</a>
                        <a class="dropdown-item" href="<?php echo BASE_URL . "plantilla/?user"; ?>">Usuarios</a>
                        <a class="dropdown-item" href="application/includes/Logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header>
    <!--/.Double navigation-->