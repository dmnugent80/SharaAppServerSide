<?php

  // array for JSON response
$response = array();

// check for required fields
if (isset($_POST['name']) && isset($_POST['message'])) {


  $dbh=mysql_connect ("localhost", "username", "password") or die('Cannot connect to the database because: ' . mysql_error());
  mysql_select_db ("database_name");
  
    $name = $_POST['name'];
    $message = $_POST['message'];

  
   // mysql inserting a new row
    $result = mysql_query("INSERT INTO test1(db_key, value) VALUES( '$name', '$message' )");

    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Message successfully created.";

        // print JSON response
        print(json_encode($response));
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";

        // print JSON response
        print(json_encode($response));
    }


  mysql_close();
  
 } else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // print JSON response
    print(json_encode($response));
}
 
  
?>
