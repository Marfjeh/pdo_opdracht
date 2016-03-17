<!--
$getUsers = $DBH->prepare("SELECT * FROM users ORDER BY id ASC");
$getUsers->fetchAll();
if(count($getUsers) > 0){
    while($user = $getUsers->fetch()){
        echo $user['username']."<br/>";
    }
}else{
    error('No users.');
}-->

<html>
<head>
  <meta charset="utf-8"/>
  <script src="js/jquery-2.2.1.min.js"></script>
  <script src="js/mff.js">//MarfFrameWork! :D</script>
</head>
<body>
<?php
require_once("config.php");

try {
  //$stmt = $conn->prepare("INSERT INTO `data` (`ID`, `naam`, `email`, `bericht`, `IP`) VALUES (NULL, :name, :email, :bericht, :ip);");
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = $conn->prepare("SELECT * FROM data");
  $sql->execute();
  var_dump($sql->fetchAll(PDO::FETCH_ASSOC));
  while($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
    foreach ($row as $row) {
      print $row['ID'] . '<br>';
      print $row['naam'] . '<br>';
      print $row['Email'] . '<br>';
      print $row['Bericht'] . '<br>';
      print $row['IP'] . '<br>';
    }
  }
}
catch(PDOException $e)
{
  echo "Connection failed: \n" . $e->getMessage();
}

?>

 </body>
</html>
