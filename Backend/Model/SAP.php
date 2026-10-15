<?php

/**
 * Created by PhpStorm.
 * User: Akamil
 * Date: 8/5/2016
 * Time: 9:18 PM
 */

namespace Bytecode\Opera\Model;

use SAPNWRFC\Connection as SapConnection;
use SAPNWRFC\Exception as SapException;

class SAP extends Model {

    private $sapconfig = [
        'ashost' => CONFIG['SAP']['HOST'],
        'sysnr' => CONFIG['SAP']['SYSNR'],
        'client' => CONFIG['SAP']['CLIENT'],
        'user' => CONFIG['SAP']['USER'],
        'passwd' => CONFIG['SAP']['PASSWORD'],
        'trace' => SapConnection::TRACE_LEVEL_OFF,
    ];
    private $MMPlant = array(
        'PLANT' => array('type' => 'string'),
        'PUR_GROUP' => array('type' => 'string'),
        'MRP_TYPE' => array('type' => 'string'),
        'MRP_CTRLER' => array('type' => 'string'),
        'PLND_DELRY' => array('type' => 'decimal'),
        'GR_PR_TIME' => array('type' => 'decimal'),
        'ASSY_SCRAP' => array('type' => 'decimal'),
        'LOTSIZEKEY' => array('type' => 'string'),
        'PROC_TYPE' => array('type' => 'string'),
        'SPPROCTYPE' => array('type' => 'string'),
        'REORDER_PT' => array('type' => 'decimal'),
        'SAFETY_STK' => array('type' => 'decimal'),
        'MINLOTSIZE' => array('type' => 'decimal'),
        'MAXLOTSIZE' => array('type' => 'decimal'),
        'FIXED_LOT' => array('type' => 'decimal'),
        'AVAILCHECK' => array('type' => 'string'),
        'PROFIT_CTR' => array('type' => 'string'),
        'COUNTRYORI' => array('type' => 'string'),
        'PLANT_BATCH_MGMT' => array('type' => 'string'),
        'AUTO_P_ORD' => array('type' => 'string'),
        'VARIANCE_KEY' => array('type' => 'string'),
        'MRP_GROUP' => array('type' => 'string'),
        'MIXED_MRP' => array('type' => 'string'),
        'ALT_BOM_ID' => array('type' => 'string'),
        'ISS_ST_LOC' => array('type' => 'string'),
        'SLOC_EXPRC' => array('type' => 'string'),
        'BACKFLUSH' => array('type' => 'string'),
        'SM_KEY' => array('type' => 'string'),
        'PPC_PL_CAL' => array('type' => 'string'),
        'REPLENTIME' => array('type' => 'decimal'),
        'NO_COSTING' => array('type' => 'string'),
        'LOADINGGRP' => array('type' => 'string'),
        'DEP_REQ_ID' => array('type' => 'string'),
        'PRODUCTION_SCHEDULER' => array('type' => 'string'),
        'PRODPROF' => array('type' => 'string')
    );
    private $MMSales = array(
        'SALES_ORG' => array('type' => 'string'),
        'DISTR_CHAN' => array('type' => 'string'),
        'MATL_STATS' => array('type' => 'string'),
        'REBATE_GRP' => array('type' => 'string'),
        'SALES_UNIT' => array('type' => 'string'),
        'ITEM_CAT' => array('type' => 'string'),
        'ACCT_ASSGT' => array('type' => 'string'),
        'MATL_GRP_1' => array('type' => 'string'),
        'MATL_GRP_2' => array('type' => 'string'),
        'MATL_GRP_3' => array('type' => 'string'),
        'MATL_GRP_4' => array('type' => 'string'),
        'MATL_GRP_5' => array('type' => 'string'),
            /* 'HSCODE' => array('type' => 'string'), *
              /* 'GROSSWEIGHT' => array('type' => 'decimal'), */
            /* 'PRODUCTH1' => array('type' => 'string'),
              'PRODUCTH2' => array('type' => 'string'),
              'PRODUCTH3' => array('type' => 'string'),
              'PRODUCTH4' => array('type' => 'string') */
    );
    private $MMStorLoca = array(
        'PLANT' => array('type' => 'string'),
        'STGE_LOC' => array('type' => 'string')
    );
    private $MMVal = array(
        'PRICE_CTRL' => array('type' => 'string'),
        'PRICE_UNIT' => array('type' => 'decimal'),
        'VAL_CAT' => array('type' => 'string'),
        'MOVING_PR' => array('type' => 'decimal'),
        'VAL_CLASS' => array('type' => 'string'),
        'ORIG_GROUP' => array('type' => 'string'),
        'ORIG_MAT' => array('type' => 'string'),
        'QTY_STRUCT' => array('type' => 'string')
    );
    private $MMTax = array(
        'DEPCOUNTRY' => array('type' => 'string'),
        'TAX_TYPE_1' => array('type' => 'string'),
        'TAXCLASS_1' => array('type' => 'string'),
    );
    private $MMClient = array(
        'MATL_GROUP' => array('type' => 'string'),
        'OLD_MAT_NO' => array('type' => 'string'),
        'BASE_UOM' => array('type' => 'string'),
        'DOCUMENT' => array('type' => 'string'),
        'DIVISION' => array('type' => 'string'),
        'BASIC_MATL' => array('type' => 'string'),
        'NET_WEIGHT' => array('type' => 'decimal'),
        'UNIT_OF_WT' => array('type' => 'string'),
        'PROD_HIER' => array('type' => 'string'),
        'BATCH_MGMT' => array('type' => 'string'),
        'EXTMATLGRP' => array('type' => 'string'),
        'MEDIUM' => array('type' => 'string'),
        'DOC_FORMAT' => array('type' => 'string'),
        'TRANS_GRP' => array('type' => 'string'),
        'PUR_VALKEY' => array('type' => 'string'),
        'STD_DESCR' => array('type' => 'string'),
        'PROD_MEMO' => array('type' => 'string'),
        'MINREMLIFE' => array('type' => 'decimal'),
        'SHELF_LIFE' => array('type' => 'decimal'),
        'PERIOD_IND_EXPIRATION_DATE' => array('type' => 'string')
    );
    private $MMALTUOM = array(
        'ALTGROSSWTUOM' => array('type' => 'string', 'customkey' => 'UNIT_OF_WT'),
        'ALTUOM' => array('type' => 'string', 'customkey' => 'ALT_UNIT'),
        'ALTNUMERATOR' => array('type' => 'decimal', 'customkey' => 'NUMERATOR'),
        'ALTDENOMINATR' => array('type' => 'decimal', 'customkey' => 'DENOMINATR'),
        'ALTGROSSWT' => array('type' => 'decimal', 'customkey' => 'GROSS_WT')
    );
    private $VMCentral = array(
        'KTOKK' => array('type' => 'string'),
        'KUNNR' => array('type' => 'string'),
        'VBUND' => array('type' => 'string'),
        'STCD5' => array('type' => 'string'),
        'STCEG' => array('type' => 'string')
    );
    private $VMAddress = array(
        'TITLE' => array('type' => 'string'),
        'NAME' => array('type' => 'string'),
        'NAME_2' => array('type' => 'string'),
        'NAME_3' => array('type' => 'string'),
        'NAME_4' => array('type' => 'string'),
        'SORT1' => array('type' => 'string'),
        'STREET' => array('type' => 'string'),
        'DISTRICT' => array('type' => 'string'),
        'POSTL_COD1' => array('type' => 'string'),
        'CITY' => array('type' => 'string'),
        //  'COUNTRY' => array('type' => 'string'),
        'REGION' => array('type' => 'string'),
    );
    private $VMCompanyKey = array(
        'BUKRS' => array('type' => 'string')
    );
    private $VMCompanyData = array(
        'AKONT' => array('type' => 'string'),
        'FDGRV' => array('type' => 'string'),
        'ALTKN' => array('type' => 'string'),
        'PERNR' => array('type' => 'string'),
        'ZUAWA' => array('type' => 'string'),
        'ZTERM' => array('type' => 'string'),
        'REPRF' => array('type' => 'string'),
        'ZWELS' => array('type' => 'string')
    );
    private $VMPurchasingKey = array(
        'EKORG' => array('type' => 'string'),
    );
    private $VMPurchasing = array(
        'WAERS' => array('type' => 'string'),
        'ZTERM' => array('type' => 'string'),
        'INCO1' => array('type' => 'string'),
        'INCO2' => array('type' => 'string'),
        'KALSK' => array('type' => 'string'),
        /* 'WEBRE' => array('type' => 'string'),
          'KZAUT' => array('type' => 'string'), */
        'VERKF' => array('type' => 'string'),
        'TELF1' => array('type' => 'string'),
        'EKGRP' => array('type' => 'string'),
        'BOLRE' => array('type' => 'string'),
        'BOIND' => array('type' => 'string'),
        'UMSAE' => array('type' => 'string')
    );
    private $VMTel = array(
        'TELEPHONE' => array('type' => 'string')
    );
    private $VMFax = array(
        'FAX' => array('type' => 'string')
    );
    private $VMEmail = array(
        'E_MAIL' => array('type' => 'string')
    );
    private $VMBankKey = array(
        'BANKS' => array('type' => 'string'),
        'BANKL' => array('type' => 'string'),
        'BANKN' => array('type' => 'string'),
    );
    private $VMBankData = array(
        'KOINH' => array('type' => 'string'),
        'IBAN' => array('type' => 'string'),
        'IBAN_FROM_DATE' => array('type' => 'string'),
        // 'BANKN' => array('type' => 'string'),
    );
    ///CM

