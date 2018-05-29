<?php
require_once 'connection.php';
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Вы подключились!<br>";

$id_record = $_GET['id'];

$sql = "DELETE
        FROM entrant
        WHERE number_of_application='" . $id_record . "';";

if (mysqli_query($link, $sql)) {
  echo "Все супер!";
} else {
  echo "Что-то пошло не так... " . mysqli_error($link);
}

mysqli_close($link);

header("Location: list.php");

?>