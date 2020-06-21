<?php
require_once("config.php");
/*
if(!empty($_POST)){
    $DB->addRecord("test", $_POST);
}
echo
"<form action=\"index.php\" method='POST'>
  <label for=\"test\">test:</label><br>
  
  <input type=\"text\" id=\"test\" name=\"test\"><br>

<label for=\"dupa\">dupa:</label><br>

  <input type=\"text\" id=\"dupa\" name=\"dupa\"><br><br>
  <input type=\"submit\" value=\"Submit\">
</form> ";

if(!empty($_POST)){

    $DB->updateRecord("test", $_POST);
}
echo
"<form action=\"index.php\" method='POST'>
  <label for=\"test\">test:</label><br>

  <input type=\"text\" id=\"test\" name=\"test\"><br>

<label for=\"dupa\">dupa:</label><br>

  <input type=\"text\" id=\"dupa\" name=\"dupa\"><br><br>
  <input type=\"submit\" value=\"Submit\">
  <input id=\"id\" name=\"id\" type=\"hidden\" value=\"1\">
</form> ";


if(!empty($_POST)){

    $DB->deleteRecord("test", $_POST);
}

echo

"<form action=\"index.php\" method='POST'>
  <label for=\"test\">test:</label><br>

  <input type=\"text\" id=\"test\" name=\"test\"><br>

  <label for=\"dupa\">dupa:</label><br>

  <input type=\"text\" id=\"dupa\" name=\"dupa\"><br><br>

  <input type=\"submit\" value=\"Submit\">


</form> ";

*/


if(!empty($_POST)){

    $DB->deleteRecord("test", $_POST);


}

echo

"<form action=\"index.php\" method='POST'>
  <label for=\"test\">test:</label><br>
  
  <input type=\"text\" id=\"test\" name=\"test\"><br>

  <label for=\"dupa\">dupa:</label><br>

  <input type=\"text\" id=\"dupa\" name=\"dupa\"><br><br>
  
  <input type=\"submit\" value=\"Submit\">
  
  
 
  
</form> ";

$sql = "SELECT * FROM test";
$var = $DB->getRecordSql($sql);
var_dump($var);