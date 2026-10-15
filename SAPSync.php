<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
define("ENV", "PRODUCTION");
require_once './Config/config.php';
require_once './Backend/Libs/vendor/autoload.php';
require_once './Backend/Libs/func.php';
require_once './Backend/Libs/const.php';
require_once './Backend/Libs/DB.php';
require_once './Backend/Libs/Log.php';
require_once './Backend/Libs/Registery.php';
require_once './Backend/Model/Model.php';

require_once './Backend/Model/SAP.php';

$sap = new Bytecode\Opera\Model\SAP();
$db = ( new MongoDB\Client("mongodb://10.80.64.121:27017", [], ['typeMap' => ['root' => 'array', 'document' => 'array', 'array' => 'array']]))->selectDatabase("HB");
/* $ul = ($sap->GetSAPHREMPData());
  //print_r($ul);
  $db->dropCollection("PE_EMP_DATA");
  $db->createCollection("HR_PE_EMP_DATA");
  $db->selectCollection("HR_PE_EMP_DATA")->insertMany($ul["PE_EMP_DATA"]); */
/* $data = [
  "PE_VENGRP" => $db->selectCollection("VM_PE_VENGRP")->find()->toArray(),
  "PE_VENSUBGRP" => $db->selectCollection("VM_PE_VENSUBGRP")->find()->toArray(),
  "PE_TRDPRT" => $db->selectCollection("VM_PE_TRDPRT")->find()->toArray(),
  "PE_COUNTRY" => $db->selectCollection("VM_PE_COUNTRY")->find()->toArray(),
  "PE_COCODE" => $db->selectCollection("VM_PE_COCODE")->find()->toArray(),
  "PE_RECACCT" => $db->selectCollection("VM_PE_RECACCT")->find()->toArray(),
  "PE_PMTMETHOD" => $db->selectCollection("VM_PE_PMTMETHOD")->find()->toArray(),
  "PE_PMTTERM" => $db->selectCollection("VM_PE_PMTTERM")->find()->toArray(),
  "PE_PLGRP" => $db->selectCollection("VM_PE_PLGRP")->find()->toArray(),
  "PE_PURORG" => $db->selectCollection("VM_PE_PURORG")->find()->toArray(),
  "PE_PURGRP" => $db->selectCollection("VM_PE_PURGRP")->find()->toArray(),
  "PE_CURR" => $db->selectCollection("VM_PE_CURR")->find(),
  "PE_SCHGRP" => $db->selectCollection("VM_PE_SCHGRP")->find()->toArray(),
  "PE_INCOTERM" => $db->selectCollection("VM_PE_INCOTERM")->find()->toArray()
  ];
  $data = json_decode(json_encode($data ) , true);
  echo json_encode(TrimArray($data)); */

$db->dropCollection("VM_PE_VENGRP");
$db->dropCollection("VM_PE_VENSUBGRP");
$db->dropCollection("VM_PE_TRDPRT");
$db->dropCollection("VM_PE_COUNTRY");
$db->dropCollection("VM_PE_COCODE");
$db->dropCollection("VM_PE_RECACCT");
$db->dropCollection("VM_PE_PMTMETHOD");
$db->dropCollection("VM_PE_PMTTERM");
$db->dropCollection("VM_PE_PLGRP");
$db->dropCollection("VM_PE_PURORG");
$db->dropCollection("VM_PE_PURGRP");
$db->dropCollection("VM_PE_CURR");
$db->dropCollection("VM_PE_SCHGRP");
$db->dropCollection("VM_PE_INCOTERM");
$db->dropCollection("VM_PE_BANK");

$db->createCollection("VM_PE_VENGRP");
$db->createCollection("VM_PE_VENSUBGRP");
$db->createCollection("VM_PE_TRDPRT");
$db->createCollection("VM_PE_COUNTRY");
$db->createCollection("VM_PE_COCODE");
$db->createCollection("VM_PE_RECACCT");
$db->createCollection("VM_PE_PMTMETHOD");
$db->createCollection("VM_PE_PMTTERM");
$db->createCollection("VM_PE_PLGRP");
$db->createCollection("VM_PE_PURORG");
$db->createCollection("VM_PE_PURGRP");
$db->createCollection("VM_PE_CURR");
$db->createCollection("VM_PE_SCHGRP");
$db->createCollection("VM_PE_INCOTERM");
$db->createCollection("VM_PE_BANK");


// Customer Master Sync
$cm = ($sap->GetSAPCMData());

