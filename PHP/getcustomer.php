<?php
  $mysqli = new mysqli("localhost", "dbuser", "Yeet360-", "klanten");
  if($mysqli->connect_error) {
    exit('Could not connect');
  }

  $sql = "SELECT Klantnum, Achternaam, Voornaam, Stad
  FROM klantinfo WHERE Klantnum = ?";

  $stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($knm, $an, $vn, $std);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>KLanten nummer</th>";
echo "<td>" . $knm . "</td>";
echo "<th>Achternaam</th>";
echo "<td>" . $an . "</td>";
echo "<th>Voornaam</th>";
echo "<td>" . $vn . "</td>";
echo "<th>Stad</th>";
echo "<td>" . $std . "</td>";
echo "</tr>";
echo "</table>";
?>
