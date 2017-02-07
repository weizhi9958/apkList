<?php

/*

 * Following code will list all the products

 */

 

// array for JSON response

$response = array();

 

// include db connect class

define ( '__ROOT__' , dirname ( dirname ( __FILE__ )));  

require_once (__ROOT__.'/db_connect.php');



// connecting to db

$db = new DB_CONNECT();

// get all products from products table

mysql_query("SET NAMES utf8"); 

mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 

mysql_query("SET CHARACTER_SET_RESULTS=utf8"); 

$result = mysql_query("SELECT * FROM check ") or die(mysql_error());

 

// check for empty result

if (mysql_num_rows($result) > 0) {

    // looping through all results

    // products node

		

    $response["rank"] = array();

 

    while ($row = mysql_fetch_array($result)) {

        // temp user array

        $rank = array();

        $rank["id"] = $row["_id"];

        $rank["name"] = urlencode($row["name"]);

        $rank["time"] = $row["time"];





        // push single product into final response array

        array_push($response["rank"], $rank);

    }

    // success

    $response["success"] = 1;

 

    // echoing JSON response

	

    echo urldecode(json_encode($response)) ;

} else {

    // no products found

    $response["success"] = 0;

    $response["message"] = "No products found";

 

    // echo no users JSON

    echo json_encode($response);

}

?>