<html>
<body>

<?php

require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Вы подключились!<br>";

$id_record = $_GET["id"];

$sql ="SELECT entrant.name_entrant as name_entrant, registration.id_special as id_special, specialty.name_special as name_special
    FROM registration, entrant, specialty
    WHERE entrant.number_of_application=registration.number_of_application
    AND
    registration.id_special=specialty.id_special AND entrant.number_of_application=" . $id_record . ";";

$result = mysqli_query($link, $sql);
$record = mysqli_fetch_assoc($result);


$sql2 = "SELECT * FROM specialty;";
$result2 = mysqli_query($link, $sql2);

?>

<form action="update.php" method="get">
    <input type="hidden" name="id_record" value=<?php echo $id_record; ?>><br>
    Name Entrant:
    <input type="text" name="name_entrant" value=<?php echo $record['name_entrant']; ?>><br>
    Name Special:
    <select name="id_special">
        <?php 
            while($row = mysqli_fetch_assoc($result2)) {
                echo $row;
                if ($row['id_special'] == $record['id_special'])
                    echo "<option selected value='" . $row['id_special'] . "'>" . $row['name_special'] . "</option>";
                else
                    echo "<option value='" . $row['id_special'] . "'>" . $row['name_special'] . "</option>";                    

            }
        ?>
    </select><br>

    <input type="submit">
</form>

</body>
</html>
