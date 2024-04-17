<?php

//To Handle Session Variables on This Page
session_start();

//If user Not logged in then redirect them back to homepage. 
if (empty($_SESSION['id_company'])) {
    header("Location: ../index.php");
    exit();
}

require_once ("../db.php");

$sql = "SELECT * FROM mailbox WHERE id_mailbox='$_GET[id_mail]' AND (id_fromuser='$_SESSION[id_company]' OR id_touser='$_SESSION[id_company]')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['fromuser'] == "company") {
        $sql1 = "SELECT * FROM company WHERE id_company='$row[id_fromuser]'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $rowCompany = $result1->fetch_assoc();
        }
        $sql2 = "SELECT * FROM users WHERE id_user='$row[id_touser]'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $rowUser = $result2->fetch_assoc();
        }
    } else {
        $sql1 = "SELECT * FROM company WHERE id_company='$row[id_touser]'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            $rowCompany = $result1->fetch_assoc();
        }
        $sql2 = "SELECT * FROM users WHERE id_user='$row[id_fromuser]'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            $rowUser = $result2->fetch_assoc();
        }
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Read Mail</title>
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
    <link rel="stylesheet" href="../css/mystyle.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

    <script src="../js/tinymce/tinymce.min.js"></script>
    <script>
    tinymce.init({
        selector: '#description',
        height: 150
    });
    </script>
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
                        <div class="box box-solid bg-[#DEEDF0] border-[0.2px] border-[#B7D3DF]">
                            <div
                                class="box-header flex items-center justify-center border-[0.2px] border-[#B7D3DF] rounded">
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
                                    <li class="active "><a href="mailbox.php" class="custompositionicons">
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
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] border-[#B7D3DF] rounded-xl padding-2">
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="mailbox.php"
                                        class="btn  btn-success rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700 text-white hover:text-white mb-5">
                                        Back</a>
                                    <div class="box box-primary border-[0.2px] border-[#B7D3DF] p-3">
                                        <!-- /.box-header -->
                                        <div class="box-body no-padding">
                                            <div class="mailbox-read-info">
                                                <h3>
                                                    <?php echo $row['subject']; ?>
                                                </h3>
                                                <h5>From:
                                                    <?php echo $rowCompany['companyname']; ?>
                                                    <span class="mailbox-read-time pull-right">
                                                        <?php echo date("d-M-Y h:i a", strtotime($row['createdAt'])); ?>
                                                    </span>
                                                </h5>
                                            </div>
                                            <div class="mailbox-read-message">
                                                <?php echo stripcslashes($row['message']); ?>
                                            </div>
                                            <!-- /.mailbox-read-message -->
                                        </div>
                                        <!-- /.box-body -->
                                    </div>

                                    <?php

                                    $sqlReply = "SELECT * FROM reply_mailbox WHERE id_mailbox='$_GET[id_mail]'";
                                    $resultReply = $conn->query($sqlReply);
                                    if ($resultReply->num_rows > 0) {
                                        while ($rowReply = $resultReply->fetch_assoc()) {
                                            ?>
                                    <div
                                        class="box box-primary border-[0.2px] border-[#B7D3DF] p-3 shadow-lg rounded-lg">
                                        <div class="box-body border-[0.2px] border-[#B7D3DF]">
                                            <div class="mailbox-read-info">
                                                <h3>Reply Message</h3>
                                                <h5>From:
                                                    <?php if ($rowReply['usertype'] == "company") {
                                                                echo $rowCompany['companyname'];
                                                            } else {
                                                                echo $rowUser['firstname'];
                                                            } ?>
                                                    <span class="mailbox-read-time pull-right">
                                                        <?php echo date("d-M-Y h:i a", strtotime($rowReply['createdAt'])); ?>
                                                    </span>
                                                </h5>
                                            </div>
                                            <div class="mailbox-read-message">
                                                <?php echo stripcslashes($rowReply['message']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    }
                                    ?>


                                    <div class="box box-primary">
                                        <!-- /.box-header -->
                                        <div class="box-body no-padding">
                                            <div class="mailbox-read-info">
                                                <h3>Send Reply</h3>
                                            </div>
                                            <div class="mailbox-read-message">
                                                <form action="reply-mailbox.php" method="post">
                                                    <div class="form-group">
                                                        <textarea class="form-control input-lg" id="description"
                                                            name="description" placeholder="Job Description"></textarea>
                                                        <input type="hidden" name="id_mail"
                                                            value="<?php echo $_GET['id_mail']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit"
                                                            class="btn  btn-success rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700 text-white hover:text-white mb-5">Reply</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.mailbox-read-message -->
                                        </div>
                                        <!-- /.box-body -->
                                    </div>


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

    <footer class="main-footer bg-[hsla(0,0%,100%,.1)] mt-5 text-white" style="margin-left: 0px;">
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