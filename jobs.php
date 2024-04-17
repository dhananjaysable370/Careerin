<?php

//To Handle Session Variables on This Page
session_start();


//Including Database Connection From db.php file to avoid rewriting in all files
require_once ("db.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Careerin - Jobs</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!--Tailwind CSS-->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Custom -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="/css/stl.css">
    <!-- <link rel="stylesheet" href="css/mystyle.css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
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
        text-decoration: none !important;
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
            <div class="filled-progress">

            </div>
        </div>
    </div>

    <header class="main-header flex align-center justify-between mt-5 ml-2  shadow" style="margin-top:10px;">

        <!-- Logo -->
        <div>
            <a href="index.php">
                <img src="logo.png" alt="" class="h-20 mt-3   " style="height:50px;">
            </a>
        </div>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu flex justify-between  align-center">
                <ul class=" flex justify-between align-center mt-1">
                    <?php if (empty($_SESSION['id_user']) && empty($_SESSION['id_company'])) { ?>
                    <div class="mr-5">
                        <li class="ml-9 mt-2">
                            <a href="login.php"
                                class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] px-8 py-4  rounded-full mt-20 hover:text-gray-800 shadow font-bold custom-border">Login</a>
                        </li>
                    </div>
                    <div>
                        <li class="rounded-full mt-2">
                            <a href="sign-up.php"
                                class="rounded-full shadow font-bold py-4 px-7 bg-teal-600 hover:bg-teal-700 text-white hover:text-white">Register</a>
                        </li>
                    </div>
                    <?php } else {

                        if (isset($_SESSION['id_user'])) {
                            ?>
                    <li class="">
                        <a href="user/index.php"
                            class="bg-[hsla(0,0%,100%,.05)] text-[hsla(0, 0%, 100%, .4)] mr-5 px-6 py-4  rounded-full text-2xl  shadow font-bold custom-border hover:text-gray-600">Dashboard</a>
                    </li>
                    <?php
                        } else if (isset($_SESSION['id_company'])) {
                            ?>
                    <li>
                        <a href="company/index.php">Dashboard</a>
                    </li>
                    <?php } ?>
                    <li>
                        <a href="logout.php"
                            class="rounded-full shadow font-bold py-4 px-6 bg-teal-600 hover:bg-teal-700 text-white hover:text-white  hover:cursor-pointer">Logout</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class=" mt-10" style="margin-left: 0px;">

        <section class="content-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 latest-job mt-28 margin-bottom-20">
                        <h1 class="text-center text-lg  text-gray-600">
                            Latest Jobs</h1>
                        <div class="relative mt-10 flex align-center justify-center">

                            <input type="text" id="searchBar"
                                class=" w-[50%] mt-10 border-0 h-12 shadow px-8 py-10 text-2xl rounded-full bg-[#F1F4F6] dark:text-gray-800 focus:border-0 focus:shadow "
                                placeholder="Search job...">

                            <button id="searchBtn" type="button" class="">
                                <svg class="text-slate-600  w-8 absolute top-5 right-[27%] mt-10 h-10 fill-current"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                                    style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
                                    <path
                                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="candidates" class="content-header shadow ">
            <div class="container ">
                <div class="row flex items-center justify-center">

                    <div class="col-md-9 flex justify-center flex-col">

                        <?php

                        $limit = 4;

                        $sql = "SELECT COUNT(id_jobpost) AS id FROM job_post";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $total_records = $row['id'];
                            $total_pages = ceil($total_records / $limit);
                        } else {
                            $total_pages = 1;
                        }

                        ?>


                        <div id="target-content">

                        </div>
                        <div class="text-center">
                            <ul class="pagination text-center" id="pagination"></ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>



    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer bg-[hsla(0,0%,100%,.1)]" style="margin-left: 0px;">
        <div class="text-center">
            <strong>Copyright &copy; 2024-2025 <a href="jonsnow.netai.net">careerin</a>.</strong> All rights
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
    <script src="js/adminlte.min.js"></script>
    <script src="js/jquery.twbsPagination.min.js"></script>

    <script>
    function Pagination() {
        $("#pagination").twbsPagination({
            totalPages: <?php echo $total_pages; ?>,
            visible: 5,
            onPageClick: function(e, page) {
                e.preventDefault();
                $("#target-content").html("loading....");
                $("#target-content").load("jobpagination.php?page=" + page);
            }
        });
    }
    </script>

    <script>
    $(function() {
        Pagination();
    });
    </script>

    <script>
    $("#searchBtn").on("click", function(e) {
        e.preventDefault();
        var searchResult = $("#searchBar").val();
        var filter = "searchBar";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <script>
    $(".experienceSearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "experience";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <script>
    $(".citySearch").on("click", function(e) {
        e.preventDefault();
        var searchResult = $(this).data("target");
        var filter = "city";
        if (searchResult != "") {
            $("#pagination").twbsPagination('destroy');
            Search(searchResult, filter);
        } else {
            $("#pagination").twbsPagination('destroy');
            Pagination();
        }
    });
    </script>

    <script>
    function Search(val, filter) {
        $("#pagination").twbsPagination({
            totalPages: <?php echo $total_pages; ?>,
            visible: 5,
            onPageClick: function(e, page) {
                e.preventDefault();
                val = encodeURIComponent(val);
                $("#target-content").html("loading....");
                $("#target-content").load("search.php?page=" + page + "&search=" + val + "&filter=" +
                    filter);
            }
        });
    }
    </script>

    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="js/preloader.js"></script>
    <script src="js/top-scroll.js"></script>


</body>

</html>