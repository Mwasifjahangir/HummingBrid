<?php
ob_start();
error_reporting (E_ALL);
chdir('C:\Sites\HB\wwwroot');
require_once 'boot.php';
ob_flush();
$mail = new \Bytecode\Opera\Libs\Mail();
$sent = $mail->ProcessSpool();
echo 'Sent ' . $sent . ' Messages';


?>