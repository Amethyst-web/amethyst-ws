<?php /**
 * Created by PhpStorm.
 * User: Koder
 * Date: 19.11.2015
 * Time: 18:47
 */ ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Кальянная на Отрадном | Панель администратора</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="/admin/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="/admin/assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/admin/assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/customTooltip.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="/admin/assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="/admin/assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="/admin/assets/js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="/admin/assets/js/functions.js" type="text/javascript"></script>

        <script type="text/javascript" src="/admin/assets/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="/admin/assets/js/jquery.noty.packaged.min.js"></script>
        <script type="text/javascript" src="/admin/assets/js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/admin/assets/js/datepicker-ru.js"></script>
        <script type="text/javascript" src="/admin/assets/js/plugins/datatables/jquery.dataTables.js"></script>
        <script type="text/javascript" src="/admin/assets/js/plugins/datatables/dataTables.bootstrap.js"></script>
        <script type="text/javascript" src="/admin/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script type="text/javascript" src="/admin/assets/js/plugins/input-mask/jquery.inputmask.js"></script>
        <script type="text/javascript" src="/admin/assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    </head>
    <body class="skin-black">
        <header class="header">
            <a href="<?=$this->getPath('home')?>" class="logo">
                HP Отрадное
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Переключить навигацию</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="user user-menu">
                            <a href="<?=$this->getPath('logout')?>">
                                <i class="glyphicon glyphicon-log-out"></i>
                                <span>Выйти</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left info">
                            <p>Здравствуйте, <?=$this->user->name?></p>
                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li <?php if($this->currentPage == 'tables'){ echo 'class="active"'; }?>>
                            <a href="<?=$this->getPath('home')?>">
                                <i class="fa fa-book"></i> <span>Заказанные столы</span>
                            </a>
                        </li>
                        <li <?php if($this->currentPage == 'actions'){ echo 'class="active"'; }?>>
                            <a href="<?=$this->getPath('actions')?>">
                                <i class="fa fa-star"></i> <span>Акции</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <?php include $content; ?>
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    </body>
</html>