    private $CMCentral = array(
        'KTOKD' => array('type' => 'string'),
        'LIFNR' => array('type' => 'string'),
        'VBUND' => array('type' => 'string'),
        'STCD5' => array('type' => 'string'),
        'STCEG' => array('type' => 'string'),
        'NIELS' => array('type' => 'string'),
    );
    private $CMAddress = array(
        'TITLE' => array('type' => 'string'),
        'NAME' => array('type' => 'string'),
        'NAME_2' => array('type' => 'string'),
        'SORT1' => array('type' => 'string'),
        'STREET' => array('type' => 'string'),
        'DISTRICT' => array('type' => 'string'),
        'POSTL_COD1' => array('type' => 'string'),
        'CITY' => array('type' => 'string'),
        'PO_BOX' => array('type' => 'string'),
        'COUNTRY' => array('type' => 'string'),
            //'REGION' => array('type' => 'string'),
    );
    private $CMCompanyKey = array(
        'BUKRS' => array('type' => 'string')
    );
    private $CMCompanyData = array(
        'AKONT' => array('type' => 'string'),
        'FDGRV' => array('type' => 'string'),
        'ALTKN' => array('type' => 'string'),
        'PERNR' => array('type' => 'string'),
        'ZUAWA' => array('type' => 'string'),
        'ZTERM' => array('type' => 'string'),
        'ZWELS' => array('type' => 'string')
    );
    private $CMSalesKey = array(
        'VKORG' => array('type' => 'string'),
        'VTWEG' => array('type' => 'string'),
        'SPART' => array('type' => 'string'),
    );
    private $CMSalesData = array(
        'VKBUR' => array('type' => 'string'),
        'VKGRP' => array('type' => 'string'),
        'KDGRP' => array('type' => 'string'),
        'WAERS' => array('type' => 'string'),
        'VWERK' => array('type' => 'string'),
        'KALKS' => array('type' => 'string'),
        'PLTYP' => array('type' => 'string'),
        'VERSG' => array('type' => 'string'),
        'AWAHR' => array('type' => 'string'),
        'KVGR1' => array('type' => 'string'),
        'KVGR2' => array('type' => 'string'),
        'VSBED' => array('type' => 'string'),
        'INCO1' => array('type' => 'string'),
        'INCO2' => array('type' => 'string'),
        'ZTERM' => array('type' => 'string'),
        'KTGRD' => array('type' => 'string')
    );
    private $CMTel = array(
        'TELEPHONE' => array('type' => 'string')
    );
    private $CMFax = array(
        'FAX' => array('type' => 'string')
    );
    private $CMEmail = array(
        'E_MAIL' => array('type' => 'string')
    );

