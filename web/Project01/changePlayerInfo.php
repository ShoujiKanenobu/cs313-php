<?php

require('connectDb.php');

include 'idToChamp.php';
include 'champToID.php';

if (!isset($_POST['summonerInput'])) {
    header("Location: homepage.html");
} else {
  $user = strtolower($_POST['summonerInput']);
}

if (!isset($_POST['favoriteChampion'])) {
    header("Location: homepage.html");
} else {
  $faveChamp = $_POST['favoriteChampion'];
}

$serializedFavChamp = NameToChID(faveChamp);

$db = getDb();

try {
	$query = 'INSERT INTO players ("championId") VALUES (:serializedFavChamp)';
	$statement = $db->prepare($query);
	$statement->execute(array(":serializedFavChamp"=> $serializedFavChamp));

	$query = 'INSERT INTO usersv2 ("summonerName") VALUES (:summonerInput)';
	$statement = $db->prepare($query);
	$statement->execute(array(":summonerInput"=> $summonerInput));
}
catch (Exception $e) {
	echo json_encode("Error " . $e->getMessage());
	die();
}

?>

<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project 01</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
</head>
<body>
  <h1>Champ Match</h1>
  <div>
  <h4>Search people with similar favorite champions!</h4>
	<form action="viewPlayerInfo.php" method="POST">
    Enter your name <br>
		<input type="textbox" name="selfInput" id="selfInputBox">
    <br>
    <input type="submit" name="submitSelf" id="submitSelf" value="Search">
	</form>
  </div>
  <br>
  <div>
    <form action="changePlayerInfo.php" method="POST">
    <h4>Change your favorite champion!</h4>
    Enter your summoner name
      <br>
    <input type="textbox" name="summonerInput" id="summonerInputText">
      <br>
      Enter your new favorite champion!
      <br>
      <input type="textbox" name="favoriteChampion" id="favoriteChampionText">
      <br>
      <input type="submit" name="submitChange" id="submitChangeButton" value="Change!">
    </form>
    <?php
    	echo "<div>Added New profile!</div>";
    ?>
  </div>
  <br>
  <div>
</body>
</html>