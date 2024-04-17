<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_company'])) {
    header("Location: ../index.php");
    exit();
}

require_once ("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Company Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="../css/custom.css">
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
    <link rel="stylesheet" href="../admin/adminstyle.css">
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="top-progress">
        <div class="my-progress-bar">
            <div class="filled-progress">

            </div>
        </div>
    </div>

    <header class="main-header flex align-center justify-between mt-5 ml-2  shadow">

        <!-- Logo -->
        <div class="">
            <a href="index.php">
                <img src="../img/logo.png" alt="" class="h-20 mt-3" style="height: 50px;">
            </a>
        </div>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="">
            <!-- Navbar Right Menu -->
            <div class="mt-2">
                <ul class="">
                    <li>
                        <a href="../logout.php"
                            class="rounded-full shadow font-bold py-4 px-8 bg-teal-600  text-white hover:text-white">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper h-full w-full flex align-center justify-center flex-col bg-[#E3F4F4]  mt-28"
        style="margin-left: 0px;">

        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-solid bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF] rounded-lg">
                            <div
                                class="box-header flex justify-center align-center border-[0.2px] border-[#B7D3DF] rounded">
                                <h3 class="box-title text-center text-gray-800  py-5">Welcome <b>
                                        <?php echo $_SESSION['name']; ?>
                                    </b></h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active "><a href="index.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/hqymfzvj.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon>
                                            Dashboard
                                        </a></li>
                                    <li><a href="edit-company.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/kthelypq.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> My Company
                                        </a></li>
                                    <li><a href="create-job-post.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/lyrrgrsl.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Create Job
                                            Post
                                        </a></li>
                                    <li><a href="my-job-post.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/zyzoecaw.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> My Job Post
                                        </a></li>
                                    <li><a href="job-applications.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/xtnsvhie.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Job
                                            Application
                                        </a></li>
                                    <li><a href="mailbox.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/nzixoeyk.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Mailbox
                                        </a></li>
                                    <li><a href="settings.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/lecprnjb.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Settings
                                        </a></li>
                                    <li><a href="resume-database.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/jkzgajyr.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Resume Database
                                        </a>
                                    </li>
                                    <li class="flex items-center justify-center"><a href="../logout.php"
                                            class="custompositionicons ">
                                            <lord-icon src="https://cdn.lordicon.com/aklfruoc.json" trigger="hover"
                                                colors="primary:#e83a30" style="width:35px;height:20px">
                                            </lord-icon>
                                            <button class="text-red-500">Logout</button>
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] border-[#B7D3DF] shadow rounded-xl padding-2">

                        <h3 class="mb-3 text-center font-bold text-5xl">Overview</h3>
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fa fa-info"></i> In this dashboard you are able to change your account
                            settings, post and manage your jobs. Got a question? Do not hesitate to drop us a mail.
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box bg-[#E3F4F4] border-[0.2px] border-[#B7D3DF] rounded-lg">
                                    <span class="info-box-icon rounded-lg"><i
                                            class="ion ion-ios-people-outline"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Job Posted</span>
                                        <?php
                                        $sql = "SELECT * FROM job_post WHERE id_company='$_SESSION[id_company]'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $total = $result->num_rows;
                                        } else {
                                            $total = 0;
                                        }

                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $total; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-[#E3F4F4] border-[0.2px] border-[#B7D3DF] rounded-lg">
                                    <span class="info-box-icon rounded-lg"><i class="ion ion-ios-browsers"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Application For Jobs</span>
                                        <?php
                                        $sql = "SELECT * FROM apply_job_post WHERE id_company='$_SESSION[id_company]'";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            $total = $result->num_rows;
                                        } else {
                                            $total = 0;
                                        }
                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $total; ?>
                                        </span>
                                    </div>
                                </div>
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





    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>

    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="../js/top-scroll.js"></script>
</body>

</html>