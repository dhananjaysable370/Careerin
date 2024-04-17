<?php

session_start();

if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Register Candidate</title>
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
</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="top-progress">
        <div class="my-progress-bar">
            <div class="filled-progress"></div>
        </div>
    </div>

    <header class="main-header flex align-center justify-between mt-5 ml-2  shadow">

        <!-- Logo -->
        <div class="">
            <a href="index.php">
                <img src="logo.png" alt="" class="h-20 mt-3   ">
            </a>
        </div>

        <!-- Header Navbar: style cbe found in header.less -->

        <nav class="text-gray-500 text-[16px] font-medium">
            <!-- Navbar Right Menu -->
            <!-- <div class="navbar-custom-menu flex justify-between"> -->
            <div class="flex justify-between items-center">

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

                        <a href="logout.php"
                            class=" rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700 text-white hover:text-white  hover:cursor-pointer">Logout</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

    </header>

    <div class="content-wrapper h-full w-full  flex align-center justify-center flex-col bg-[#E3F4F4]  mt-10"
        style="margin-left: 0px;">

        <section class="content-header">
            <div class="container">
                <div class="row latest-job margin-top-50 mb-20 bg-[#D2E9E9] rounded-xl">
                    <h1 class="text-center mt-10  text-gray-600 mb-16">
                        Create Your Profile</h1>
                    <form method="post" id="registerCandidates" action="adduser.php" enctype="multipart/form-data">
                        <div class="col-md-6 latest-job ">
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="fname" name="fname" placeholder="First Name *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="lname" name="lname" placeholder="Last Name *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="email" name="email" placeholder="Email *" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    rows="4" id="aboutme" name="aboutme" placeholder="Brief intro about yourself *"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="date" id="dob" name="dob" placeholder="Date Of Birth">
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="age" name="age" placeholder="Age" readonly>
                            </div>
                            <div class="form-group">
                                <label>Passing Year</label>
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="date" id="passingyear" name="passingyear" placeholder="Passing Year">
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="qualification" name="qualification"
                                    placeholder="Highest Qualification">
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="stream" name="stream" placeholder="Stream">
                            </div>
                            <div class="form-group checkbox">
                                <label><input type="checkbox"> I accept terms & conditions</label>
                            </div>
                            <div class="form-group">
                                <button
                                    class="btn  rounded-full shadow font-bold py-4 px-8 bg-teal-600  text-white hover:text-white">Register</button>
                            </div>
                            <?php
                            //If User already registered with this email then show error message.
                            if (isset($_SESSION['registerError'])) {
                                ?>
                            <div class="form-group">
                                <script>
                                alert("Email Already Exists! Choose A Different Email!");
                                </script>
                            </div>
                            <?php
                                unset($_SESSION['registerError']);
                            }
                            ?>

                            <?php if (isset($_SESSION['uploadError'])) { ?>
                            <div class="form-group">
                                <label style="color: red;">
                                    <?php echo $_SESSION['uploadError']; ?>
                                </label>
                            </div>
                            <?php unset($_SESSION['uploadError']);
                            } ?>

                        </div>
                        <div class="col-md-6 latest-job ">
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="password" id="password" name="password" placeholder="Password *" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="password" id="cpassword" name="cpassword" placeholder="Confirm Password *"
                                    required>
                            </div>
                            <div id="passwordError" class="btn btn-flat btn-danger hide-me">
                                Password Mismatch!!
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="contactno" name="contactno" minlength="10" maxlength="10"
                                    onkeypress="return validatePhone(event);" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    rows="4" id="address" name="address" placeholder="Address"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="state" name="state" placeholder="State">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    rows="4" id="skills" name="skills" placeholder="Enter Skills"></textarea>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" id="designation" name="designation" placeholder="Designation">
                            </div>

                            <div class="form-group">
                                <label class="text-red-600">File Format PDF Only!</label>
                                <input type="file" name="resume" class="btn btn-flat btn-danger" required>
                            </div>
                        </div>
                    </form>

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
    <script src="js/adminlte.min.js"></script>

    <script type="text/javascript">
    function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
            // 8 means Backspace
            //46 means Delete
            // 37 means left arrow
            // 39 means right arrow
            return true;
        } else if (key < 48 || key > 57) {
            // 48-57 is 0-9 numbers on your keyboard.
            return false;
        } else return true;
    }
    </script>

    <script type="text/javascript">
    $('#dob').on('change', function() {
        var today = new Date();
        var birthDate = new Date($(this).val());
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();

        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        $('#age').val(age);
    });
    </script>
    <script>
    $("#registerCandidates").on("submit", function(e) {
        e.preventDefault();
        if ($('#password').val() != $('#cpassword').val()) {
            $('#passwordError').show();
        } else {
            $(this).unbind('submit').submit();
        }
    });
    </script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="js/preloader.js"></script>
    <script src="js/top-scroll.js"></script>
</body>

</html>