    public function __construct() {
        parent::__construct();
    }

    private function getMasterData($bapi, $secs) {
        $result = [];
        // apcu_delete('cache_MMData');
        $cachedValue = apcu_fetch('cache_'. $bapi);
        if ($cachedValue) {
            // Use the cached value
            // if($this->logger != null)
            //     $this->logger->Info("returns cached value for BAPI: {$bapi}", "Backend\Model\SAP");
            return $cachedValue;
        } else {
            $sapconfig = implode(", ", array_map(
                fn($k, $v) => "$k=$v", 
                array_keys($this->sapconfig), 
                $this->sapconfig
            ));
            // Instruction: select following and press ctrl + /

            $c = new SapConnection($this->sapconfig);
            try {
                    // Generate the value and store it in cache
                   
                    $f = $c->getFunction($bapi);
                    $result = $f->invoke([]);
                    apcu_store('cache_'. $bapi, $result, $secs * 1000);   // timeout in milliseconds                
            } catch (SapException $ex) {
                    $this->logger->Error("Exception while executing BAPI: {$bapi}", "Backend\Model\SAP", $ex);

                echo 'Exception: ' . $ex->getMessage() . PHP_EOL;
                /*
                * You could also catch \SAPNWRFC\ConnectionException and \SAPNWRFC\FunctionCallException
                * separately if you want to.
                */
            }
            finally {
                $c->close();
            }
        }
        // if($this->logger != null)
        //     $this->logger->Info("returns freshed value for BAPI: {$bapi}", "Backend\Model\SAP");
        return $result;

    }
    public function GetMMData() {
        return $this->getMasterData('BAPI_EF_MM_MAT_MASTER', 600);
    }

