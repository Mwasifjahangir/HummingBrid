<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'boot.php';
ini_set('display_errors', 1);
$config = [
    'account_suffix' => "@freshdelmonte.corp",
    // 'domain_controllers' => array("AEDXBVMDC2"),
    'hosts'    => ['freshdelmonte.corp'],

    'base_dn' => 'OU=MENA,OU=REGIONS,DC=FreshDelmonte,DC=corp',
	// add User (without @freshdelmonte.com/corp) and password 
    'username' => 'ae_backup',
    'password' => ''
];
echo "script start";

$adldap = new \Adldap\Adldap();
echo "<br>script start 2";
$adldap->addProvider($config);

// add User (without @freshdelmonte.com) and password 
// $authUser = $adldap->user()->authenticate('ae_backup', '');
echo "<br>script start 3";
try {
$authUser = $adldap->connect();
} catch (adLDAPException $e) {
    echo $e;
    exit();
} catch (exception  $ex) {
    echo $ex;
    exit();

}
print_r($authUser);
echo "script start connection request";
if ($authUser == true) {
    echo "User authenticated successfully";
} else {
// getLastError is not needed, but may be helpful for finding out why:
    echo $adldap->getLastError();

    echo "User authentication unsuccessful";
}
$user = new \Bytecode\Opera\Model\User();
$aduser = $adldap->search()->get(); //->user()->all();
echo "<hr/>";
echo "count: " .  count($aduser);
echo "<hr/>";
print_r($aduser);

echo "<hr/>";


$userstoadd = array();
$db = new \Bytecode\Opera\Libs\DB();
$db->Connect();
for ($i = 0; $i < count($aduser); $i++) {
    $desc = "";
    $cu = $aduser[$i];
    if(!$cu instanceof \adldap\Models\User){
        continue;
    }
    $accountName = $cu->getAccountName();
    $displayName = $cu->getDisplayName();
    echo "<br>Processing: " . $accountName . ", " . $displayName . "<br>";
    if ($user->UserExist(sqlclean($accountName)) == false) {
        //$userstoadd[] = $aduser[$i]['displayname'];
        // $userstoadd[] = $aduser[$i]['samaccountname'];
        $q = "INSERT INTO [dbo].[Users]
           ([Name]
           ,[DisplayName]
           ,[Username]
           ,[Email]
           ,[Principal]
           )
     VALUES
           ('" . sqlclean($accountName) . "'
           ,'" . sqlclean($displayName) . "'
           ,'" . sqlclean($accountName) . "'
           ,'" . sqlclean($accountName) . "@freshdelmonte.com'
        ,'" . sqlclean($accountName) . "@freshdelmonte.com'
         )";
        $db->Query($q);
        echo 'Adding ' . $accountName . '<br>';
    }
    // trim($accountName) != "" ? $title = trim($aduser[$i]['title']) : $title = trim($aduser[$i]['description']);
    $title = trim($cu->getTitle());
    $department = trim($cu->getDepartment());

    $qw = "UPDATE Users SET "
            . "[Title] = '" . sqlclean($title) . "' "
            . ",[Department] = '" . sqlclean($department) . "' "
            . "WHERE [Username] = '" . sqlclean($accountName) . "' ";
    $db->Query($qw);
    echo 'Updating ' . $accountName . '<br>';
}

print_r($userstoadd);
