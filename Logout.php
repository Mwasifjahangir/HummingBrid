<?php

session_name("OperaX");
session_start();

session_destroy();

header("Location:https://login.windows.net/freshdelmonte.onmicrosoft.com/oauth2/logout?post_logout_redirect_uri=https://freshdelmonte.co/index.php");
exit();
