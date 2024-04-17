<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once ("db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Job Posts</title>
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
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Raleway:ital,wght@0,100..900;1,100..900&family=Spline+Sans:wght@300..700&display=swap");

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
        background-color: #e3f4f4 !important;
        -webkit-font-smoothing: antialiased !important;
        font-weight: 500 !important;
    }

    .opensans {
        font-family: "Open sans" !important;
    }

    .custom-border {
        border: 1px solid hsla(0, 0%, 100%, 0.05);
    }

    header {
        background-color: #c4dfdf !important;
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
            background-color: rgba(196, 223, 223, 0.8);
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
        background: #c4dfdf url(img/loading-7528.gif) no-repeat center center !important;
        background-size: 10%;
        position: fixed;
        height: 100vh;
        width: 100%;
        z-index: 100;
    }

    form input {
        font-size: 16px !important;
    }

    form .selectcountry {
        font-size: 16px !important;
    }

    select.input-lg {
        height: 46px !important;
        line-height: 25px !important;
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
    <link rel="stylesheet" href="admin/adminstyle.css">
</head>

<body class="hold-transition skin-green sidebar-mini bg-[#E3F4F4]">

    <div class="top-progress">
        <div class="my-progress-bar">
            <div class="filled-progress"></div>
        </div>
    </div>

    <header class="main-header flex align-center justify-between mt-5 ml-5 mr-52  shadow">

        <!-- Logo -->
        <a href="index.php">
            <img src="logo.png" alt="" class="h-20 mt-3   ">
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class=" text-gray-500 text-[16px] font-medium">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">

                <ul class="flex items-center mt-2 justify-center">
                    <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>

                    <li class=" rounded-full">
                        <a href="login.php"
                            class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] px-8 py-4  rounded-full  hover:text-gray-800 shadow font-bold custom-border">Login</a>
                    </li>
                    <div class="ml-5">
                        <li class=" rounded-full  hover:bg-teal-700">
                            <a href="sign-up.php"
                                class="rounded-full shadow font-bold py-4 px-8 bg-teal-600  text-white hover:text-white">Register</a>
                        </li>
                    </div>

                    <?php } else {

                        if (isset($_SESSION['id_user'])) {
                            ?>
                    <li
                        class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] mr-5 px-8 py-3  rounded-full  shadow font-bold custom-border">
                        <a href="user/index.php" class="hover:text-gray-700">Dashboard</a>
                    </li>
                    <!-- <li
                                    class="mr-10 rounded-full shadow font-bold py-3 px-8 bg-teal-600 hover:bg-teal-700 text-white  hover:cursor-pointer">
                                    <a href="user/index.php" class="hover:text-white">Dashboard</a>
                                </li> -->
                    <?php
                        } else if (isset($_SESSION['id_company'])) {
                            ?>
                    <li class="">
                        <a href="company/index.php">Dashboard</a>
                    </li>
                    <?php } ?>
                    <li>
                        <!-- <a href="logout.php" class="">Logout</a> -->
                        <a href="logout.php"
                            class=" rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700 text-white hover:text-white  hover:cursor-pointer">Logout</a>
                    </li>
                    <?php } ?>
                </ul>

                <!-- <ul class=" flex align-center justify-center">
                    <li class="ml-9 mt-2 mr-8">
                        <a href="login.php"
                            class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] px-8 py-4  rounded-full mt-20 hover:text-gray-800 shadow font-bold custom-border">Login</a>
                    </li>
                    <li class="rounded-full mt-2">
                        <a href="sign-up.php"
                            class="rounded-full shadow font-bold py-4 px-7 bg-teal-600 hover:bg-teal-700 text-white hover:text-white">Sign
                            Up</a>
                    </li>
                </ul> -->
            </div>
        </nav>
    </header>



    <div class=" mt-28" style="margin-left: 0px;">

        <?php

        $sql = "SELECT * FROM job_post INNER JOIN company ON job_post.id_company=company.id_company WHERE id_jobpost='$_GET[id]'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>

        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div
                        class="col-md-9 bg-[#D2E9E9] border-[0.2px] border-[#B7D3DF] hover:shadow padding-2 rounded-xl">
                        <div class="pull-left">
                            <h2 class="text-3xl text-gray-800 subpixel-antialiased"><b>
                                    <?php echo $row['jobtitle']; ?>
                                </b></h2>
                        </div>
                        <div class="pull-right">
                            <a href="jobs.php"
                                class="btn btn-default btn-lg bg-[#14B8A6]  rounded-full text-white hover:bg-[#0D9488] hover:text-white margin-top-20">
                                Back</a>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div>
                            <p class="custompositionicons"><span class="custompositionicons mr-5">
                                    <lord-icon src="https://cdn.lordicon.com/whtfgdfm.json" trigger="hover"
                                        style="width:35px;height:20px">
                                    </lord-icon><button><?php echo $row['city']; ?></button>

                                </span>
                                <lord-icon src="https://cdn.lordicon.com/abfverha.json" trigger="hover"
                                    style="width:35px;height:20px">
                                </lord-icon><button><?php echo date("d-M-Y", strtotime($row['createdat'])); ?></button>

                            </p>
                        </div>
                        <div>
                            <?php echo stripcslashes($row['description']); ?>
                        </div>
                        <?php
                                if (isset($_SESSION["id_user"]) && empty($_SESSION['companyLogged'])) { ?>
                        <div>
                            <a href="apply.php?id=<?php echo $row['id_jobpost']; ?>"
                                class="btn btn-success bg-[#14B8A6] rounded-full text-white px-8 py-4 hover:bg-[#0D9488] hover:text-white margin-top-50 font-bold">Apply
                                Now</a>
                        </div>
                        <?php } ?>


                    </div>
                    <div class="col-md-3 ">
                        <div class="thumbnail bg-[#D2E9E9] border-[0.2px] border-[#B7D3DF] hover:shadow rounded-xl ">
                            <img src="uploads/logo/<?php echo $row['logo']; ?>" alt="companylogo">
                            <div class="caption text-center">
                                <h3>
                                    <?php echo $row['companyname']; ?>
                                </h3>
                                <p><a href="#"
                                        class="btn bg-[#14B8A6] m-5 text-white hover:bg-[#0D9488] hover:text-white rounded-full"
                                        role="button">More Info</a>
                                    <hr>
                                <div class="row">
                                    <div class="col-md-4 text-gray-800 hover:text-gray-900"><a
                                            href="apply.php?id=<?php echo $row['id_jobpost']; ?>">
                                            Apply</a>
                                    </div>
                                    <div class="col-md-4 text-gray-800 hover:text-gray-900"><a href="">
                                            Report</a></div>
                                    <div class="col-md-4 text-gray-800 hover:text-gray-900"><a href="login.php">
                                            Email</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
            }
        }
        ?>



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
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>


    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="js/top-scroll.js"></script>


</body>

</html>