$db->dropCollection("CM_PE_COCODE");
$db->dropCollection("CM_PE_RECACCT");
$db->dropCollection("CM_PE_PMTTERM");
$db->dropCollection("CM_PE_SORTKEY");
$db->dropCollection("CM_PE_PLGRP");
$db->dropCollection("CM_PE_SALESORG");
$db->dropCollection("CM_PE_DISTCHc");
$db->dropCollection("CM_PE_DIV");
$db->dropCollection("CM_PE_SALESOFF");
$db->dropCollection("CM_PE_SALESGRP");
$db->dropCollection("CM_PE_CUSTGRP");
$db->dropCollection("CM_PE_CURR");
$db->dropCollection("CM_PE_PRICELIST");
$db->dropCollection("CM_PE_CUSGRP1");
$db->dropCollection("CM_PE_CUSGRP2");
$db->dropCollection("CM_PE_SHIPCOND");
$db->dropCollection("CM_PE_DELPLANT");
$db->dropCollection("CM_PE_INCOTERM1");
$db->dropCollection("CM_PE_ACCASGRP");
$db->dropCollection("CM_PE_CUSTACCGRP");
$db->dropCollection("CM_PE_TRDPRT");
$db->dropCollection("CM_PE_COUNTRY");
$db->dropCollection("CM_PE_CPDEPT");
$db->dropCollection("CM_PE_CPFUNC");
$db->dropCollection("CM_PE_SA_SOF");
$db->dropCollection("CM_PE_SG_SOF");
$db->dropCollection("CM_PE_SO_DV");
$db->dropCollection("CM_PE_SO_DC");

$db->createCollection("CM_PE_COCODE");
$db->createCollection("CM_PE_RECACCT");
$db->createCollection("CM_PE_PMTTERM");
$db->createCollection("CM_PE_SORTKEY");
$db->createCollection("CM_PE_PLGRP");
$db->createCollection("CM_PE_SALESORG");
$db->createCollection("CM_PE_DISTCHc");
$db->createCollection("CM_PE_DIV");
$db->createCollection("CM_PE_SALESOFF");
$db->createCollection("CM_PE_SALESGRP");
$db->createCollection("CM_PE_CUSTGRP");
$db->createCollection("CM_PE_CURR");
$db->createCollection("CM_PE_PRICELIST");
$db->createCollection("CM_PE_CUSGRP1");
$db->createCollection("CM_PE_CUSGRP2");
$db->createCollection("CM_PE_SHIPCOND");
$db->createCollection("CM_PE_DELPLANT");
$db->createCollection("CM_PE_INCOTERM1");
$db->createCollection("CM_PE_ACCASGRP");
$db->createCollection("CM_PE_CUSTACCGRP");
$db->createCollection("CM_PE_TRDPRT");
$db->createCollection("CM_PE_COUNTRY");
$db->createCollection("CM_PE_CPDEPT");
$db->createCollection("CM_PE_CPFUNC");
$db->createCollection("CM_PE_SA_SOF");
$db->createCollection("CM_PE_SG_SOF");
$db->createCollection("CM_PE_SO_DV");
$db->createCollection("CM_PE_SO_DC");

$db->selectCollection("CM_PE_COCODE")->insertMany($cm["PE_COCODE"]);
$db->selectCollection("CM_PE_RECACCT")->insertMany($cm["PE_RECACCT"]);
$db->selectCollection("CM_PE_PMTTERM")->insertMany($cm["PE_PMTTERM"]);
$db->selectCollection("CM_PE_SORTKEY")->insertMany($cm["PE_SORTKEY"]);
$db->selectCollection("CM_PE_PLGRP")->insertMany($cm["PE_PLGRP"]);
$db->selectCollection("CM_PE_SALESORG")->insertMany($cm["PE_SALESORG"]);
$db->selectCollection("CM_PE_DISTCH")->insertMany($cm["PE_DISTCH"]);
$db->selectCollection("CM_PE_DIV")->insertMany($cm["PE_DIV"]);
$db->selectCollection("CM_PE_DIV")->insertMany($cm["PE_DIV"]);
$db->selectCollection("CM_PE_SALESOFF")->insertMany($cm["PE_SALESOFF"]);
$db->selectCollection("CM_PE_SALESGRP")->insertMany($cm["PE_SALESGRP"]);
$db->selectCollection("CM_PE_CUSTGRP")->insertMany($cm["PE_CUSTGRP"]);
$db->selectCollection("CM_PE_CURR")->insertMany($cm["PE_CURR"]);
$db->selectCollection("CM_PE_PRICELIST")->insertMany($cm["PE_PRICELIST"]);
$db->selectCollection("CM_PE_CUSGRP1")->insertMany($cm["PE_CUSGRP1"]);
$db->selectCollection("CM_PE_CUSGRP2")->insertMany($cm["PE_CUSGRP2"]);
$db->selectCollection("CM_PE_SHIPCOND")->insertMany($cm["PE_SHIPCOND"]);
$db->selectCollection("CM_PE_DELPLANT")->insertMany($cm["PE_DELPLANT"]);
$db->selectCollection("CM_PE_INCOTERM1")->insertMany($cm["PE_INCOTERM1"]);
$db->selectCollection("CM_PE_ACCASGRP")->insertMany($cm["PE_ACCASGRP"]);
$db->selectCollection("CM_PE_CUSTACCGRP")->insertMany($cm["PE_CUSTACCGRP"]);
$db->selectCollection("CM_PE_TRDPRT")->insertMany($cm["PE_TRDPRT"]);
$db->selectCollection("CM_PE_COUNTRY")->insertMany($cm["PE_COUNTRY"]);
$db->selectCollection("CM_PE_CPDEPT")->insertMany($cm["PE_CPDEPT"]);
$db->selectCollection("CM_PE_CPFUNC")->insertMany($cm["PE_CPFUNC"]);
$db->selectCollection("CM_PE_SA_SOF")->insertMany($cm["PE_SA_SOF"]);
$db->selectCollection("CM_PE_SG_SOF")->insertMany($cm["PE_SG_SOF"]);
$db->selectCollection("CM_PE_SO_DV")->insertMany($cm["PE_SO_DV"]);
$db->selectCollection("CM_PE_SO_DC")->insertMany($cm["PE_SO_DC"]);


