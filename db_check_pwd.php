<?php

// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['type']) && isset($_POST['pwd'])) {

    $type = $_POST['type'];
    $pwd  = $_POST['pwd'];

	// include db connect class
	define ( '__ROOT__' , dirname ( dirname ( __FILE__ )));
    require_once __ROOT__ . '/yuanta/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
	mysql_query("SET NAMES utf8"); 
	mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
	mysql_query("SET CHARACTER_SET_RESULTS=utf8");

    // mysql inserting a new row
    $result = mysql_query("SELECT * FROM `check` WHERE type = '$type' AND pwd = '$pwd'") or die(mysql_error());
 
    // check if row inserted or not
    if (mysql_num_rows($result) > 0) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Password is ok.";
 
        // echoing JSON response
        echo urldecode(json_encode($response));
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = urlencode("密碼錯誤.");
 
        // echoing JSON response
        echo urldecode(json_encode($response));
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = urlencode("參數錯誤.");
 
    // echoing JSON response
    echo urldecode(json_encode($response));
}
?>