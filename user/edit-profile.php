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
    <title>Careerin - Edit Profile</title>
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

    body {
        height: 100%;
        width: 100%;
        background-color: #E3F4F4 !important;
        -webkit-font-smoothing: antialiased !important;
        font-weight: 500 !important;
    }

    .custom-border {
        border: 1px solid hsla(0, 0%, 100%, .05);
    }

    header {
        background-color: #C4DFDF;
    }

    header {
        width: 90% !important;
        display: flex !important;
        /* float: center !important; */
        justify-content: space-between !important;
        align-items: center !important;
        position: fixed !important;
        top: 0 !important;
        margin-left: 55px !important;
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
            background-color: rgba(196, 223, 223, .8);
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

    form input {
        font-size: 16px !important;
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
    <link rel="stylesheet" href="../admin/adminstyle.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
</head>

<body class="hold-transition skin-green sidebar-mini">

    <div class="top-progress">
        <div class="my-progress-bar">
            <div class="filled-progress">

            </div>
        </div>
    </div>

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
                            <div class=" flex justify-center border-[0.2px] border-[#B7D3DF] rounded items-center">
                                <div class=" flex justify-center align-center flex-col ">
                                    <h3 class=" box-title text-center text-gray-800 p-5 text-3xl">Welcome<br> <b>
                                            <?php echo $_SESSION['name']; ?>
                                        </b></h3>
                                </div>
                            </div>
                            <div class="box-body no-padding">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="edit-profile.php" class="custompositionicons">
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
                    <div class="col-md-9 bg-[#F1F9F9] border-[0.2px] p-5 border-[#B7D3DF] mb-10 rounded-lg padding-2">
                        <h2 class="mb-10 font-semibold text-5xl text-center">Edit Profile</h2>
                        <form action="update-profile.php" method="post" enctype="multipart/form-data">
                            <?php
                            //Sql to get logged in user details.
                            $sql = "SELECT * FROM users WHERE id_user='$_SESSION[id_user]'";
                            $result = $conn->query($sql);

                            //If user exists then show his details.
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                            <div class="row">
                                <div class="col-md-6 latest-job ">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded text-gray-900 "
                                            id="fname" name="fname" placeholder="First Name"
                                            onkeypress="return validateName(event);"
                                            value="<?php echo $row['firstname']; ?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded text-gray-900"
                                            id="lname" name="lname" placeholder="Last Name"
                                            onkeypress="return validateName(event);"
                                            value="<?php echo $row['lastname']; ?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input type="email"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded text-gray-900"
                                            id="email" placeholder="Email" value="<?php echo $row['email']; ?>"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea id="address" name="address"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded-xl text-gray-900"
                                            rows="5" placeholder="Address"><?php echo $row['address']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded text-gray-900"
                                            id="city" name="city" onkeypress="return validateName(event);"
                                            value="<?php echo $row['city']; ?>" placeholder="city">
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded text-gray-900"
                                            id="state" name="state" placeholder="state"
                                            onkeypress="return validateName(event);"
                                            value="<?php echo $row['state']; ?>">
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit"
                                            class="btn custompositionicons btn-success rounded-full shadow font-bold py-4 px-8 text-2xl bg-teal-600 hover:bg-teal-700 text-white hover:text-white mb-5">
                                            Update
                                            Profile<lord-icon src="https://cdn.lordicon.com/rsbokaso.json"
                                                trigger="hover" colors="primary:#ffffff" style="width:35px;height:20px">
                                            </lord-icon>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6 latest-job ">
                                    <div class="form-group">
                                        <label for="contactno">Contact Number</label>
                                        <input type="text"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded text-gray-900"
                                            id="contactno" name="contactno" placeholder="Contact Number"
                                            onkeypress="return validatePhone(event);" maxlength="10" minlength="10"
                                            value="<?php echo $row['contactno']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="qualification">Highest Qualification</label>
                                        <input type="text"
                                            class="form-control input-lg input-lg input-lg block font-medium rounded text-gray-900"
                                            id="qualification" name="qualification" placeholder="Highest Qualification"
                                            value="<?php echo $row['qualification']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="stream">Stream</label>
                                        <input type="text"
                                            class="form-control input-lg input-lg block font-medium rounded text-gray-900"
                                            id="stream" name="stream" placeholder="stream"
                                            value="<?php echo $row['stream']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Skills</label>
                                        <textarea
                                            class="form-control input-lg input-lg block mb-2 font-medium rounded-xl text-gray-900"
                                            rows="4" name="skills"
                                            onkeypress="return validateName(event);"><?php echo $row['skills']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>About Me</label>
                                        <textarea
                                            class="form-control input-lg block mb-2 font-medium rounded-xl text-gray-900"
                                            rows="4" name="aboutme"><?php echo $row['aboutme']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload/Change Resume</label>
                                        <input type="file" name="resume" class="btn btn-default">
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </form>
                        <?php if (isset($_SESSION['uploadError'])) { ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <?php echo $_SESSION['uploadError']; ?>
                            </div>
                        </div>
                        <?php } ?>
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
    <script type="text/javascript">
    function validatePhone(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39) {
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




    function validateName(event) {

        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;

        if (event.keyCode == 8 || event.keyCode == 127 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode ==
            32) {

            return true;
        } else if (key < 65 || key > 90 && key < 97 || key > 122) {
            // 65-90 97-122 is A-Z a-z alphabets on your keyboard.
            return false;
        } else return true;
    }
    </script>

    <!-- tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="../js/top-scroll.js"></script>
</body>

</html>