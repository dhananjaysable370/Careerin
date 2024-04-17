<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">

    <!--Tailwind CSS-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Spline+Sans:wght@300..700&display=swap');

    * {
        margin: 0;
        padding: 0;
        scroll-behavior: smooth;
        box-sizing: border-box !important;
        text-decoration: none !important;
        list-style: none !important;
        font-family: "Euclid Circular A" !important;
    }

    body {
        height: 100%;
        width: 100%;
        background-color: #E3F4F4 !important;
        -webkit-font-smoothing: antialiased !important;
        font-weight: 500 !important;
    }

    .custom-border {
        border: 1px solid hsla(0, 0%, 100%, .05);
    }

    header {
        background-color: #C4DFDF;
    }

    header {
        width: 95% !important;
        display: flex !important;
        /* float: center !important; */
        justify-content: space-between !important;
        align-items: center !important;
        position: fixed !important;
        top: 0 !important;
        left: 23px;

        /* margin-left: 55px !important; */
        /* margin-right: 63px !important; */
        /* background-color: rgba(0, 0, 0, 0.6); */
        /* background: #121316 !important; */
        /* background-blend-mode: multiply; */
        /* background-color: hsla(0, 0%, 7%, 0) !important; */
        /* padding: 15px 10px !important; */

        padding-left: 25px !important;
        padding-right: 25px !important;
        padding-top: 1px !important;
        padding-bottom: 5px !important;
        backdrop-filter: blur(24px) !important;
        border-radius: 3.5rem !important;
    }

    @media screen and (min-width: 1078px) {
        header {
            background-color: rgba(196, 223, 223, .8);
            /* background-color: transparent #c4dfdf; */
        }
    }

    .custom-width {
        max-width: 108rem !important;
    }

    .custom-font {
        font-size: 6rem !important;
    }

    .satoshi {
        font-family: "Satoshi" !important;
    }

    /* Preloader */

    #preloader {
        background: #C4DFDF url(img/loading-7528.gif) no-repeat center center !important;
        background-size: 10%;
        position: fixed;
        height: 100vh;
        width: 100%;
        z-index: 100;
    }

    .top-progress {
        position: fixed;
        top: 0;
        width: 100%;
        min-height: 2.4vh;
        background-color: #E3F4F4;
        z-index: 1000;
        /* backdrop-filter: blur(100px); */
    }

    .my-progress-bar {
        position: fixed;
        top: 0;
        width: 100%;
        min-height: 1.7vh;
        margin-bottom: 100px;
        z-index: 1000;
    }

    .filled-progress {
        position: absolute;
        top: 1.3px;
        width: 0%;
        height: 100%;
        border-radius: 5px;
        background-image: linear-gradient(to right, #C4E0E5, #4CA1AF);
        z-index: 1000;
    }
    </style>
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link rel="stylesheet" href="/admin/adminstyle.css">

</head>

<body class="hold-transition skin-green sidebar-mini ">
    <div id="preloader"></div>
    <div class="top-progress">
        <div class="my-progress-bar">
            <div class="filled-progress">

            </div>
        </div>
    </div>
    <div class="">

        <header class="main-header flex align-center justify-between mt-5 ml-2  shadow">

            <!-- Logo -->
            <div class="">
                <a href="index.php">
                    <img src="logo.png" alt="" class="h-20 mt-3   ">
                </a>
            </div>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="">
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu mt-2">
                    <ul class=" flex items-center justify-center">
                        <li>
                            <a href="jobs.php"
                                class="mr-5 bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] px-8 py-4  rounded-full  hover:text-gray-800 shadow font-bold custom-border">Jobs</a>
                        </li>
                        <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                        <li>
                            <a href="sign-up.php"
                                class="rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700  text-white hover:text-white">Register</a>
                        </li>
                        <?php } else {

                            if (isset($_SESSION['id_user'])) {
                                ?>
                        <li>
                            <a href="user/index.php"
                                class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] mr-5 px-6 py-4  rounded-full text-2xl  shadow font-bold custom-border hover:text-gray-600">Dashboard</a>
                        </li>
                        <?php
                            } else if (isset($_SESSION['id_company'])) {
                                ?>
                        <li>
                            <a href="company/index.php">Dashboard</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="logout.php"
                                class="rounded-full shadow font-bold py-4 px-6 bg-teal-600 hover:bg-teal-700 text-white hover:text-white  hover:cursor-pointer">Logout</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class="" style="margin-left: 0px;">

            <section class="content-header">
                <div class="container">
                    <div class="row latest-job mt-32  margin-bottom-20">
                        <h1 class="text-center margin-bottom-20 text-gray-600">
                            Sign in</h1>
                        <div class="col-md-6 latest-job ">
                            <div href="login-candidates.php"
                                class="small-box rounded-xl cursor-pointer border-[2px] border-[#B7D3DF] shadow hover:shadow-md bg-[#BED7DC] padding-5">
                                <div class="inner">
                                    <a href="login-candidates.php"
                                        class="text-center text-gray-600 hover:text-teal-600">
                                        <h3>
                                            Candidates Login
                                        </h3>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center custompositionicons">
                                    <a href="login-candidates.php"
                                        class=" rounded-full shadow font-bold py-4 px-10 bg-teal-600 text-3xl  text-white hover:text-white">
                                        Login

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 latest-job ">
                            <div
                                class="small-box rounded-xl shadow bg-[#BED7DC] border-[2px] border-[#B7D3DF] hover:shadow-md padding-5 cursor-pointer">
                                <div class="inner">
                                    <a href="login-company.php" class="text-center text-gray-600 hover:text-teal-600">
                                        <h3>
                                            Company Login
                                        </h3>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center">
                                    <a href="login-company.php"
                                        class=" rounded-full shadow font-bold py-4 px-10 text-3xl bg-teal-600  text-white hover:text-white">
                                        Login
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 latest-job text-align-right ml-96  ">
                            <div
                                class="small-box rounded-xl cursor-pointer shadow hover:shadow-md bg-[#BED7DC] border-[2px] border-[#B7D3DF] padding-5">
                                <div class="inner">
                                    <a href="admin/index.php" class="text-center text-gray-600 hover:text-teal-600">
                                        <h3>
                                            Admin Login
                                        </h3>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center">
                                    <a href="admin/index.php"
                                        class=" rounded-full shadow font-bold py-4 px-10 text-3xl bg-teal-600  text-white hover:text-white">
                                        Login
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer bg-[hsla(0,0%,100%,.1)] text-white" style="margin-left: 0px;">
            <div class="text-center text-gray-600">
                <strong>Copyright &copy; 2024-2025 <a href="index.php">careerin</a>.</strong> All rights
                reserved.
            </div>
        </footer>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
        <!-- immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <script src="js/preloader.js"></script>
    <script src="js/top-scroll.js"></script>

</body>

</html>