<?php
 
require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$wsdl = "http://www.dneonline.com/calculator.asmx?wsdl";
		if(!$error){
	
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
			    exit();
			}
			 try {
				$result = $client->call('Add', array('intA' => '550', 'intB' => '220'));

				echo "<h2>Result<h2/>";
				print_r($result);
			  }
			  catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}	
echo '<h2>Request</h2>';
echo '<pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2>';
echo '<pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2>';
echo '<pre>' . htmlspecialchars($client->debug_str, ENT_QUOTES) . '</pre>';
?>





