<?php

$con = mysql_connect("localhost","alanrgan","root123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("alanrgan", $con);

$name = $_POST['name'];

if($name != "") {
    $getdeck = mysql_query("SELECT * FROM game_table WHERE player2='$name'") or die(mysql_error());
    
    while($row = mysql_fetch_array($getdeck)) {
        $deck = $row['deck'];
    }
    $array = array();
    $array["deck"] = $deck;
    echo json_encode($array);
}

mysql_close($con);
?>