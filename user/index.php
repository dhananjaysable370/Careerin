<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_user'])) {
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Careerin - User Dashboard</title>
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



    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Custom -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/mystyle.css">

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
        /* background-color: #e3f4f4 !important; */
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

    .custom-box {
        background: rgba(104, 178, 160, 0.5);
        -webkit-backdrop-filter: blur(42px);
        backdrop-filter: blur(42px);
        border: 1px solid rgba(104, 178, 160, 0.25);
    }
    </style>

    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <link rel="stylesheet" href="../admin/adminstyle.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
</head>

<body class="hold-transition skin-green sidebar-mini">


    <header class="main-header flex align-center justify-between mt-5 ml-2  shadow" style="margin-top: 15px;">

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
        style="margin-left: 0px; margin-top:90px;">

        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div
                            class="box custom-box box-solid bg-[#DEEDF0] border-[0.7px] border-[#B7D3DF] shadow rounded-lg">
                            <div
                                class="box-header flex justify-center align-center border-[0.2px] border-[#B7D3DF] rounded-lg ">
                                <h3 class="box-title text-center text-gray-800  p-5">Welcome<br> <b>
                                        <?php echo $_SESSION['name']; ?>
                                    </b></h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class=""><a href="edit-profile.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/ijahpotn.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Edit
                                            Profile
                                        </a></li>
                                    <li class="active">
                                        <a href="index.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/zrtfxghu.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> My
                                            Applications
                                        </a>
                                    </li>
                                    <li><a href="../jobs.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/mdmniuqr.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Jobs
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
                    <div class="col-md-9 bg-[#F1F9F9] rounded-xl padding-2 border-[0.2px] border-[#B7D3DF] mb-10">
                        <h2 class="mb-3 text-center font-bold text-5xl">Recent Applications</h2>
                        <p class="text-center">Below you will find job roles you have applied for</p>

                        <?php
                        $sql = "SELECT * FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost WHERE apply_job_post.id_user='$_SESSION[id_user]'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>
                        <div
                            class="attachment-block clearfix padding-2 bg-[#DEEDF0] rounded-xl border-[0.2px] border-[#B7D3DF] mt-4">
                            <h4 class="attachment-heading font-bold text-3xl"><a
                                    href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>">
                                    <?php echo $row['jobtitle']; ?>
                                </a>
                            </h4>
                            <div class="attachment-text font-bold text-2xl mt-5 ">
                                <div class="pull-left custompositionicons">
                                    <lord-icon src="https://cdn.lordicon.com/abfverha.json" trigger="hover"
                                        style="width:35px;height:20px">
                                    </lord-icon>
                                    <?php echo $row['createdat']; ?>
                                </div>
                                <?php

                                        if ($row['status'] == 0) {
                                            echo '<div class="pull-right"><strong class="text-orange">Pending</strong></div>';
                                        } else if ($row['status'] == 1) {
                                            echo '<div class="pull-right"><strong class="text-red">Rejected</strong></div>';
                                        } else if ($row['status'] == 2) {
                                            echo '<div class="pull-right"><strong class="text-green">Under Review</strong></div> ';
                                        }
                                        ?>

                            </div>
                        </div>

                        <?php
                            }
                        }
                        ?>

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
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>




    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>

    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</body>

</html>