    public function GetSAPCMData() {
        return $this->getMasterData('BAPI_EF_SD_CUS_MASTER', 660);
    }

    public function GetSAPVMData() {
        return $this->getMasterData('BAPI_EF_MM_VEN_MASTER', 720);
    }

    public function GetSAPHREMPData() {
        return $this->getMasterData('BAPI_EF_HR_EMP_MASTER', 780);
    }

    public function PostVMData($data) {

        $central = $this->FieldMapper($data, $this->VMCentral);
        $address = $this->FieldMapper($data, $this->VMAddress);
        $address['COUNTRY'] = $data->LAND1;


        //'LAND1' => array('type' => 'string', 'customkey' => 'COUNTRY')
        $compkey = $this->FieldMapper($data, $this->VMCompanyKey);
        $compdata = $this->FieldMapper($data, $this->VMCompanyData);
        $compdata['ZUAWA'] = '001';
        $compdata['REPRF'] = 'X';

        $purkey = $this->FieldMapper($data, $this->VMPurchasingKey);
        $purdata = $this->FieldMapper($data, $this->VMPurchasing);
        $purdata['WEBRE'] = "X";
        $tel = $this->FieldMapper($data, $this->VMTel);
        $fax = $this->FieldMapper($data, $this->VMFax);
        $email = $this->FieldMapper($data, $this->VMEmail);
        $bankkey = $this->FieldMapper($data, $this->VMBankKey);
        $bankdata = $this->FieldMapper($data, $this->VMBankData);


        $result = array();
        /* print_r([
          "PI_CENTRAL_DATA" => $central,
          "PI_ADDRESS_DATA" => $address,
          "PI_COMPANY_KEY" => $compkey,
          "PI_COMPANY_DATA" => $compdata,
          "PI_PURCHASING_KEY" => $purkey,
          "PI_PURCHASING_DATA" => $purdata,
          "PI_TELEPHONE" => $tel,
          "PI_FAX" => $fax,
          "PI_EMAIL" => $email
          ]); */
        try {
            $c = new SapConnection($this->sapconfig);

            $f = $c->getFunction('BAPI_EF_MM_VEN_CREATE');
            $params = [
                "PI_CENTRAL_DATA" => $central,
                "PI_ADDRESS_DATA" => $address,
                "PI_COMPANY_KEY" => $compkey,
                "PI_COMPANY_DATA" => $compdata,
                "PI_PURCHASING_KEY" => $purkey,
                "PI_PURCHASING_DATA" => $purdata,
                "PI_TELEPHONE" => array($tel),
                "PI_FAX" => array($fax),
                "PI_EMAIL" => array($email)
            ];

            if (array_key_exists("BANKS", $bankkey) && isset($bankkey['BANKS'])) {
                // split account number in two if > 18
                if (array_key_exists("BANKN", $bankdata) && strlen($bankdata["BANKN"]) > 18) {
                    $first = substr($bankdata["BANKN"], 0, 17);
                    $second = substr($bankdata["BANKN"], 18);
                    $bankdata["BANKN"] = $first;
                    $bankdata["BKREF"] = $second;
                }

                $params["PI_BANK_KEY"] = $bankkey;
                $params["PI_BANK_DATA"] = $bankdata;
            }
            //print_r($params);
            //   var_dump($params);
            $result["result"] = $f->invoke($params);

            //var_dump($result);
        } catch (SapException $ex) {
            // echo 'Exception: ' . $ex->getMessage() . PHP_EOL;
            $this->logger->Error("Exception while executing BAPI: BAPI_EF_MM_VEN_CREATE. {$ex->getMessage()}", "Backend\Model\SAP");
            throw $ex;


            // * You could also catch \SAPNWRFC\ConnectionException and \SAPNWRFC\FunctionCallException
            //  * separately if you want to.
        }
        $c->close();
        // print_r($result);
        return $result;
    }

