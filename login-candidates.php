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
    <title>Careerin - Candidate Login</title>
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
    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/blue.css">

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

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="flex items-center justify-center">
            <a href="index.php">
                <img src="logo.png" alt="" class="h-24 mb-5   ">
            </a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body bg-[#D2E9E9] border-[2px] border-[#B7D3DF] shadow-md rounded-xl">
            <p class="login-box-msg mb-10 text-gray-700 text-center font-bold text-5xl">Candidates Login</p>

            <form method="post" action="checklogin.php">
                <div class="relative z-0 mt-5 py-4 w-full mb-5 group">
                    <input type="email" id="email" name="email"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_email"
                        class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                        address</label>
                </div>
                <!-- <div class="form-group has-feedback">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div> -->


                <!-- Password field -->
                <div class="relative z-0 w-full mt-5 py-4 mb-5 group">
                    <input type="password" id="password" name="password"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " required />
                    <label for="floating_password"
                        class="peer-focus:font-medium absolute text-xl text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                </div>
                <!-- <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div> -->
                <div class="row mt-10">

                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit"
                            class="btn btn-primary btn-block rounded-full shadow font-bold py-4 px-8 bg-teal-600 hover:bg-teal-700  text-white hover:text-white">Sign
                            In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <br>

            <?php
            //If User have successfully registered then show them this success message
            //: Remove Success Message without reload?
            if (isset($_SESSION['registerCompleted'])) {
                ?>
            <div>
                <p id="successMessage" class="text-center">Check your email!</p>
            </div>
            <?php
                unset($_SESSION['registerCompleted']);
            }
            ?>
            <?php
            //If User Failed To log in then show error message.
            if (isset($_SESSION['loginError'])) {
                ?>
            <div>
                <script>
                alert("Invalid Email/Password! Try Again!");
                </script>
            </div>
            <?php
                unset($_SESSION['loginError']);
            }
            ?>

            <?php
            //If User Failed To log in then show error message.
            if (isset($_SESSION['userActivated'])) {
                ?>
            <div>
                <p class="text-center text-green-600">Your Account Is Active. You Can Login</p>
            </div>
            <?php
                unset($_SESSION['userActivated']);
            }
            ?>

            <?php
            //If User Failed To log in then show error message.
            if (isset($_SESSION['loginActiveError'])) {
                ?>
            <div>
                <p class="text-center">
                    <?php echo $_SESSION['loginActiveError']; ?>
                </p>
            </div>
            <?php
                unset($_SESSION['loginActiveError']);
            }
            ?>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- iCheck -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
    </script>
    <script type="text/javascript">
    $(function() {
        $("#successMessage:visible").fadeOut(8000);
    });
    </script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</body>

</html>