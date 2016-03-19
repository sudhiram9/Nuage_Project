<?php
	$method = GET;
	if (isset($_GET['table'])) {
		$method = $_GET['method'];
	}
	$conn = mysql_connect('192.168.195.158', 'webapp', 'mypassword');
	$link = mysql_select_db('database1', $conn);
	mysqli_set_charset($link,'utf8');

	switch ($method) {
		case "GET":
			if (isset($_GET['table']) && isset($_GET['state'])) {
				$table = $_GET['table'];
				$state = $_GET['state'];
			} else {
				echo "<b>Error:</b> 'table name and state are required'<br>";
				break;
			}
			$sql = "select * from $table where state = '$state'";
			break;
		case 'PUT':
			if (isset($_GET['table']) && isset($_GET['state']) && isset($_GET['lat']) && isset($_GET['lon'])) {
				$table = $_GET['table'];
				$state = $_GET['state'];
				$lat = $_GET['lat'];
				$lon = $_GET['lon'];
			} else {
				echo "<b>Error:</b> 'table,state,latitude,longitude values are required'<br>";
				break;
			}
			$sql = "update $table set latitude = '$lat',longitude = '$lon' where state = '$state'";
			$displaySql = "select * from $table where state = '$state'";
			break;
		case 'POST':
			if (isset($_GET['table']) && isset($_GET['state']) && isset($_GET['lat']) && isset($_GET['lon'])) {
				$table = $_GET['table'];
				$state = $_GET['state'];
				$lat = $_GET['lat'];
				$lon = $_GET['lon'];
			} else {
				echo "<b>Error:</b> 'table,state,latitude,longitude values are required'<br>";
				break;
			}
			$sql = "insert into $table (state, latitude, longitude) values ('$state', '$lat', '$lon')";
			$displaySql = "select * from $table where state = '$state'";
			break;
		case 'DELETE':
			if (isset($_GET['state'])) {
				$table = $_GET['table'];
				$state = $_GET['state'];
			} else {
				echo "<b>Error:</b> 'state name is required'<br>";
				break;
			}
			$sql = "delete from $table where state = '$state'";
			$displaySql = "select * from $table where state = '$state'";
			break;
	}

	$result = mysql_query($sql);

	if (!$result) {
	  http_response_code(404);
	  die(mysqli_error());
	}

	if ($method == 'GET') {
		$getRows = array();
		while($r = mysql_fetch_assoc($result)) {
			$getRows[] = $r;
		}
		echo json_encode($getRows);
	} elseif ($method == 'PUT') {
		$displayResult = mysql_query($displaySql);
		$putRows = array();
		while($r = mysql_fetch_assoc($displayResult)) {
			$putRows[] = $r;
		}
		echo json_encode($putRows);
	} elseif ($method == 'POST') {
		$verificationResult = mysql_query($displaySql);
		$postRows = array();
		while($r = mysql_fetch_assoc($verificationResult)) {
			$postRows[] = $r;
		}
		echo json_encode($postRows);
	} elseif ($method == 'DELETE') {
		$verificationResult = mysql_query($displaySql);
		$deleteRows = array();
		while($r = mysql_fetch_assoc($verificationResult)) {
			$deleteRows[] = $r;
		}
		echo json_encode($deleteRows);
	} else {
		echo mysqli_affected_rows($link);
	}

	mysqli_close($link);
?>
