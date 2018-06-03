<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

header("Location: list.php");

echo "Вы подключились!<br>";

$id_record = $_GET['id_record'];
$name_entrant = $_GET['name_entrant'];
$id_special = $_GET['id_special'];

$sql = "UPDATE registration
        SET name_entrant = '" . $name_entrant . "', id_special = '" . $id_special . "' 
        WHERE number_of_application=" . $id_record . ";";


if (mysqli_query($link, $sql)) {
  echo "Все супер!";
} else {
  echo "Что-то пошло не так... " . mysqli_error($link);
}

$sql = "UPDATE entrant
        SET name_entrant = '" . $name_entrant . "' 
        WHERE number_of_application=" . $id_record . ";";

echo $sql;

if (mysqli_query($link, $sql)) {
  echo "Все супер!";
} else {
  echo "Что-то пошло не так... " . mysqli_error($link);
}

mysqli_close($link);

?>
