<?php

//mysql_connect("localhost","rid50","nitwit");
//mysql_select_db("location");

//mysql_connect("localhost","yarussor_rid66","nitwit-666");
//mysql_connect("localhost","yarussor","narod-642");
mysql_connect("localhost","yarussor_tracker","mikmik");
mysql_select_db("yarussor_tracker");

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

	//$sql_conn = mysql_connect("localhost","rid50","nitwit") or die("Connection failed : " . mysql_error());
	//mysql_connect("localhost","rid50","nitwit") or die(mysql_error());
	//mysql_select_db("location") or die(mysql_error());
	
	
	//$q=mysql_query("SELECT * FROM pathtracks WHERE birthyear>'".$_REQUEST['year']."'");
	/*
	//$query = "SELECT * FROM pathtrack";
	$result = "";
	foreach($_post[latitude] as $key) {
		//$query = "INSERT INTO pathtrack (user_name, provider, latitude, longitude, accuracy, time) VALUES ('$_POST[user_name]', '$_POST[provider]', $_POST[latitude], $_POST[longitude], $_POST[accuracy], $_POST[time])";
		//$q=mysql_query($query);
	//	if (mysql_errno())
	//		break;
	$result += $key . " / ";
	}
	*/
	//$input = file_get_contents('php://input');
	
	//$input = substr($input, 5);  //remove json= 
	//$input = urldecode($input); 
	//$jsonObj = json_decode($input, true); 
	
	//$input = 7;
	//if( !empty($jsonObj)) {  
	//    try { 
	//	$input = "5";
	
	        //$input = $_POST['latitude'][1]; 
	        //$input = $input . $jsonObj[latitude]; 
	//    } 
	//} 
	$wsq = $_POST[wsq];
	$query = "INSERT INTO bio (id, wsq) VALUES ('$_POST[id]', '$_POST[wsq]') ON DUPLICATE KEY UPDATE wsq='".$wsq."'";
	//$query = "INSERT INTO bio (id, picture) VALUES ('$_POST[id]', '$_POST[picture]') ON DUPLICATE KEY UPDATE picture=VALUES($picture)";
	//$query = "INSERT INTO bio (id, picture) VALUES ('$_POST[id]', '$_POST[picture]') ON DUPLICATE KEY UPDATE picture=VALUES(".'$_POST[picture]'.")";
	//$query = "INSERT INTO bio (id, picture) VALUES ('$_POST[id]', '$_POST[picture]')";
	//$query="SELECT * FROM pathtrack";
	
	mysql_query($query);

	//$input = "";
	//$keys = array_keys($_POST);
	//$input = $keys[0]; // user_name
	//$input = count($_POST[$keys[0]]); // 123
	
	//$input = $_POST[user_name][0]; // roman
	//$input = count($_POST['user_name']); // 119
	//$input = count(array_keys($_POST)); // 6
	//$input = count($_POST); // 6
	
	//print($query);


	if (mysql_errno()) { 
	    //header("HTTP/1.1 500 Internal Server Error");
	    //echo nl2br($query."\n");
	    //echo mysql_error(); 
	    //$result = array('result' => mysql_error());
	    //print(json_encode($result));
		//print(json_encode(array('result' => mysql_error())));
		//print("[{'result':\"" . mysql_error() . "\"}]");
		
		//$result[] = array('result' => $query);
		$result[] = array('result' => mysql_error());
		$json = json_encode($result);
		print(isset($_GET['callback']) ? "{$_GET['callback']}($json)" : $json);
	}
	else
	{
		//print(json_encode(array('result' => 'success')));
		//print("[{'result':'success'}]");

		$result[] = array('result' => 'success');
		$json = json_encode($result);
		print(isset($_GET['callback']) ? "{$_GET['callback']}($json)" : $json);
	}
} else if ($_SERVER['REQUEST_METHOD'] == 'GET') { 

	header('Content-type: application/json; charset=utf-8');
	header('Cache-Control: no-cache, must-revalidate');
	header('Expires: Mon, 1 Jan 1990 00:00:00 GMT');

	//print("<span>kuku</span>");

	//$query = "SELECT * FROM pathtrack";

	$query="SELECT wsq FROM bio WHERE id ='".$_REQUEST['id']."'";

	$q = mysql_query($query);
	
	if (mysql_errno()) { 
	    //header("HTTP/1.1 500 Internal Server Error");
	    //echo nl2br($query."\n");
	    //echo mysql_error(); 
	    //$result = array('result' => mysql_error());
	    //print(json_encode($result));
		//print(json_encode(array('result' => mysql_error())));
		//print('{"result":"' . mysql_error() . '"}');
		
		//$result[] = array('result' => $query);
		//$result[] = array('result' => $_REQUEST['userid']);
		$result[] = array('result' => mysql_error());
		$json = json_encode($result);
		print(isset($_GET['callback']) ? "{$_GET['callback']}($json)" : $json);
		
		
	}
	else
	{
		$result = "";
	    while($e=mysql_fetch_assoc($q))
	        $result[]=$e;

		$json = json_encode($result);
		print(isset($_GET['callback']) ? "{$_GET['callback']}($json)" : $json);
	   	//print(json_encode($result));
	
		//print(json_encode(array('result' => 'success')));
		//print('{"result":"success"}');
	
	}
}

mysql_close();

?>