    public function PostCMData($data) {

        $central = $this->FieldMapper($data, $this->CMCentral);
        $address = $this->FieldMapper($data, $this->CMAddress);
        //$address['COUNTRY'] = $data->LAND1;
        //'LAND1' => array('type' => 'string', 'customkey' => 'COUNTRY')
        $compkey = $this->FieldMapper($data, $this->CMCompanyKey);
        $compdata = $this->FieldMapper($data, $this->CMCompanyData);
        $compdata['ZUAWA'] = '001';
        // $compdata['REPRF'] = 'X';

        $salekey = $this->FieldMapper($data, $this->CMSalesKey);
        $saledata = $this->FieldMapper($data, $this->CMSalesData);
        $saledata['BOKRE'] = "X";
        $saledata['PRFRE'] = "X";
        $saledata['VERSG'] = "1";
        $saledata['KALKS'] = "1";

        $tel = $this->FieldMapper($data, $this->CMTel);
        $fax = $this->FieldMapper($data, $this->CMFax);
        $email = $this->FieldMapper($data, $this->CMEmail);
        /* $bankkey = $this->FieldMapper($data, $this->VMBankKey);
          $bankdata = $this->FieldMapper($data, $this->VMBankData); */
        $result = array();
        // print_r([
        //   "PI_CENTRAL_DATA" => $central,
        //   "PI_ADDRESS_DATA" => $address,
        //   "PI_COMPANY_KEY" => $compkey,
        //   "PI_COMPANY_DATA" => $compdata,
        //   "PI_PURCHASING_KEY" => $purkey,
        //   "PI_PURCHASING_DATA" => $purdata,
        //   "PI_TELEPHONE" => $tel,
        //   "PI_FAX" => $fax,
        //   "PI_EMAIL" => $email
        //   ]);
        //   exit("Stop the flow right here!");
        try {
            $c = new SapConnection($this->sapconfig);

            $f = $c->getFunction('BAPI_EF_SD_CUS_CREATE');
            $params = [
                "PI_CENTRAL_DATA" => $central,
                "PI_ADDRESS_DATA" => $address,
                "PI_COMPANY_KEY" => $compkey,
                "PI_COMPANY_DATA" => $compdata,
                "PI_SALES_KEY" => $salekey,
                "PI_SALES_DATA" => $saledata,
                "PI_TELEPHONE" => array($tel),
                "PI_FAX" => array($fax),
                "PI_EMAIL" => array($email)
            ];

            /*  if (isset($bankkey['BANKS'])) {

              $params["PI_BANK_KEY"] = $bankkey;
              $params["PI_BANK_DATA"] = $bankdata;
              } */
            //   var_dump($params);
            $result["result"] = $f->invoke($params);

            //var_dump($result);
        } catch (SapException $ex) {
            // echo 'Exception: ' . $ex->getMessage() . PHP_EOL;
            $this->logger->Error("Exception while executing BAPI: BAPI_EF_SD_CUS_CREATE. {$ex->getMessage()}", "Backend\Model\SAP");

            throw $ex;


            // * You could also catch \SAPNWRFC\ConnectionException and \SAPNWRFC\FunctionCallException
            //  * separately if you want to.
        }
        $c->close();
        // print_r($result);
        return $result;
    }

