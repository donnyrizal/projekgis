<?php
session_start();
include("../koneksi.php");
date_default_timezone_set('Asia/Jakarta');
function get_count_from($table)
{
    global $koneksi;
    $sql = "SELECT id from $table";
    $check = mysqli_query($koneksi, $sql);
    $count = mysqli_num_rows($check);
    if ($count == 0) {
        echo 0;
    } else {
        echo $count;
    }
}
if (!isset($_SESSION['admin'])) {
    echo "<script>window.location='../login.php?pesan=dilarang'</script>";
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>WebGIS Test PCR Location - Admin Only</title>
        <!-- Favicon-->
        <link rel="icon" href="../assets/images/hospital.svg" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="../assets/iconfont/material-icons.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap Core Css -->
        <link href="../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Waves Effect Css -->
        <link href="../assets/plugins/node-waves/waves.css" rel="stylesheet" />

        <!-- Animation Css -->
        <link href="../assets/plugins/animate-css/animate.css" rel="stylesheet" />

        <!-- Morris Chart Css-->
        <link href="../assets/plugins/morrisjs/morris.css" rel="stylesheet" />

        <!-- Custom Css -->
        <link href="../assets/css/style.css" rel="stylesheet">

        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="../assets/css/themes/all-themes.css" rel="stylesheet" />

        <!-- sweetalert2 -->
        <link href="../assets/plugins/sweetalert2/sweetalert2.min.css" rel="stylesheet" />

        <!-- CSS manual -->
        <link href="../manual.css" rel="stylesheet">
    </head>

    <body class="theme-blue">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Wait for a moment....</p>
            </div>
        </div>
        <!-- #END# Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- #END# Overlay For Sidebars -->

        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="./">Admin - WebGIS Test PCR Location</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                </div>
            </div>
        </nav>
        <!-- #Top Bar -->
        <section>
            <!-- Left Sidebar -->
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <img src="../assets/images/programmer.png" width="60" height="60" alt="User" />
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b style="text-transform: uppercase;"><?php echo $_SESSION['admin']['username']; ?></b>
                        </div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li role="separator" class="divider"></li>
                                <li><a href="../logout.php"><i class="material-icons">power_settings_new</i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #User Info -->
                <!-- Menu -->
                <div class="menu">
                    <ul class="list">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active">
                            <a href="./">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="daftar.php">
                                <i class="material-icons">location_on</i>
                                <span>Location lists</span>
                            </a>
                        </li>
                        <li>
                            <a href="./user.php">
                                <i class="material-icons">people</i>
                                <span>User List</span>
                            </a>
                        </li>

                        <li class="header">ACCOUNT</li>

                        <li>
                            <a href="../logout.php">
                                <i class="material-icons col-red">power_settings_new</i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- #Menu -->
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">
                        <p>&copy; Donny Rizal &middot; <a href="#">Privacy</a> &middot; <a href="#notice">Terms</a></p>
                    </div>
                </div>
                <!-- #Footer -->
            </aside>
            <!-- #END# Left Sidebar -->
            <!-- Right Sidebar -->

            <!-- #END# Right Sidebar -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>DASHBOARD</h2>
                </div>

                <!-- Widgets -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-blue">
                                <h2>
                                    Admin Only <small>Just a simple touch of olive oil 🪔</small>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Browser Usage -->
                </div>
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Today
                                    <small><?php echo date("l, d F Y"); ?></small>
                                </h2>
                            </div>
                            <div class="info-box-4">
                                <div class="icon">
                                    <i class="material-icons col-indigo">location_on</i>
                                </div>
                                <div class="content">
                                    <div class="text">Total Location that have been indexed in WebGIS Test PCR Location</div>
                                    <div class="number count-to" data-from="0" data-to="<?php echo get_count_from('lokasi'); ?>" data-speed="1500" data-fresh-interval="20"></div>
                                </div>
                            </div>
                            <div class="info-box-4">
                                <div class="icon">
                                    <a href="../index.php">
                                        <i class="material-icons col-indigo">keyboard_arrow_right</i>
                                </div>
                                <div class="content">
                                    <div class="text">Back to Home</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Jquery Core Js -->
        <script src="../assets/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="../assets/plugins/bootstrap/js/bootstrap.js"></script>

        <!-- Select Plugin Js -->
        <script src="../assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>

        <!-- Slimscroll Plugin Js -->
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

        <!-- Waves Effect Plugin Js -->
        <script src="../assets/plugins/node-waves/waves.js"></script>

        <!-- Jquery CountTo Plugin Js -->
        <script src="../assets/plugins/jquery-countto/jquery.countTo.js"></script>

        <!-- Morris Plugin Js -->
        <script src="../assets/plugins/raphael/raphael.min.js"></script>
        <script src="../assets/plugins/morrisjs/morris.js"></script>

        <!-- ChartJs -->
        <script src="../assets/plugins/chartjs/Chart.bundle.js"></script>

        <!-- Flot Charts Plugin Js -->
        <script src="../assets/plugins/flot-charts/jquery.flot.js"></script>
        <script src="../assets/plugins/flot-charts/jquery.flot.resize.js"></script>
        <script src="../assets/plugins/flot-charts/jquery.flot.pie.js"></script>
        <script src="../assets/plugins/flot-charts/jquery.flot.categories.js"></script>
        <script src="../assets/plugins/flot-charts/jquery.flot.time.js"></script>

        <!-- Sparkline Chart Plugin Js -->
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.js"></script>

        <!-- Custom Js -->
        <script src="../assets/js/admin.js"></script>
        <script src="../assets/js/pages/index.js"></script>

        <!-- Demo Js -->
        <script src="../assets/js/demo.js"></script>

        <!-- Sweetalert2 -->
        <script src="../assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    </body>

    </html>
<?php

}
?>