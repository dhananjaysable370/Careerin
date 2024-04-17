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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Active Jobs</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/mystyle.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
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
    <div class="content-wrapper h-full w-full flex align-center justify-center flex-col bg-[#E3F4F4] mt-36 "
        style="margin-left: 0px;">

        <section id="candidates" class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box box-solid bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF]  rounded-lg">
                            <div
                                class="box-header border-[0.2px] border-[#B7D3DF] rounded flex justify-center align-center ">
                                <h3 class="box-title text-4xl text-gray-800 py-5">Welcome <b>Admin</b></h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class=" flex justify-between items-center">
                                        <a href="dashboard.php" class="custompositionicons">
                                            <img src="../icons/dashboard.png" class="mr-2" alt="" width="18px">
                                            <button>Dashboard</button>
                                        </a>
                                    </li>
                                    <li class="active"><a href="active-jobs.php" class="custompositionicons"><img
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
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] border-[#B7D3DF] rounded-xl padding-2">

                        <h3 class="mb-10 text-center font-bold text-5xl">Active Job Posts</h3>
                        <div class="row margin-top-20">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table id="example2" class="table table-hover bg-[#DEEDF0] rounded-xl">
                                        <thead>
                                            <th>Job Name</th>
                                            <th>Company Name</th>
                                            <th>Date Created</th>
                                            <th>View</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT job_post.*, company.companyname FROM job_post INNER JOIN company ON job_post.id_company=company.id_company";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $i = 0;
                                                while ($row = $result->fetch_assoc()) {
                                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['jobtitle']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['companyname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo date("d-M-Y", strtotime($row['createdat'])); ?>
                                                </td>
                                                <td><a href="view-job-post.php?id=<?php echo $row['id_jobpost']; ?>"
                                                        class="custompositionicons">
                                                        <lord-icon src="https://cdn.lordicon.com/vdjwmfqs.json"
                                                            trigger="hover" style="width:35px;height:20px">
                                                        </lord-icon><button class="text-blue-500">View</button>
                                                        <!-- <img src="../icons/cv.png" alt="" width="18px"></a> -->
                                                </td>
                                                <td><a href="delete-job-post.php?id=<?php echo $row['id_jobpost']; ?>"
                                                        class="custompositionicons">
                                                        <lord-icon src="https://cdn.lordicon.com/wpyrrmcq.json"
                                                            trigger="hover" style="width:35px;height:20px">
                                                        </lord-icon><button class="text-red-500">Delete</button>
                                                    </a></td>
                                            </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <div class="modal modal-success fade" id="modal-success">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Job Title</h4>
                    </div>
                    <div class="modal-body">
                        <h3><b>Created On</b></h3>
                        <p>24/04/2017</p>
                        <br>
                        <h3><b>Company Name</b></h3>
                        <p>XYX Private Limited</p>
                        <br>
                        <h3><b>Company Email</b></h3>
                        <p>test@test.com</p>
                        <br>
                        <h3><b>Location</b></h3>
                        <p>India</p>
                        <br>
                        <h3><b>Application Message</b></h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


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


    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>

    <script>
    $(function() {
        $('#example2').DataTable({
            'paging': true,
            'lengthChange': false,
            'searching': false,
            'ordering': true,
            'info': true,
            'autoWidth': false
        });
    });
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</body>

</html>