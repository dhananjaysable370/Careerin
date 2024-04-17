<?php
session_start();
if (isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) {
    header("Location: index.php");
    exit();
}
require_once ("db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Register Company</title>

    <!--Tailwind CSS-->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="css/mystyle.css">
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

</head>

<body class="hold-transition skin-green sidebar-mini">
    <div class="top-progress">
        <div class="my-progress-bar">
            <div class="filled-progress"></div>
        </div>
    </div>

    <header class="main-header flex align-center justify-between mt-5 ml-2 shadow">

        <!-- Logo -->
        <div class="">
            <a href="index.php">
                <img src="logo.png" alt="" class="h-20 mt-3">
            </a>
        </div>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu mt-2">
                <ul class="flex items-center justify-center">
                    <li>
                        <a href="jobs.php"
                            class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] mr-5 px-6 py-4  rounded-full text-2xl  shadow font-bold custom-border hover:text-gray-600">Jobs</a>
                    </li>
                    <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
                    <li>
                        <a href="login.php"
                            class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] mr-5 px-6 py-4  rounded-full text-2xl  shadow font-bold custom-border hover:text-gray-600">Login</a>
                    </li>
                    <li>
                        <a href="sign-up.php"
                            class="rounded-full shadow font-bold py-4 px-8 bg-teal-600  text-white hover:text-white">Sign
                            Up</a>
                    </li>
                    <?php } else {
                        if (isset($_SESSION['id_user'])) {
                            ?>
                    <li>
                        <a href="user/index.php">Dashboard</a>
                    </li>
                    <?php
                        } else if (isset($_SESSION['id_company'])) {
                            ?>
                    <li>
                        <a href="company/index.php">Dashboard</a>
                    </li>
                    <?php }
                        ?>
                    <li>
                        <a href="logout.php"
                            class="rounded-full shadow font-bold py-4 px-8 bg-teal-600  text-white hover:text-white">Logout</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="mt-10 " style="margin-left: 0px;">
        <section class="content-header">
            <div class="container ">
                <div class="row latest-job margin-top-50 mb-20 bg-[#D2E9E9] border-[0.2px] border-[#B7D3DF] rounded-xl">
                    <h1 class="text-center mt-10  text-gray-600  mb-16">
                        Create Company Profile</h1>
                    <form method="post" id="registerCompanies" action="addcompany.php" enctype="multipart/form-data"
                        class="m-10 flex">
                        <div class="col-md-6 latest-job">
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" name="name" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" name="companyname" placeholder="Company Name" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" name="website" placeholder="Website">
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    rows="4" name="aboutme" placeholder="Brief info about your company"></textarea>
                            </div>
                            <div class="form-group checkbox">
                                <label><input type="checkbox" required> I accept terms & conditions</label>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="btn  rounded-full shadow font-bold py-4 px-8 bg-teal-600  text-white hover:text-white ">Register</button>
                            </div>
                            <?php
                            //If Company already registered with this email then show error message.
                            if (isset($_SESSION['registerError'])) {
                                ?>
                            <script>
                            alert("Email Already Exists! Choose A Different Email!");
                            </script>
                            <?php
                                unset($_SESSION['registerError']);
                            }
                            ?>
                            <?php
                            if (isset($_SESSION['uploadError'])) {
                                ?>
                            <div>
                                <p class="text-center" style="color: red;">
                                    <?php echo $_SESSION['uploadError']; ?>
                                </p>
                            </div>
                            <?php
                                unset($_SESSION['uploadError']);
                            }
                            ?>
                        </div>
                        <div class="col-md-6 latest-job ">
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="password" name="cpassword" placeholder="Confirm Password" required>
                            </div>
                            <div id="passwordError" class="btn btn-flat btn-danger hide-me">
                                Password Mismatch!!
                            </div>
                            <div class="form-group">
                                <input class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    type="text" name="contactno" placeholder="Phone Number" minlength="10"
                                    maxlength="10" autocomplete="off" onkeypress="return validatePhone(event);"
                                    required>
                            </div>
                            <div class="form-group">
                                <select class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    id="country" name="country" required>
                                    <option selected="" value="">Select Country</option>
                                    <?php
                                    $sql = "SELECT * FROM countries";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['name'] . "' data-id='" . $row['id'] . "'>" . $row['name'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div id="stateDiv" class="form-group" style="display: none;">
                                <select class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    id="state" name="state" required>
                                    <option value="" selected="">Select State</option>
                                </select>
                            </div>
                            <div id="cityDiv" class="form-group" style="display: none;">
                                <select class="form-control input-lg shadow text-gray-800 border rounded-xl px-5"
                                    id="city" name="city" required>
                                    <option selected="">Select City</option>
                                </select>
                            </div>
                            <div class="form-group input-lg mt-3 ">
                                <label>Attach Company Logo</label>
                                <input type="file" name="image"
                                    class="form-control input-lg shadow text-gray-800 border rounded-xl px-5" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>



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
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
            return true;
        } else if (key < 48 || key > 57) {
            return false;
        } else return true;
    }
    </script>

    <script>
    $("#country").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#state").find('option:not(:first)').remove();
        if (id != '') {
            $.post("state.php", {
                id: id
            }).done(function(data) {
                $("#state").append(data);
            });
            $('#stateDiv').show();
        } else {
            $('#stateDiv').hide();
            $('#cityDiv').hide();
        }
    });
    </script>

    <script>
    $("#state").on("change", function() {
        var id = $(this).find(':selected').attr("data-id");
        $("#city").find('option:not(:first)').remove();
        if (id != '') {
            $.post("city.php", {
                id: id
            }).done(function(data) {
                $("#city").append(data);
            });
            $('#cityDiv').show();
        } else {
            $('#cityDiv').hide();
        }
    });
    </script>
    <script>
    $("#registerCompanies").on("submit", function(e) {
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
    <script src="js/top-scroll.js"></script>

</body>

</html>