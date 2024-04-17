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
    <title>Careerin - Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!--Tailwind CSS-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <style>
    * {
        margin: 0;
        padding: 0;
        scroll-behavior: smooth;
        box-sizing: border-box !important;
        text-decoration: none !important;
        list-style: none !important;
        font-family: "Euclid Circular A" !important;
    }
    </style>

    <link rel="stylesheet" href="css/mystyle.css">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <!-- <div id="preloader"></div> -->
    <div class="h-full w-full">

        <header class="main-header flex align-center justify-between mt-5 ml-2  shadow">

            <!-- Logo -->
            <div class="">
                <a href="index.php">
                    <img src="logo.png" alt="" class="h-20 mt-3   ">
                </a>
            </div>
            <!-- bg-gradient-to-br from-gray-500 via-teal-500 to-gray-500 bg-clip-text text-transparent tracking-tighter -->
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="">
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu mt-2">
                    <ul class=" flex items-center justify-center">
                        <li>
                            <a href="jobs.php"
                                class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] mr-5 px-8 py-4  rounded-full text-2xl  shadow font-bold custom-border hover:text-gray-600">Jobs</a>
                        </li>
                        <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                        <li>
                            <a href="login.php"
                                class="rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700 text-white hover:text-white  hover:cursor-pointer">Login</a>
                        </li>
                        <?php } else {

                            if (isset($_SESSION['id_user'])) {
                                ?>
                        <li>
                            <a href="user/index.php">Dashboard</a>
                        </li>
                        <?php
                            } else if (isset($_SESSION['id_company'])) {
                                ?>
                        <li>
                            <a href="company/index.php">Dashboard</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Content Wrapper. Contains page content -->
        <div class=" p-4" style="margin-left: 0px;">

            <section class="content-header">
                <div class="container">
                    <div class="row latest-job mt-40 margin-bottom-20">
                        <h1 class="text-center margin-bottom-20 text-gray-600">
                            Sign Up</h1>
                        <div class="col-md-6 latest-job ">
                            <div
                                class="small-box rounded-xl cursor-pointer shadow hover:shadow-md bg-[#BED7DC] border-[2px] border-[#B7D3DF] padding-5">
                                <div class="inner">
                                    <a href="register-candidates.php"
                                        class="text-center text-gray-600 hover:text-teal-600">
                                        <h3>
                                            User Registration
                                        </h3>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center">
                                    <a href="register-candidates.php"
                                        class=" rounded-full shadow font-bold py-4 px-10 text-3xl bg-teal-600  text-white hover:text-white">
                                        Register
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 latest-job ">
                            <div
                                class="small-box rounded-xl cursor-pointer shadow hover:shadow-md bg-[#BED7DC] border-[2px] border-[#B7D3DF] padding-5">
                                <div class="inner">
                                    <a href="register-company.php"
                                        class="text-center text-gray-600 hover:text-teal-600">
                                        <h3>
                                            Company Registration
                                        </h3>
                                    </a>
                                </div>
                                <div class="flex items-center justify-center">
                                    <a href="register-company.php"
                                        class=" rounded-full shadow font-bold py-4 px-10 text-3xl bg-teal-600  text-white hover:text-white">
                                        Register
                                        <!-- <i class="fa fa-arrow-circle-right"></i> -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>



        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer mt-24 bg-[hsla(0,0%,100%,.1)] text-white " style="margin-left: 0px;">
            <div class="text-center text-gray-600">
                <strong>Copyright &copy; 2024-2025 <a href="index.php">careerin</a>.</strong> All rights
                reserved.
            </div>
        </footer>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</body>

</html>