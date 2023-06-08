<?php

session_start();
include('auth/database.php');

$email = $_SESSION['email'];

if (!isset($email) || !isset($_SESSION['captain'])) {
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="ar" dir="RTL">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant - dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/d455f30832.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>

<body>
    <div class="wrapper">

        <!-- Sidebar -->

        <?php include("captain_navigation.php"); ?>

        <!-- Content -->

        <div class="content-wrapper text-right">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <a href="#" id="toggle"><i class="fas fa-bars ml-3"></i></a>
                        </nav>
                        <div class="below-toggle-content">
                            <div class="col-md-12">
                                <div class="top-part mb-3">
                                    <h2 class="d-inline">داشبۆڕد</h2>
                                    <p class="d-inline ml-2">کۆنتڕۆڵ پانێڵ</p>

                                    <a href="captain_dashboard.php" class="d-inline text-dark mt-2" style="text-decoration: none; float: left; font-weight: 500;"> داشبۆڕد <i class="fas fa-tachometer-alt"></i></a>

                                </div>
                                <div class="row justify-content-center align-items-center align-content-center">
                                    <div class="col-12 col-md-5 mx-auto total-notifications shadow-md">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h1 class="text-white"><?php $query = "select * from notification";
                                                                        $result = mysqli_query($connect, $query);
                                                                        $count = mysqli_num_rows($result);
                                                                        echo $count;
                                                                        ?></h1>
                                                <h5 class="text-white">تەواوی ئاگادارکردنەوەکان</h5>
                                            </div>
                                            <div class="col-md-4 text-right">

                                                <div class="d-flex position-relative">
                                                    <i class="fa-solid fa-bell"></i>
                                                    <span class="icon-button__badge" style="top:20px;right:10px;"><?php $query = "select * from notification";
                                                                                                                    $result = mysqli_query($connect, $query);
                                                                                                                    $count = mysqli_num_rows($result);
                                                                                                                    echo $count;
                                                                                                                    ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-primary btn-sm w-100 mt-4 mx-auto text-center"> بینینی ئاگادارکردنەوەکان <i class="mx-4 fa-solid fa-lock"></i></a>
                                    </div>
                                    <div class="col-12 col-md-5 mx-auto total-products shadow-md  mt-5 mt-md-0">
                                        <div class="row ">
                                            <div class="col-md-8">
                                                <h1 class="text-white"><?php $query = "select * from add_product";
                                                                        $result = mysqli_query($connect, $query);
                                                                        $count = mysqli_num_rows($result);
                                                                        echo $count;
                                                                        ?></h1>
                                                <h5 class="text-white">تەواوی بەرهەمەکان</h5>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-danger btn-sm w-100 mt-4 mx-auto text-center"> بینینی بەرهەمەکان <i class="mx-4 fa-solid fa-lock"></i></a>
                                    </div>
                                    <div class="col-12 col-md-5 mx-auto total-orders shadow-md mt-5">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h1 class="text-white"><?php $query = "select * from bill_id";
                                                                        $result = mysqli_query($connect, $query);
                                                                        $count = mysqli_num_rows($result);
                                                                        echo $count;
                                                                        ?></h1>
                                                <h5 class="text-white">تەواوی داواکارییەکان</h5>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-success btn-sm w-100 mt-4 mx-auto text-center text-white"> بینینی داواکارییە دراوەکان <i class="mx-4 fa-solid fa-lock"></i></a>
                                    </div>
                                    <div class="col-12 col-md-5 mx-auto total-users shadow-md mt-5">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h1 class="text-white"><?php $query = "select * from add_user";
                                                                        $result = mysqli_query($connect, $query);
                                                                        $count = mysqli_num_rows($result);
                                                                        echo $count;
                                                                        ?></h1>
                                                <h5 class="text-white">تەواوی بەکارهێنەران</h5>
                                            </div>
                                            <div class="col-md-4 text-right">
                                                <i class="fa fa-users"></i>
                                            </div>
                                        </div>
                                        <a href="#" class="btn btn-warning btn-sm w-100 mt-4 mx-auto text-center text-white">بینینی بەکارهێنەران <i class="mx-4 fa-solid fa-lock"></i></a>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $('#toggle').click(function(e) {
            e.preventDefault();
            $('.wrapper').toggleClass('menuDisplayed');
        });
    </script>

</body>

</html>