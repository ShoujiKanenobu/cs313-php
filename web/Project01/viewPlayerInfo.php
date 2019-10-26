<?php

require('connectDb.php');

include ("idToChamp.php");
include ("champToID.php");

if (!isset($_POST['selfInput'])) {
    header("Location: homepage.html");
} else {
  $self = strtolower($_POST['selfInput']);
}

//Database Call to see who else has the same favorite champion based on join between get user and fav champ, then join with other users and fav
$db = getDb();

try {
	//$query = 'SELECT u."summonerName", pl."championId" FROM usersv2 u JOIN players pl ON u."playerID" = pl."playerPk" WHERE u."summonerName" = :self';
	$query = 'SELECT u.summonerName, pl.championId FROM usersv2 u JOIN players pl ON u.playerID = pl.playerPk WHERE u.summonerName = :self';
	$statement = $db->prepare($query);

	$statement->bindValue(':self', $self);

	$statement->execute();
	$rows = $statement->fetchALL(PDO::FETCH_ASSOC);

	$summonerName = $rows["summonerName"];
	$champId = $rows["championId"];

	$favChamp = ChIDToName($champId);
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
	<?php 
	if(!worked)
	{
		echo $favChamp;
	}
	//Say if we failed, if they need to create a profile down below, or succeded
	?>
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
  </div>
  <br>
  <div>
    <h4>Results!</h4>
    <?php
    if(worked)
    {
    	echo $summonerName + "enjoys playing " + $favChamp;
    }
    ?>

  </div>
</body>
</html>
