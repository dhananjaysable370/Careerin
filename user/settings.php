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
    <title>Careerin - Settings</title>
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
                        <div class="box box-solid border-[0.2px] border-[#B7D3DF] bg-[#DEEDF0]">
                            <div
                                class="box-header flex items-center justify-center border-[0.2px] border-[#B7D3DF] rounded ">
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
                                    <li class=""><a href="mailbox.php" class="custompositionicons">
                                            <lord-icon src="https://cdn.lordicon.com/nzixoeyk.json" trigger="hover"
                                                style="width:35px;height:20px">
                                            </lord-icon> Mailbox
                                        </a></li>
                                    <li class="active"><a href="settings.php" class="custompositionicons">
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
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] border-[#B7D3DF] mb-10  rounded-xl padding-2">
                        <h2 class="box-title mb-5 font-semibold text-5xl text-gray-700 text-center">Change Password</h2>
                        <p class="text-center mb-10">Type in new password that you want to use</p>
                        <div class="row">
                            <div class="col-md-6">
                                <form id="changePassword" action="change-password.php" method="post">
                                    <div class="form-group">
                                        <svg class="absolute text-gray-600 mt-6 ml-4" viewBox="0 0 24 24" width="18">
                                            <path
                                                d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z" />
                                        </svg>
                                        <input id="password"
                                            class="form-control input-lg bg-transparent rounded  border border-gray-300 text-gray-800 text-sm focus:ring-blue-500 focus:border-blue-500 pl-16 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="password" name="password" autocomplete="off"
                                            placeholder="New Password" required>
                                    </div>
                                    <div class="form-group">
                                        <svg class="absolute text-gray-400 mt-6 ml-4" viewBox="0 0 24 24" width="18">
                                            <path
                                                d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z" />
                                        </svg>
                                        <input id="cpassword"
                                            class="form-control input-lg bg-transparent border border-gray-300 text-gray-800 text-sm rounded focus:ring-blue-500 focus:border-blue-500 pl-16 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="password" autocomplete="off" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn  btn-success rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700 text-white hover:text-white mb-5">Change
                                            Password</button>
                                    </div>
                                    <div id="passwordError" class="color-red text-center hide-me">
                                        Password Mismatch!!
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form action="deactivate-account.php" method="post">
                                    <div>
                                        <label class="inline-flex items-center" for="tealCheckBox">
                                            <input id="tealCheckBox" type="checkbox" class="w-4 h-4 accent-teal-600"
                                                required>
                                            <span class="ml-2">I Want To
                                                Deactivate My Account</span>
                                        </label>
                                    </div>
                                    <!-- <label><input type="checkbox" class="w-4 h-4 accent-teal-600" required> I Want To
                    Deactivate My Account</label> -->
                                    <button type="submit"
                                        class="btn btn-danger mt-5  btn-lg rounded-full shadow font-bold py-4 px-8 bg-red-500 hover:bg-red-600 text-white hover:text-white mb-5">Deactivate
                                        My
                                        Account</button>
                                </form>
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
    <!-- AdminLTE App -->
    <script src="../js/adminlte.min.js"></script>
    <script>
    $("#changePassword").on("submit", function(e) {
        e.preventDefault();
        if ($('#password').val() != $('#cpassword').val()) {
            $('#passwordError').show();
        } else {
            $(this).unbind('submit').submit();
        }
    });
    </script>

    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</body>

</html>