// Material Master Sync
$mm = ($sap->GetMMData());

$db->dropCollection("MM_PE_MATTYPE");
$db->dropCollection("MM_PE_UOM");
$db->dropCollection("MM_PE_DIV");
$db->dropCollection("MM_PE_MATGRP");
$db->dropCollection("MM_PE_PRODH");
$db->dropCollection("MM_PE_EXTMATGRP");
$db->dropCollection("MM_PE_MEDIUM");
$db->dropCollection("MM_PE_SALESORG");
$db->dropCollection("MM_PE_DISTCH");
$db->dropCollection("MM_PE_MATGRP1");
$db->dropCollection("MM_PE_MATGRP2");
$db->dropCollection("MM_PE_MATGRP3");
$db->dropCollection("MM_PE_MATGRP4");
$db->dropCollection("MM_PE_MATGRP5");
$db->dropCollection("MM_PE_SALEREB");
$db->dropCollection("MM_PE_PLANT");
$db->dropCollection("MM_PE_STORLOC");
$db->dropCollection("MM_PE_COUNTRY");
$db->dropCollection("MM_PE_MRPTYPE");
$db->dropCollection("MM_PE_MRPCONT");
$db->dropCollection("MM_PE_MRPGRP");
$db->dropCollection("MM_PE_PURGRP");
$db->dropCollection("MM_PE_PRODSCH");
$db->dropCollection("MM_PE_PRODSCHPR");
$db->dropCollection("MM_PE_VALCLASS");
$db->dropCollection("MM_PE_PRCTR");
$db->dropCollection("MM_PE_ORIGGRP");

$db->createCollection("MM_PE_MATTYPE");
$db->createCollection("MM_PE_UOM");
$db->createCollection("MM_PE_DIV");
$db->createCollection("MM_PE_MATGRP");
$db->createCollection("MM_PE_PRODH");
$db->createCollection("MM_PE_EXTMATGRP");
$db->createCollection("MM_PE_MEDIUM");
$db->createCollection("MM_PE_SALESORG");
$db->createCollection("MM_PE_DISTCH");
$db->createCollection("MM_PE_MATGRP1");
$db->createCollection("MM_PE_MATGRP2");
$db->createCollection("MM_PE_MATGRP3");
$db->createCollection("MM_PE_MATGRP4");
$db->createCollection("MM_PE_MATGRP5");
$db->createCollection("MM_PE_SALEREB");
$db->createCollection("MM_PE_PLANT");
$db->createCollection("MM_PE_STORLOC");
$db->createCollection("MM_PE_COUNTRY");
$db->createCollection("MM_PE_MRPTYPE");
$db->createCollection("MM_PE_MRPCONT");
$db->createCollection("MM_PE_MRPGRP");
$db->createCollection("MM_PE_PURGRP");
$db->createCollection("MM_PE_PRODSCH");
$db->createCollection("MM_PE_PRODSCHPR");
$db->createCollection("MM_PE_VALCLASS");
$db->createCollection("MM_PE_PRCTR");
$db->createCollection("MM_PE_ORIGGRP");

