<?php
chdir('C:\Sites\HBQuality');
require_once 'boot.php';
// $mdb = ( new MongoDB\Client("mongodb://10.80.64.121:27017", [], ['typeMap' => ['root' => 'array', 'document' => 'array', 'array' => 'array']]))->selectDatabase("HB");


// SAP SYNC 
// $sap = new \Bytecode\Opera\Model\SAP();
// $vm = ($sap->GetSAPVMData());
// $mdb->dropCollection("VM_PE_BANK");
// $mdb->createCollection("VM_PE_BANK");
// $mdb->selectCollection("VM_PE_BANK")->insertMany($vm["PE_BANK"]);



// $ul = ($sap->GetSAPHREMPData());
// $mdb->dropCollection("HR_PE_EMP_DATA");
// $mdb->createCollection("HR_PE_EMP_DATA");
// $mdb->selectCollection("HR_PE_EMP_DATA")->insertMany($ul["PE_EMP_DATA"]);

// mailer

// $mail = new \Bytecode\Opera\Libs\Mail();
// $sent = $mail->ProcessSpool();
// echo 'Sent ' . $sent . ' Messages';