    public function PostMMData($mattype, $matdesc, $data) {


        $client = $this->FieldMapper($data, $this->MMClient);
        $plant = $this->FieldMapper($data, $this->MMPlant);

        // TODO : HARDCODED
        $plant["ISS_ST_LOC"] = $data->STGE_LOC;
        $storloc = $this->FieldMapper($data, $this->MMStorLoca);
        $val = $this->FieldMapper($data, $this->MMVal);
        $sales = $this->FieldMapper($data, $this->MMSales);
        // ALT UOM
        $altuom = array();
        // Push Gross Weight
        $altuom[] = array("GROSS_WT" => (float) $data->GROSSWEIGHT
            , "ALT_UNIT" => $data->BASE_UOM
            , "NUMERATOR" => (float) 1,
            "DENOMINATR" => (float) 1,
            "UNIT_OF_WT" => "KG"
        );

        // print_R($data->ALTUOM);
        for ($i = 0; $i < count($data->ALTUOM); $i++) {
            $altuom[] = $this->FieldMapper($data->ALTUOM[$i], $this->MMALTUOM, array(), true);
        }
        // 
        // 
        // language

        $lang = array();
        for ($i = 0; $i < count($data->Lang); $i++) {
            $lang[] = array(
                "LANGU" => $data->Lang[$i]->Language[0],
                "LANGU_ISO" => $data->Lang[$i]->Language,
                "MATL_DESC" => $data->Lang[$i]->Description
            );
        }
        // Tax
        $tax = array();
        if (isset($data->TAXCLASS_1) && ($data->PI_MATTYPE == "FERT" || $data->PI_MATTYPE == "HAWA")) {
            $tax = $this->FieldMapper($data, $this->MMTax);
        }



        //var_dump ($client);
        $result = array();

        try {
            $c = new SapConnection($this->sapconfig);

            $f = $c->getFunction('BAPI_EF_MM_MAT_CREATE');
            //Jordan
       /*     print_r([
                "PI_MATTYPE" => $mattype,
                "PI_MATDESC" => $matdesc,
                "PI_CLIENTDATA" => $client,
                "PI_PLANTDATA" => $plant,
                "PI_STORAGELOCATIONDATA" => $storloc,
                "PI_VALUATIONDATA" => $val,
                "PI_SALESDATA" => $sales,
                "PI_ALTUOM" => $altuom,
                "PI_MAT_TEXT" => $lang,
                "PI_TAXDATA" => $tax
            ]);
            
            exit();*/
            $result["result"] = $f->invoke([
                "PI_MATTYPE" => $mattype,
                "PI_MATDESC" => $matdesc,
                "PI_CLIENTDATA" => $client,
                "PI_PLANTDATA" => $plant,
                "PI_STORAGELOCATIONDATA" => $storloc,
                "PI_VALUATIONDATA" => $val,
                "PI_SALESDATA" => $sales,
                "PI_ALTUOM" => $altuom,
                "PI_MAT_TEXT" => $lang,
                "PI_TAXDATA" => $tax
            ]);
            //var_dump($result);
        } catch (SapException $ex) {
            // echo 'Exception: ' . $ex->getMessage() . PHP_EOL;
            $result["Exception"] = true;
            $result["ExceptionMessage"] = $ex->getMessage();
            $this->logger->Error("Exception while executing BAPI: BAPI_EF_MM_MAT_CREATE. {$ex->getMessage()}", "Backend\Model\SAP");


            // * You could also catch \SAPNWRFC\ConnectionException and \SAPNWRFC\FunctionCallException
            //  * separately if you want to.
        }
        $c->close();
        return $result;
    }

}
