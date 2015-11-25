<?php
ini_set('display_errors', 1);

$con = new mysqli("173.71.126.184:3306","alanrgan","penguins666", "pokerdb");
if ($con->connect_errno) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$type = $_POST['type'];
$name = $_POST['name'];

function bet($bet) {
	$bet = $_POST['bet'];
	$playernum = $_POST['playernum'];
	
	global $con, $name, $type, $bet, $playernum;
	
	$arr = Array();
	$betnum = intval($bet);
	
	if($betnum != 0 || $bet == "all in" || $bet == "allin") {

		$checknum = $con->query("SELECT * FROM game_table WHERE player1='$name' OR player2='$name'");
		
		while($row = $checknum->fetch_array(MYSQLI_BOTH)) {
			if($playernum = 1) {
				$player = "player1_money";
			} else {
				$player = "player2_money";
			}
			$pot = $row['pot'];
			$playermoney = $row[$player];
		}
		if($betnum <= $playermoney && $betnum > 0) {
			if($betnum % 5 != 0) {
				$arr['error'] = "Bet must be a multiple of 5";
				$arr['okay'] = 0;
				//return json_encode($arr);
			} else {
				$playermoney = $playermoney - $betnum;
				$pot += $betnum;
				$con->query("UPDATE game_table SET pot='$pot', '$player'='$playermoney'");
				$arr['pot'] = $pot;
				$arr['money'] = $playermoney;
				$arr['okay'] = 1;
				//return json_encode($arr);
			}
		}
	} else {
		$arr['error'] = "Error: Value entered is not a number";
	}
	echo json_encode($arr);
	//return json_encode($arr);
}

function switchturn($n) {
	$t = $_POST['turn'];
	if($t == 1 || $t == 2)
	{
		$t = ($t == 1) ? 2 : 1;
		$con->query("UPDATE game_table SET turn='$t' WHERE player1='$n' OR player2='$n'");
	}
	else
		echo "Error";
}

switch($type) {
	case "bet":
		bet($bet);
		break;
	case "switch":
		switchturn($name);
		break;
	default:
		echo "Error";
}

$con->close();
?>