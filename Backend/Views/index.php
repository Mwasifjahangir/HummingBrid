<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <!-- TO Monirot-->
        <script>
            window.paceOptions = {
                ajax: {
                    trackMethods: ['GET', 'POST', 'PUT', 'DELETE', 'REMOVE'],
                    restartOnRequestAfter: true
                }
            };
            var $buoop = {vs: {i: 11, f: -2, o: -2, s: 9, c: -2}, unsecure: true, c: 4};
            function $buo_f() {
                var e = document.createElement("script");
                e.src = "//browser-update.org/update.min.js";
                document.body.appendChild(e);
            }
            ;
            try {
                document.addEventListener("DOMContentLoaded", $buo_f, false)
            } catch (e) {
                window.attachEvent("onload", $buo_f)
            }
        </script>
        <script type="text/javascript" src="/Frontend/Assets/js/pace.js"></script>
        <link href="/Frontend/Assets/css/pace.css" rel="stylesheet" type="text/css" />
        <meta charset="utf-8" />
        <title>DMPortal</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <link href="/Frontend/Assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="/Frontend/Assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="/Frontend/Assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="/Frontend/Assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/layouts/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="/Frontend/Assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/css/selectize.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />

        <!-- END THEME LAYOUT STYLES -->
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
        <link href="/Frontend/Assets/css/Override.css" rel="stylesheet" type="text/css" />
        <link href="/Frontend/Assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <!--Kendo-->
        <link href="/Frontend/Assets/kendoui/styles/kendo.common.min.css" rel="stylesheet">

        <link href="/Frontend/Assets/kendoui/styles/kendo.default.min.css" rel="stylesheet">
        <link href="/Frontend/Assets/kendoui/styles/kendo.dataviz.min.css" rel="stylesheet">
        <link href="/Frontend/Assets/kendoui/styles/kendo.dataviz.default.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://spoprod-a.akamaihd.net/files/fabric/office-ui-fabric-core/4.1.0/css/fabric.min.css">
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="favicon.ico" />

    </head>
    {% include 'Shared/js.php' %}
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-closed">

        {% include 'Shared/header.php' %}
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            {% include 'Shared/sidebar.php' %}
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    {{maincontent|raw}}
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            {% include 'Shared/quicksidebar.php' %}
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner">
                2016 &copy; Fresh Delmonte.
                <a href="http://delmontearabia.com" title="Delmonte Arabia" target="_blank">- Delmonte Arabia</a>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="/Frontend/Assets/js/bootbox.min.js"></script>
        <script type="text/javascript">
            SetupPDF();
            toastr.options = {

                "hideDuration": "1000",
                "timeOut": "10000",
                "extendedTimeOut": "1000",

            }
            toastr.info('You are currently logged into {{MODE}} Server')
        </script>
    </body>

</html>