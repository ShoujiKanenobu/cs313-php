<?php
include 'idToChamp.php';
include 'champToId.php';

if (!isset($_POST['summonerInput'])) {
    header("Location: homepage.html");
} else {
  $user = strtolower($_POST['summonerInput']);

if (!isset($_POST['favoriteChampion'])) {
    header("Location: homepage.html");
} else {
  $faveChamp = strtolower($_POST['favoriteChampion']);

$serializedFavChamp = NameToChID(faveChamp);

//database update call to create new user and/or update new champion

//query our new user and see if we get something back


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
    //Say we made the change or failed by seeing if we got back anything from our query
    ?>
  </div>
  <br>
  <div>
</body>
</html>