<?php
require('db.php');

if (!isset($_POST['user'])) {
    header("Location: 05Prove.html");
} else {
  $user = strtolower($_POST['user']);
}

$db = getDB();
  $query = $db->prepare('SELECT user_first, user_second from friends where LOWER(user_first)=:user OR LOWER(user_second)=:user');
  $query->execute(array(":user" => $user));
  $rows = $query->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Search Results for <?php echo $book; ?></title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  
  <?php
  echo "<h3>Friends of " . $user . " are...</h3>");
    foreach($rows as $row) {
      echo "<div class='row'>";
      if($row["user_first"] == $user)
        echo "<a>" . $row["user_second"] . "</a>";
      if($row["user_second"] == $user)
        echo "<a>" . $row["user_first"] . "</a>";
      echo "</div>";
    }
  ?>
  </div>
  
</body>
</html>