$db->selectCollection("MM_PE_MATTYPE")->insertMany($mm["PE_MATTYPE"]);
$db->selectCollection("MM_PE_UOM")->insertMany($mm["PE_UOM"]);
$db->selectCollection("MM_PE_DIV")->insertMany($mm["PE_DIV"]);
$db->selectCollection("MM_PE_MATGRP")->insertMany($mm["PE_MATGRP"]);
$db->selectCollection("MM_PE_PRODH")->insertMany($mm["PE_PRODH"]);
$db->selectCollection("MM_PE_EXTMATGRP")->insertMany($mm["PE_EXTMATGRP"]);
$db->selectCollection("MM_PE_MEDIUM")->insertMany($mm["PE_MEDIUM"]);
$db->selectCollection("MM_PE_SALESORG")->insertMany($mm["PE_SALESORG"]);
$db->selectCollection("MM_PE_DISTCH")->insertMany($mm["PE_DISTCH"]);
$db->selectCollection("MM_PE_MATGRP1")->insertMany($mm["PE_MATGRP1"]);
$db->selectCollection("MM_PE_MATGRP2")->insertMany($mm["PE_MATGRP2"]);
$db->selectCollection("MM_PE_MATGRP3")->insertMany($mm["PE_MATGRP3"]);
$db->selectCollection("MM_PE_MATGRP4")->insertMany($mm["PE_MATGRP4"]);
$db->selectCollection("MM_PE_MATGRP5")->insertMany($mm["PE_MATGRP5"]);
$db->selectCollection("MM_PE_SALEREB")->insertMany($mm["PE_SALEREB"]);
$db->selectCollection("MM_PE_PLANT")->insertMany($mm["PE_PLANT"]);
$db->selectCollection("MM_PE_STORLOC")->insertMany($mm["PE_STORLOC"]);
$db->selectCollection("MM_PE_COUNTRY")->insertMany($mm["PE_COUNTRY"]);
$db->selectCollection("MM_PE_MRPTYPE")->insertMany($mm["PE_MRPTYPE"]);
$db->selectCollection("MM_PE_MRPCONT")->insertMany($mm["PE_MRPCONT"]);
$db->selectCollection("MM_PE_MRPGRP")->insertMany($mm["PE_MRPGRP"]);
$db->selectCollection("MM_PE_PURGRP")->insertMany($mm["PE_PURGRP"]);
$db->selectCollection("MM_PE_PRODSCH")->insertMany($mm["PE_PRODSCH"]);
$db->selectCollection("MM_PE_PRODSCHPR")->insertMany($mm["PE_PRODSCHPR"]);
$db->selectCollection("MM_PE_VALCLASS")->insertMany($mm["PE_VALCLASS"]);
$db->selectCollection("MM_PE_PRCTR")->insertMany($mm["PE_PRCTR"]);
$db->selectCollection("MM_PE_ORIGGRP")->insertMany($mm["PE_ORIGGRP"]);

// Vendor Master Sync
$vm = ($sap->GetSAPVMData());
$db->selectCollection("VM_PE_VENGRP")->insertMany($vm["PE_VENGRP"]);
$db->selectCollection("VM_PE_VENSUBGRP")->insertMany($vm["PE_VENSUBGRP"]);
$db->selectCollection("VM_PE_TRDPRT")->insertMany($vm["PE_TRDPRT"]);
$db->selectCollection("VM_PE_COUNTRY")->insertMany($vm["PE_COUNTRY"]);
$db->selectCollection("VM_PE_COCODE")->insertMany($vm["PE_COCODE"]);
$db->selectCollection("VM_PE_RECACCT")->insertMany($vm["PE_RECACCT"]);
$db->selectCollection("VM_PE_PMTMETHOD")->insertMany($vm["PE_PMTMETHOD"]);
$db->selectCollection("VM_PE_PMTTERM")->insertMany($vm["PE_PMTTERM"]);
$db->selectCollection("VM_PE_PLGRP")->insertMany($vm["PE_PLGRP"]);
$db->selectCollection("VM_PE_PURORG")->insertMany($vm["PE_PURORG"]);
$db->selectCollection("VM_PE_PURGRP")->insertMany($vm["PE_PURGRP"]);
$db->selectCollection("VM_PE_CURR")->insertMany($vm["PE_CURR"]);
$db->selectCollection("VM_PE_SCHGRP")->insertMany($vm["PE_SCHGRP"]);
$db->selectCollection("VM_PE_INCOTERM")->insertMany($vm["PE_INCOTERM"]);
$db->selectCollection("VM_PE_BANK")->insertMany($vm["PE_BANK"]);


/// Test
$vm = ($sap->GetSAPVMData());
print_r($vm);
