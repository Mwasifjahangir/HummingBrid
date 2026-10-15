<?php

define("ENV", "QUALITY");
ob_start("ob_gzhandler");
require_once 'Config/config.php';

date_default_timezone_set("Asia/Riyadh");
session_name(CONFIG['BASE']['SESSION_NAME']);
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once './Backend/Libs/vendor/autoload.php';
// require_once './Backend/Libs/swiftmailer/lib/swift_required.php';
require_once './Backend/Libs/func.php';
require_once './Backend/Libs/OperaException.php';
require_once './Backend/Libs/const.php';
require_once './Backend/Libs/DB.php';
require_once './Backend/Libs/Log.php';
require_once './Backend/Libs/Registery.php';
require_once './Backend/Libs/Messaging.php';
require_once './Backend/Libs/Mail.php';

require_once './Backend/Libs/HTTPKernel.php';
// require_once './Backend/Libs/MDB.php';
require_once './Backend/Libs/WorkFlow.php';
require_once './Backend/Controller/Controller.php';
require_once './Backend/Model/Model.php';

require_once './Backend/Model/MailGroup.php';
require_once './Backend/Model/Form.php';
require_once './Backend/Model/FormMeta.php';
require_once './Backend/Model/SAP.php';
require_once './Backend/Model/SAPReturn.php';

require_once './Backend/Controller/MainController.php';

require_once './Backend/Controller/Forms/QA/IncidentReport.php';
require_once './Backend/Controller/Forms/Administration/ExpenseReport.php';
require_once './Backend/Controller/Forms/Administration/PaymentRequest.php';
require_once './Backend/Controller/Forms/Administration/PurchaseRequisition.php';
require_once './Backend/Controller/Forms/Administration/AssetTransfer.php';
require_once './Backend/Controller/Forms/Finance/CreditNoteRequestController.php';
require_once './Backend/Controller/Forms/HR/PassportWithdrawal.php';
require_once './Backend/Controller/FileController.php';
require_once './Backend/Controller/UserController.php';
require_once './Backend/Controller/Forms/WorkFlowController.php';
require_once './Backend/Controller/Forms/Finance/CreditNoteRequestController.php';
require_once './Backend/Controller/Forms/SAP/MM.php';
require_once './Backend/Controller/Forms/SAP/VM.php';
require_once './Backend/Controller/Forms/SAP/CM.php';
require_once './Backend/Controller/Forms/Dashboard.php';
require_once './Backend/Controller/Azure.php';

require_once './Backend/Model/Azure.php';
require_once './Backend/Model/File.php';
require_once './Backend/Model/WorkFlow.php';
require_once './Backend/Model/User.php';
require_once './Backend/Model/Forms/Administration/PaymentRequest.php';
require_once './Backend/Model/Forms/Administration/PurchaseRequisition.php';
require_once './Backend/Model/Forms/Administration/ExpenseReport.php';
require_once './Backend/Model/Forms/Administration/ExpenseReport.php';
require_once './Backend/Model/Forms/Administration/AssetTransfer.php';
require_once './Backend/Model/Forms/Finance/CreditNoteRequest.php';

require_once './Backend/Model/Forms/QA/IncidentReport.php';

require_once './Backend/Model/Forms/Dashboard.php';

require_once './Backend/Model/Forms/SAP/MM.php';
require_once './Backend/Model/Forms/SAP/VM.php';
require_once './Backend/Model/Forms/SAP/CM.php';
require_once './Backend/Model/Forms/HR/PassportWithdrawal.php';
//set_error_handler("ErrorHandler");
try {
    $loader = new \Twig\Loader\FilesystemLoader('Backend/Views');
    $twig = new \Twig\Environment($loader, [
        'cache' => __DIR__ . '/Backend/Views/cache',
        'debug' => false     //false for production. mark true to refresh the templates only.
    ]);
    $db = new \Bytecode\Opera\Libs\DB();
    $msg = new \Bytecode\Opera\Libs\Messaging();
    $hk = new \Bytecode\Opera\Libs\HTTPKernel();
    $mail = new Bytecode\Opera\Libs\Mail();
    $logger = new \Bytecode\Opera\Libs\Log();
    $db->connect();
    $reg = \opera\bytecode\Registry::getInstance();
    $reg->db = $db;
    $reg->msg = $msg;
    $reg->http = $hk;
    $reg->html = $twig;
    $reg->mail = $mail;
    $reg->logger = $logger;
} catch (Exception $e) {
    throw $e;
    /* $ex = new Bytecode\Opera\Libs\OperaException();
      $ex->RegisterException($e);
      $ex->ShowException(); */
}