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
    <title>Careerin - MailBox</title>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Custom -->
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/mystyle.css">
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
                            <div
                                class="box-header flex justify-center border-[0.2px] border-[#B7D3DF] rounded align-center">
                                <h3 class="box-title text-center text-gray-800 p-5">Welcome<br> <b>
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
                                    <li class="">
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
                                    <li class="active"><a href="mailbox.php" class="custompositionicons">
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
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] border-[#B7D3DF] rounded-xl mb-10 padding-2">
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="box box-primary rounded-xl border-[0.2px] p-3 border-[#B7D3DF]">
                                        <div class="box-header border-[0.2px] border-[#B7D3DF] with-border">
                                            <h3 class="box-title mb-3 font-semibold text-5xl"
                                                style="margin-bottom: 20px;">
                                                Mailbox</h3>
                                            <div class="pull-right ">
                                                <a href="create-mail.php"
                                                    class="btn btn btn-success rounded shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700  text-white hover:text-white items-center">
                                                    Create
                                                </a>
                                            </div>
                                            <!-- /.box-tools -->
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body no-padding">
                                            <div class="table-responsive mailbox-messages">
                                                <table id="example1"
                                                    class="table table-hover table-striped bg-[#DEEDF0]">
                                                    <thead>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $sql = "SELECT * FROM mailbox WHERE id_fromuser='$_SESSION[id_user]' OR id_touser='$_SESSION[id_user]'";
                                                        $result = $conn->query($sql);
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                ?>
                                                        <tr>
                                                            <td class="mailbox-subject"><a
                                                                    href="read-mail.php?id_mail=<?php echo $row['id_mailbox']; ?>">
                                                                    <?php echo $row['subject']; ?>
                                                                </a>
                                                            </td>
                                                            <td class="mailbox-date">
                                                                <?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Subject</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <!-- /.table -->
                                            </div>
                                            <!-- /.mail-box-messages -->
                                        </div>
                                        <!-- /.box-body -->

                                    </div>
                                    <!-- /. box -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </section>

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
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script>
    $(function() {
        $('#example1').DataTable();
    })
    </script>

    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

</body>

</html>