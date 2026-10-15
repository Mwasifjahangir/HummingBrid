<!DOCTYPE html>
<!--[if IE 8]><html class="ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>Delmonte Portal - Forms</title>
        <!-- start: META -->
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        {% include 'Shared/css.php' %}
        

    </head>
    <!-- end: HEAD -->
    <body>
        
        {% include 'Shared/js.php' %}
        
        <div id="app">
            
            {% include 'Shared/leftmenu.php' %}
            <div class="app-content">
                
                {% include 'Shared/topnavbar.php' %}
                <div class="main-content" >
                    <div class="wrap-content container" id="container">
                        
                        {{maincontent|raw}}
                        
                    </div>
                </div>
                <!-- start: FOOTER -->
                <footer>
                    <div class="footer-inner">
                        <div class="pull-left">
                            &copy; <span class="current-year"></span><span class="text-bold text-uppercase">FreshDelmonte</span>. <span>All rights reserved</span>
                        </div>
                        <div class="pull-right">
                            <span class="go-top"><i class="ti-angle-up"></i></span>
                        </div>
                    </div>
                </footer>
                <!-- end: FOOTER -->


            </div>
        </div>

        <!-- start: JavaScript Event Handlers for this page -->
        <script>
          
            jQuery(document).ready(function () {
                Main.init();
                /*  var oTable = $('#sample_2').dataTable({
                 responsive: true
                 });*/
                $('.datepicker').datepicker({
                    autoclose: true,
                    todayHighlight: true
                });
            });
        </script>
        
    </body>
</html>
