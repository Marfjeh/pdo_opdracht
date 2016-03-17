<?php
require_once("config.php"); //Settings containing Database, host username etc.

//infromatie van de form:
$naam = $_POST['naam'];
$Email = $_POST['email'];
$bericht = $_POST['bericht'];
$IP = $_SERVER['REMOTE_ADDR'];

try {
$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
$stmt = $conn->prepare("INSERT INTO `data` (`ID`, `naam`, `email`, `bericht`, `IP`) VALUES (NULL, :name, :email, :bericht, :ip);");
$stmt->bindParam(':name', $naam);
$stmt->bindParam(':email', $Email);
$stmt->bindParam(':bericht', $bericht);
$stmt->bindParam(':ip', $IP);
$stmt->execute();
echo "Succes!";
}
catch(PDOException $e)
{
  echo "Connection failed: \n" . $e->getMessage();
}
?>
