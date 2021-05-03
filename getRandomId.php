<?php
//printf(" substr(md5(uniqid(mt_rand(), true)), 0, 6): %s\r\n", substr(md5(uniqid(mt_rand(), true)), 0, 6));
//echo("<br/>");
if ($_SERVER['REQUEST_METHOD'] == 'GET') { 
	//print(substr(md5(uniqid(mt_rand(), true)), 0, 6));
	
	$id = substr(md5(uniqid(mt_rand(), true)), 0, 6);
	$result[] = array('user_id' => $id);
	$json = json_encode($result);
	print(isset($_GET['callback']) ? "{$_GET['callback']}($json)" : $json);
}
?> 