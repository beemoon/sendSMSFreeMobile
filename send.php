<?php
require_once('FreeSms.php');
require_once('Mcrypt.php');

$fileAccounts = 'accounts.ini';


try
{
	$user=$_POST['userID'];
	$userkey=$_POST['userIDpwd'];
	$password=$_POST['pass'];
	$userNum=$_POST['user'];
	$msg = $_POST['msg'];

	/* decrypt key */
	if (isset($password)){
		if (is_file ($fileAccounts)){
			require_once($fileAccounts);
			$oCrypt = new Mcrypt($password);
		
			$user=$userStoredID[$userNum];
			$userkey=$oCrypt->decrypt($userkeyStored[$userNum]);		
		} else {
			$user='000';
			$userkey='000';
		}
	
		
	}

	$myMsg=new FreeSms($user,$userkey);
	$myMsg->send($msg);
	$responseArray = array('type' => 'success', 'message' => $e->getMessage());
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $e->getMessage());
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
}
else {
    echo $responseArray['message'];
}


?>
