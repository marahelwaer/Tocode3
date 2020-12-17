<?php

 
 require_once('lib/nusoap.php'); 
 $server = new nusoap_server();

function SayHello($name){
 $hi = "Hi ".$name;
 return $hi;
}
$server->configureWSDL('myname', 'http://www.mynamespace.com');

      $server->register('SayHello',
			array('name' => 'xsd:string'),  
			array('hi' => 'xsd:string'),  
			'http://www.mynamespace.com',  
      'http://www.mynamespace.com#SayHello' 

      ); 
$server->service(file_get_contents("php://input"));
?>