<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-job-post.php in URL.
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
    <title>Careerin - Resume Database</title>
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
    <link rel="stylesheet" href="../admin/adminstyle.css">
</head>


<body class="hold-transition skin-green sidebar-mini">


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
                            <div class="box-header flex items-center justify-center border-[0.2px] border-[#B7D3DF]">
                                <h3 class="box-title text-center text-gray-800  py-5">Welcome <b>
                                        <?php echo $_SESSION['name']; ?>
                                    </b></h3>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="index.php" class="custompositionicons">
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
                                    <li class="active"><a href="resume-database.php" class="custompositionicons">
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
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] border-[#B7D3DF] rounded-xl  padding-2">
                        <h2 class="mb-10 font-semibold text-5xl text-center">Talent Database</h2>
                        <p class="text-center m-5">In this section you can download resume of all candidates who applied
                            to your job
                            posts
                        </p>
                        <div class="row margin-top-20">
                            <div class="col-md-12">
                                <div class="box-body table-responsive no-padding">
                                    <table id="example2"
                                        class="table table-hover table-striped bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF] rounded">
                                        <thead>
                                            <th>Candidate</th>
                                            <th>Highest Qualification</th>
                                            <th>Skills</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Download Resume</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT users.* FROM job_post INNER JOIN apply_job_post ON job_post.id_jobpost=apply_job_post.id_jobpost  INNER JOIN users ON users.id_user=apply_job_post.id_user WHERE apply_job_post.id_company='$_SESSION[id_company]' GROUP BY users.id_user";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {

                                                    $skills = $row['skills'];
                                                    $skills = explode(',', $skills);
                                                    ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row['firstname'] . ' ' . $row['lastname']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['qualification']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                            foreach ($skills as $value) {
                                                                echo ' <span class="label label-success">' . $value . '</span>';
                                                            }
                                                            ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['city']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['state']; ?>
                                                </td>
                                                <td><a href="../uploads/resume/<?php echo $row['resume']; ?>"
                                                        class="custompositionicons"
                                                        download="<?php echo $row['firstname'] . ' Resume'; ?>">
                                                        <lord-icon src="https://cdn.lordicon.com/rmkahxvq.json"
                                                            trigger="hover" state="hover-arrow-down-2"
                                                            style="width:35px;height:20px">
                                                        </lord-icon><button class="text-blue-500">Download</button>
                                                    </a>
                                                </td>
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


    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer bg-[hsla(0,0%,100%,.1)] mt-5 text-white" style="margin-left: 0px;">
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

    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</body>

</html>