<?php

session_start();

if (empty($_SESSION['id_admin'])) {
    header("Location: index.php");
    exit();
}

require_once ("../db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-16">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>careerin - Admin Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <!-- Custom -->

    <!-- Tailwindcss -->

    <link rel="stylesheet" href="../css/custom.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Theme style -->
    <link rel="stylesheet" href="../css/mystyle.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css"
        integrity="sha512-UuQ/zJlbMVAw/UU8vVBhnI4op+/tFOpQZVT+FormmIEhRSCnJWyHiBbEVgM4Uztsht41f3FzVWgLuwzUqOObKw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
    <!-- <![endif] -->

    <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="adminstyle.css">

</head>

<body class="hold-transition skin-green sidebar-mini">


    <header class="main-header flex align-center justify-between mt-5 ml-2  shadow">

        <!-- Logo -->
        <div class="">
            <a href="index.php">
                <img src="../img/logo.png" alt="" class="h-20 mt-3   ">
            </a>
        </div>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="">
            <!-- Navbar Right Menu -->
            <div class="mt-2">
                <ul class=" text-gray-800">
                    <li>
                        <a href="../logout.php"
                            class="rounded-full shadow font-bold py-4 px-8 bg-teal-600  text-white hover:text-white">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper  h-full w-full flex align-center justify-center flex-col bg-[#E3F4F4] mt-36"
        style="margin-left: 0px;">

        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-solid bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF] rounded-lg">
                            <div
                                class=" box-header flex border-[0.2px] border-[#B7D3DF] rounded justify-center align-center">
                                <h3 class="box-title text-center place-self-center py-5 text-gray-800 opensans">Welcome
                                    <b>Admin</b>
                                </h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active flex justify-between items-center">
                                        <a href="dashboard.php" class="custompositionicons">
                                            <img src="../icons/dashboard.png" class="mr-2" alt="" width="20px">
                                            <button>Dashboard</button>
                                        </a>
                                    </li>
                                    <li><a href="active-jobs.php" class="custompositionicons"><img
                                                src="../icons/graph.png" class="mr-3" alt="" width="16px"><button>Active
                                                Jobs</button> </a>
                                    </li>
                                    <li><a href="applications.php" class="custompositionicons">
                                            <img src="../icons/application.png" class="mr-2" alt="" width="18px">
                                            <button>Applications</button>
                                        </a></li>
                                    <li><a href="companies.php" class="custompositionicons">
                                            <img src="../icons/compnies.png" class="mr-2" alt=""
                                                width="18px"><button>Companies</button> </a></li>
                                    <li><a href="../logout.php" class="custompositionicons">
                                            <img src="../icons/logout.png" class="mr-2" alt="" width="18px"><button>
                                                Logout
                                            </button> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] border-[#B7D3DF] mb-10 rounded-xl padding-2">

                        <h3 class="mb-10 text-center font-bold text-5xl">
                            Careerin Statistics</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-box bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF] rounded-lg">
                                    <span class="info-box-icon border-[0.2px] border-[#B7D3DF]  bg-[#ADC4CE] rounded"><i
                                            class="ion ion-briefcase"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text font-bold">Active Company Registered</span>
                                        <?php
                                        $sql = "SELECT * FROM company WHERE active='1'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                        } else {
                                            $totalno = 0;
                                        }
                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $totalno; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF] rounded-lg">
                                    <span class="info-box-icon border-[0.2px] border-[#B7D3DF]  bg-[#ADC4CE] rounded"><i
                                            class="ion ion-briefcase"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text font-bold">Pending Company Approval</span>
                                        <?php
                                        $sql = "SELECT * FROM company WHERE active='2'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                        } else {
                                            $totalno = 0;
                                        }
                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $totalno; ?>
                                        </span>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF]   rounded-lg">
                                    <span class="info-box-icon bg-[#ADC4CE] rounded">
                                        <i class="ion ion-person-stalker">
                                        </i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text font-bold">Registered Candidates</span>
                                        <?php
                                        $sql = "SELECT * FROM users WHERE active='1'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                        } else {
                                            $totalno = 0;
                                        }
                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $totalno; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF] rounded-lg">
                                    <span class="info-box-icon bg-[#ADC4CE] rounded"><i
                                            class="ion ion-person-stalker"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text font-bold">Pending Candidates Confirmation</span>
                                        <?php
                                        $sql = "SELECT * FROM users WHERE active='0'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                        } else {
                                            $totalno = 0;
                                        }
                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $totalno; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF]  rounded-lg">
                                    <span class="info-box-icon bg-[#ADC4CE] rounded"><i
                                            class="ion ion-person-add"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text font-bold">Total Job Posts</span>
                                        <?php
                                        $sql = "SELECT * FROM job_post";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                        } else {
                                            $totalno = 0;
                                        }
                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $totalno; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF]  rounded-lg">
                                    <span class="info-box-icon bg-[#ADC4CE] rounded"><i
                                            class="ion ion-ios-browsers"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text font-bold">Total Applications</span>
                                        <?php
                                        $sql = "SELECT * FROM apply_job_post";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            $totalno = $result->num_rows;
                                        } else {
                                            $totalno = 0;
                                        }
                                        ?>
                                        <span class="info-box-number">
                                            <?php echo $totalno; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




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


        <!-- ./wrapper -->

        <!-- jQuery 3 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../js/adminlte.min.js"></script>

        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <script src="https://kit.fontawesome.com/aaf0939b1c.js" crossorigin="anonymous"></script>
</body>

</html>