<?php
require './Config/config.php';

session_name(CONFIG['BASE']['SESSION_NAME']);
require './Backend/Libs/OperaException.php';
require './Backend/Libs/func.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if (isset($_SESSION['ERROR']) == false) {
        header("Location:index.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>500 - Server Error</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #5 for 500 page option 2" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/Frontend/Assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/Frontend/Assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="/Frontend/Assets/pages/css/error.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <style type="text/css">
        video#bgvid { 
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -100;
            -ms-transform: translateX(-50%) translateY(-50%);
            -moz-transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            transform: translateX(-50%) translateY(-50%);
            background: url(polina.jpg) no-repeat;
            background-size: cover; 
        }
    </style>



    <!-- END HEAD -->

    <body class=" page-500-full-page">
        <div class="row">
            <div class="col-md-12 page-500">
                <div class=" number font-red"> 500 </div>
                <div class=" details">
                    <h3>Oops! Something went wrong.</h3>
                    <p> We are fixing it! Please come back in a while.
                        <br/> </p>
                    <p>
                        Details:<br>
                        <?php
                        echo 'Code: ' . $_SESSION['ERROR']->getCode() . '<br/>';
                        echo $_SESSION['ERROR']->getMessage() . '<br/>';
                        echo 'File: ' . $_SESSION['ERROR']->getFile() . '<br/>';
                        echo 'Line: ' . $_SESSION['ERROR']->getLine() . '<br/>';
                        ?>
                    </p>
                    <p>
                        <a href="/" class="btn red btn-outline"> Return home </a>
                        <br> </p>
                </div>
            </div>
        </div>
        <video playsinline autoplay muted loop poster="polina.jpg" id="bgvid">
<!--            <source src="polina.webm" type="video/webm">-->
            <source src="/Frontend/Assets/videos/loop1.mp4" type="video/mp4">
        </video>
        <!--[if lt IE 9]>
<script src="/Frontend/Assets/global/plugins/respond.min.js"></script>
<script src="/Frontend/Assets/global/plugins/excanvas.min.js"></script> 
<script src="/Frontend/Assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="/Frontend/Assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="/Frontend/Assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/Frontend/Assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="/Frontend/Assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="/Frontend/Assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="/Frontend/Assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="/Frontend/Assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
<?php
unset($_SESSION['ERROR']);
?>