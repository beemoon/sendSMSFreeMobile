<?php


try
{

$userStoredID=array();
$userkeyStored=array();
$newUserID='';
$key='';
$password='';
$oCrypt='';
$encryptedKey='';

$fileAccounts = 'accounts.ini';

if (isset($_POST['key']) || isset($_POST['password'])){
	require_once('Mcrypt.php');

	if (is_file ($fileAccounts)){
		require_once($fileAccounts);
		
	}

	$newUserID=$_POST['userID'];
	$key=$_POST['key'];
	$password=$_POST['password'];

	$oCrypt = new Mcrypt($password);
	$encryptedKey = $oCrypt->encrypt($key);
	
	array_push($userStoredID,$newUserID);
	array_push($userkeyStored,$encryptedKey);
	
/* Save to file */
$data = '<?php';
$data .="\n";
$data .= '$userStoredID = ' . var_export($userStoredID, true) . ';';
$data .="\n";
$data .= '$userkeyStored = ' . var_export($userkeyStored, true) . ';';
$data .="\n";
$data .= '?>';

if (file_put_contents($fileAccounts,$data)){
	$message='Clé cryptée et stockée dans le fichier.';
	}

}	

	$responseArray = array('type' => 'success', 'message' => $message);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => 'Erreur de cryptage inconnue, rien n\'est fait');
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
}
else {
    echo $responseArray['message'];
}

/* Reset vars */
	unset($userID);
	unset($userStoredID);
	unset($userkeyStored);
	unset($newUserID);
	unset($key);
	unset($password);
	unset($oCrypt);
	unset($encryptedKey);
	
?>
