

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= (isset($meta_title) ? $meta_title : 'Page not found') ?></title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css"/>
</head>
<body>

<header class=" container-fluid p-0">

    <!-- *********************************************** STICKY TOP MENU ************************************************-->

    <div id="topline" class="row justify-content-center">

        <!-- ************************************************ CAROUSEL ************************************************-->

        <div class="carousel slide carousel-fade  col-12" id="carFeat" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#carFeat" data-slide-to="0"></li>
                <li data-target="#carFeat" data-slide-to="1"></li>
                <li data-target="#carFeat" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../images/banners/3.jpg">
                    <div class="carousel-caption d-none d-lg-block">
                        <h4>Graduation</h4>

                    </div>
                </div>
                <div class="carousel-item ">
                    <img class="d-block w-100" src="../images/banners/1.jpg">
                    <div class="carousel-caption d-none d-lg-block">
                        <h4>Friendship</h4>

                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../images/banners/2.jpg" alt="">
                    <div class="carousel-caption d-none d-lg-block">
                        <h4>Goals</h4>

                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carFeat"
               role="button" data-slide="prev">
                <span class="carousel-control-prev-icon "></span>
            </a>
            <a class="carousel-control-next" href="#carFeat"
               role="button" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>


    </div>
</header>

<!-- ************************************************ NAVIGATION ************************************************-->

<nav id="navigation" class="navbar bg-light navbar-light d-flex  navbar-expand-md ">
    <div class="navbar-brand d-sm-none align-self-end">WUC</div>
    <?php $uri = service('uri'); ?>
    <h4 class="text text-dark  d-md-none"><?= strtoupper($uri->getSegment(2)) ?></h4>
    <button class="navbar-toggler align-self-end" type="button"
            data-toggle="collapse" data-target="#navDropDown"
            aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-sm-between " id="navDropDown">


        <!-- for small screens, burger menu -->
        <div class="navbar-nav  d-md-none ">
            <a class="nav-item nav-link  ml-1 " href="/">MODULES</a>
            <a class="nav-item nav-link  ml-1 " href="/portal/timetable">TIMETABLE</a>
            <a class="nav-item nav-link  ml-1 " href="/portal/grades?term=<?= session()->get('student_current_level') ?>">GRADES</a>
            <a class="nav-item nav-link  ml-1 " href="/portal/personalTutor">PERSONAL TUTOR</a>
            <a class="nav-item nav-link  ml-1 " href="/portal/it">IT</a>

            <div class="myDivider"></div>
            <!-- do not delete this css class myDivider xxxx -->

            <!-- small screen burger items from the sidebar -->
            <a class="nav-item nav-link  ml-1 " href="/portal/events">Events</a>
            <a class="nav-item nav-link  ml-1 " href="/portal/announcements">Announcements</a>
            <a class="nav-item nav-link  ml-1 " href="/portal/news">News</a>
            <a class="nav-item nav-link  ml-1 " href="#">Student Handbook</a>
            <a class="nav-item nav-link  ml-1 " href="#">Download App</a>
            <div class="myDivider"></div>
            <a class="nav-item nav-link  ml-1 " href="#">Go to WILDE</a>

        </div>
        <!-- for large screens, tabs -->
        <div class="navbar-nav nav-tabs  d-none d-md-flex d-lg-flex">
<!--            <a class="nav-item nav-link active" href="/portal/index">&nbsp;&nbsp;MODULES&nbsp;&nbsp;</a>-->
<!--            <a class="nav-item nav-link" href="/portal/timetable">&nbsp;TIMETABLE&nbsp;</a>-->
<!--            <a class="nav-item nav-link" href="/portal/grades">&nbsp;&nbsp;GRADES&nbsp;&nbsp;</a>-->
<!--            <a class="nav-item nav-link" href="/portal/personalTutor">&nbsp;&nbsp;PERSONAL TUTOR&nbsp;&nbsp;</a>-->
<!--            <a class="nav-item nav-link" href="/portal/it">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IT&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp</a>-->
            <?= $this->include('navigation') ?>
        </div> <!-- ./left side of navigation -->

        <!-- ************************************************ NAVIGATION RIGHT SIDE ************************************************-->





        <!-- right side only visible on md+ screens, functionality gets moved to drop down for small screens -->

        <div class="navbar-nav nav-pills d-none d-md-flex">
            <div class="dropdown nav-pills navbar-nav mr-2">
                <a class="nav-item nav-link dropdown-toggle"
                   data-toggle="dropdown" id="accountDropdown"
                   aria-haspopup="true" aria-expanded="false"
                   href="#">Account</a>
                <?php if(session()->get('isLoggedIn')): ?>
                <div class="dropdown-menu" aria-labelledby="accountDropdown">
                    <a class="dropdown-item" href="/login/logout">Sign out</a>
                    <a class="dropdown-item" href="/login/passwordReset">Reset Password</a>
                </div>
                <?php endif; ?>
                <button type="button" id="toggleSidebar" class="btn btn-outline-success active" aria-pressed="true">
                    Sidebar
                </button>
            </div>
        </div> <!--./navigation dropdown menus-->


    </div> <!--./toggle navigation mobile-->
</nav>




<!-- ************************************************ MAIN ************************************************-->


<main class="wrapper container-fluid">

    <?= $this->renderSection('content') ?>



    <!-- ************************************************ SIDEBAR ************************************************-->

    <!--    <div id="sidebar" class="sidebarNav d-none d-lg-block card">-->
    <div id="sidebar" class="hide d-none d-md-flex">
        <div class="sidebar-inner ">
            <div  class="card-footer" >
                <a href="/portal/events"><h5>Events</h5></a>
                <a href="/portal/announcements"><h5>Announcements</h5></a>
                <a href="/portal/news"><h5>News</h5></a>
            </div>
            <div  class="card-footer" >
                <a href="#"><h5>Student Handbook</h5></a>
                <a href="#"><h5>Download App</h5></a>
            </div>
            <div class="card-footer" >
                <a href="#"><h5>WILDE</h5></a>
            </div>

            <div class="sidebar-logo">
                <a id="logo" href="#"><img class="banner img-fluid " src="../images/logo-no-bg.png"></a>
            </div>

        </div>
    </div>



</main>

<footer class="mt-4 ">
    <div id="footer" class="fixed-bottom justify-content-end d-flex align-items-center py-3">
        <a class="align-items-center text-muted d-flex float-right mr-2">COPYRIGHT @ WUC. ALL RIGHTS RESERVED</a>
    </div>

</footer>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="scripts/script.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#toggleSidebar').on('click', function () {
            $('#sidebar').toggleClass('hide');
            $('#toggleSidebar').toggleClass('active');
        });
    });
</script>
</body>
</html>
