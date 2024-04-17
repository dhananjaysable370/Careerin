<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once ("db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>careerin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">

    <!-- <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Custom -->


    <link rel="stylesheet" href="css/custom.css">
    <!-- <link rel="stylesheet" href="mystyle.css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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



    a:hover {
        text-decoration: none;
    }

    body {
        height: 100%;
        width: 100%;
        background-color: #e3f4f4 !important;
        -webkit-font-smoothing: antialiased !important;
        font-family: "Open sans";
        font-weight: 500 !important;
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

    .euclid {
        font-family: "Euclid Circular A" !important;
        font-weight: 700 !important;
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
        /* padding-left: 30px;
        padding-right: 100px; */
        /* backdrop-filter: blur(100px); */
    }



    .my-progress-bar {
        position: fixed;
        top: 0;
        width: 100%;
        min-height: 1.7vh;
        margin-bottom: 100px;
        /* z-index: 1000; */

    }

    .filled-progress {
        position: absolute;
        top: 1.3px;
        width: 0%;
        height: 100%;
        border-radius: 5px;
        background-image: linear-gradient(to right, #C4E0E5, #4CA1AF);

    }
    </style>

</head>

<!-- bg-[#121316] -->

<body id="main" class="hold-transition">


    <div id="preloader"></div>

    <div class="top-progress ">
        <div class="my-progress-bar">
            <div class="filled-progress">

            </div>
        </div>
    </div>

    <header class="main-header flex align-center justify-between mt-5 ml-2  shadow">

        <!-- #121316 -->

        <div class="">
            <a href="index.php">
                <img src="logo.png" alt="" class="h-20 mt-3   ">
            </a>
        </div><!-- Logo -->
        <!-- <a href="index.php" class="logo logo-bg"> -->
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <!-- <span class="logo-mini"><b>J</b>P</span> -->
        <!-- logo for regular state and mobile devices -->
        <!-- <span class="logo-lg"><b>career</b> <strong>in</strong></span>
            </a> -->

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="text-gray-500 text-[16px] font-medium">
            <!-- Navbar Right Menu -->
            <!-- <div class="navbar-custom-menu flex justify-between"> -->
            <div class="flex justify-between items-center">
                <ul>
                    <div class=" flex align-center justify-between  p-5 mr-32">
                        <li class="no-underline">
                            <a href="jobs.php" class="mr-2 p-9 hover:text-gray-800">Jobs</a>
                        </li>
                        <li>
                            <a href="#candidates" class="mr-2 p-9  hover:text-gray-800 ">Candidates</a>
                        </li>
                        <li>
                            <a href="#company" class="mr-2 p-9  hover:text-gray-800 ">Company</a>
                        </li>
                        <li>
                            <a href="#about" class="mr-2 p-9 hover:text-gray-800 ">About Us</a>
                        </li>
                    </div>
                </ul>


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
            </div>
        </nav>
    </header>

    <!-- bg-[#E3F4F4] content-wrapper -->
    <!-- Content Wrapper. Contains page content -->
    <div class=" h-full w-full  flex align-center justify-center flex-col bg-[#E3F4F4]  mt-28"
        style="margin-left: 0px;">
        <div class="mx-auto h-fit w-full pt-10  py-5 sm:py-5 lg:py-32 ">
            <div class="sm:mb-8 sm:flex sm:justify-center">
                <div
                    class="relative rounded-full leading-6 shadow text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20 font-bold tracking-wide p-5">
                    Getting started with Careerin. <a href="jobs.php"
                        class="font-semibold text-cyan-700 hover:text-cyan-900"><span
                            class="absolute inset-0 tracking-wide" aria-hidden="true"></span>Explore
                        Jobs
                        <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>

            <div class="text-center w-full">
                <h1
                    class=" font-semibold bg-gradient-to-br from-gray-500 via-teal-500 to-gray-500 bg-clip-text text-transparent custom-font tracking-tighter euclid">
                    Welcome to Career
                    Gateway,<br>
                    Explore Limitless Opportunities!</h1>
                <p class="mt-6 text-2xl leading-8 text-gray-600 tracking-wider poppins">Unlock your career
                    potential.<br>Explore, connect, and
                    thrive with<span class="text-cyan-700 font-medium tracking-wide satoshi">
                        Careerin</span>,
                    your ultimate job portal.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="sign-up.php"
                        class="rounded-full bg-teal-600 hover:bg-teal-700 text-white font-bold py-4 px-6 tracking-wider capitalize satoshi hover:text-white">Get
                        started</a>
                    <a href="#about"
                        class="font-semibold leading-6 text-gray-600 satoshi text-2xl tracking-normal capitalize hover:text-cyan-800">Learn
                        more <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>


        <div class="flex align-center justify-center h-full w-full">
            <div class="w-[80%] h-[.5px] bg-gray-400"></div>
        </div>
        <section class="mt-10">
            <!-- <section class="content-header "> bg-[#E3F4F4]-->
            <div class="bg-[#E3F4F4]  p-10">
                <div class="row">
                    <div class="col-md-12 latest-job margin-bottom-20 w-full ">
                        <h1 class="text-center text-gray-500 pb-16">
                            Latest Jobs</h1>
                        <?php

                        $sql = "SELECT * FROM job_post Order By Rand() Limit 7";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $sql1 = "SELECT * FROM company WHERE id_company='$row[id_company]'";
                                $result1 = $conn->query($sql1);
                                if ($result1->num_rows > 0) {
                                    while ($row1 = $result1->fetch_assoc()) {
                                        ?>
                        <div
                            class="attachment-block mt-6 bg-[#D2E9E9] text-black border-[1px] border-[#B7D3DF] clearfix shadow  rounded-2xl p-5">
                            <img class="attachment-img rounded-full p-7" src="img/google-verified-1.svg"
                                alt="Attachment Image">
                            <div class="attachment-pushed">
                                <h3 class="attachment-heading text-3xl text-gray-700   satoshi">
                                    <a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"
                                        class=" hover:text-gray-950">
                                        <?php echo $row['jobtitle']; ?>
                                    </a>
                                    <span class="attachment-heading pull-right">
                                        <?php echo $row['maximumsalary']; ?> Rs. /Month
                                    </span>
                                </h3>
                                <div class="attachment-text ">
                                    <div class="mt-3"><strong class="text-gray-500 text-xl satoshi">
                                            <?php echo $row1['companyname']; ?> |
                                            <?php echo $row1['city']; ?>
                                            | Experience
                                            <?php echo $row['experience']; ?> Years
                                        </strong></div>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                }
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </section>

        <div class="flex align-center justify-center h-full w-full">
            <div class="w-[70%] h-[.5px] bg-gray-400"></div>
        </div>
        <section id="candidates" class="content-header mt-10  flex align-center justify-center pb-16">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center latest-job text-gray-600 margin-bottom-20">
                        <h1 class="text-center text-gray-500  mb-5">
                            Candidates</h1>
                        <p>Finding a job just got easier. Create a profile and apply with single mouse click.
                        </p>
                    </div>
                </div>
                <div class="row mt-16">
                    <div class="col-sm-4 col-md-4 ">
                        <div
                            class="thumbnail candidate-img hover:shadow p-8 bg-[#D2E9E9] border-[1px] border-[#B7D3DF] rounded-2xl ">
                            <img src="img/browse.svg" class="rounded" alt="Browse Jobs">
                            <div class="caption">
                                <h3 class="text-center text-gray-700">Browse Jobs</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div
                            class="thumbnail candidate-img border-[1px] border-[#B7D3DF] hover:shadow p-8 bg-[#D2E9E9] rounded-2xl">
                            <img src="img/interview.svg" class="rounded" alt="Apply & Get Interviewed">
                            <div class="caption">
                                <h3 class="text-center text-gray-700">Apply & Get Interviewed</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div
                            class="thumbnail candidate-img  hover:shadow p-8 bg-[#D2E9E9] border-[1px] border-[#B7D3DF] rounded-2xl">
                            <img src="img/career.svg" class="rounded" alt="Start A Career">
                            <div class="caption">
                                <h3 class="text-center text-gray-700">Start A Career</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="flex align-center justify-center h-full w-full">
            <div class="w-[70%] h-[.5px] bg-gray-400"></div>
        </div>
        <section id="company" class="content-header mt-10 flex align-center justify-center pb-16 w-full h-full">
            <div class="container">
                <div class="row mt-10">
                    <div class="col-md-12 text-center text-gray-600 latest-job margin-bottom-20">
                        <h1 class="text-center text-gray-500  mb-5">
                            Companies</h1>
                        <p>Hiring? Register your company for free, browse our talented pool, post and track job
                            applications</p>
                    </div>
                </div>
                <div class="row mt-16">
                    <div class="col-sm-4 col-md-4">
                        <div
                            class="thumbnail company-img p-8 border-[1px] border-[#B7D3DF] hover:shadow bg-[#D2E9E9] rounded-3xl">
                            <img src="img/post.svg" class="rounded" alt="Browse Jobs">
                            <div class="caption">
                                <h3 class="text-center text-gray-700">Post A Job</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4 ">
                        <div
                            class="thumbnail company-img border-[1px] border-[#B7D3DF] p-8 hover:shadow bg-[#D2E9E9] rounded-3xl">
                            <img src="img/track.svg" class="rounded" alt="Apply & Get Interviewed">
                            <div class="caption">
                                <h3 class="text-center text-gray-700">Manage & Track</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div
                            class="thumbnail company-img p-8 border-[1px] border-[#B7D3DF] hover:shadow bg-[#D2E9E9] rounded-3xl">
                            <img src="img/hire.svg" class="rounded " alt="Start A Career">
                            <div class="caption">
                                <h3 class="text-center text-gray-700">Hire</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="flex align-center justify-center h-full w-full">
            <div class="w-[70%] h-[.5px] bg-gray-400"></div>
        </div>
        <section id="statistics" class="content-header flex justify-center align-center mt-10 pb-16">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-gray-600 text-center latest-job margin-bottom-20">
                        <h1 class="text-center text-gray-500 mb-5">
                            Our Statistics</h1>
                    </div>
                </div>
                <div class="row mt-10">
                    <div class="col-lg-3 col-xs-6 ">
                        <!-- small box -->
                        <div
                            class="small-box bg-[#C4DFDF] border-[2px] border-[#B7D3DF]  flex align-center justify-between rounded-xl hover:shadow">
                            <div class="inner text-gray-700">
                                <?php
                                $sql = "SELECT * FROM job_post";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $totalno = $result->num_rows;
                                } else {
                                    $totalno = 0;
                                }
                                ?>
                                <h3>
                                    <?php echo $totalno; ?>
                                </h3>

                                <p>Job Offers</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-paper text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div
                            class="small-box bg-[#C4DFDF] border-[2px] border-[#B7D3DF] flex align-center justify-between rounded-xl hover:shadow">
                            <div class="inner text-gray-700">
                                <?php
                                $sql = "SELECT * FROM company WHERE active='1'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $totalno = $result->num_rows;
                                } else {
                                    $totalno = 0;
                                }
                                ?>
                                <h3>
                                    <?php echo $totalno; ?>
                                </h3>

                                <p>Registered Company</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-briefcase text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div
                            class="small-box bg-[#C4DFDF] border-[2px] border-[#B7D3DF] flex align-center justify-between rounded-xl hover:shadow">
                            <div class="inner text-gray-700">
                                <?php
                                $sql = "SELECT * FROM users WHERE resume!=''";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $totalno = $result->num_rows;
                                } else {
                                    $totalno = 0;
                                }
                                ?>
                                <h3>
                                    <?php echo $totalno; ?>
                                </h3>

                                <p>CV'S/Resume</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-list text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div
                            class="small-box bg-[#C4DFDF] border-[2px] border-[#B7D3DF] flex align-center justify-between rounded-xl hover:shadow">
                            <div class="inner text-gray-700">
                                <?php
                                $sql = "SELECT * FROM users WHERE active='1'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $totalno = $result->num_rows;
                                } else {
                                    $totalno = 0;
                                }
                                ?>
                                <h3>
                                    <?php echo $totalno; ?>
                                </h3>

                                <p>Daily Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-stalker text-gray-500"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
        </section>

        <div class="flex align-center justify-center h-full w-full">
            <div class="w-[70%] h-[.5px] bg-gray-400"></div>
        </div>
        <section id="about" class="content-header flex align-center justify-center mt-5 pb-16 mb-10">
            <div class="container rounded-lg  p-8">
                <div class="row">
                    <div class="col-md-12 text-gray-600 text-center latest-job margin-bottom-20">
                        <h1 class="text-center text-gray-500 mb-5">
                            About US</h1>
                    </div>
                </div>
                <div class="row flex align-center justify-center mt-10">
                    <div class="col-md-6 border-[1px] border-[#B7D3DF] rounded-xl mr-10 py-5 custom-img-filter">
                        <img src="img/aboutus.svg" class="img-responsive rounded-lg ">
                    </div>
                    <div class="col-md-6 text-gray-700  text-[16.3px] margin-bottom-20 satoshi mt-5">
                        <p>The online careerin application allows job seekers and recruiters to connect.The
                            application provides the ability for job seekers to create their accounts, upload
                            their
                            profile and resume, search for jobs, apply for jobs, view different job openings.
                            The
                            application provides the ability for companies to create their accounts, search
                            candidates, create job postings, and view candidates applications.
                        </p>
                        <p>
                            This website is used to provide a platform for potential candidates to get their
                            dream
                            job and excel in yheir career.
                            This site can be used as a paving path for both companies and job-seekers for a
                            better
                            life .

                        </p>

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
    <!-- footer end -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>


    <!-- locomotive-scroll-js -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></scrip> -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- <script src="js/index.js"></script> -->

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="js/preloader.js"></script>
    <script src="js/top-scroll.js"></script>
</body>

</html>