<!DOCTYPE html>
<html lang="en" class="<?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] === 'true' ? 'dark-mode' : ''; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' - Task System' : 'Task System'; ?></title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="?controller=dashboard&action=index" class="nav-link">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="toggleMode()" title="Toggle Theme">
                    <i class="fas toggle-icon <?php echo isset($_COOKIE['dark_mode']) && $_COOKIE['dark_mode'] === 'true' ? 'fa-sun' : 'fa-moon'; ?>"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"><?php echo htmlspecialchars($_SESSION['username']); ?></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="?controller=auth&action=logout" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="?controller=dashboard&action=index" class="brand-link">
            <img src="/images/dashboard-logo.png" alt="Dashboard Logo" class="brand-image img-circle elevation-3" style="opacity: .8; max-height: 35px;">
            <span class="brand-text font-weight-light">Task System</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="?controller=dashboard&action=index" class="nav-link <?php echo ($_GET['controller'] ?? '') === 'dashboard' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?controller=user&action=index" class="nav-link <?php echo ($_GET['controller'] ?? '') === 'user' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users CRUD</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?controller=property&action=index" class="nav-link <?php echo ($_GET['controller'] ?? '') === 'property' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-building"></i>
                            <p>Properties CRUD</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="?controller=task&action=index" class="nav-link <?php echo ($_GET['controller'] ?? '') === 'task' ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Tasks CRUD</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
