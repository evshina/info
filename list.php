<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Вы подключились!<br>";

$sql ="SELECT entrant.number_of_application, entrant.name_entrant, registration.id_special, specialty.name_special, specialty.info
    FROM registration, entrant, specialty
    WHERE entrant.number_of_application=registration.number_of_application
    AND
    registration.id_special=specialty.id_special";
if (mysqli_query($link, $sql)) {
  echo "Все супер!";
} else {
  echo "Что-то пошло не так... " . mysqli_error($link);
}

echo "<table border='1'>
<tr> 
<th>number_of_application</th>
<th>name_entrant</th>
<th>id_special</th>
<th>name_special</th>
<th>info</th>
</tr>";

$result = mysqli_query($link, $sql);
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['number_of_application'] . "</td>";
echo "<td>" . $row['name_entrant'] . "</td>";
echo "<td>" . $row['id_special'] . "</td>";
echo "<td>" . $row['name_special'] . "</td>";
echo "<td>" . $row['info'] . "</td>";
echo "</tr>";
}


mysqli_close($link);
?>