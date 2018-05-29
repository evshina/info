   <?php
   require_once 'connection.php'; // подключаем скрипт
 
    $link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

    $name = strtr($_GET['name'], '*', '%');
    $fio = strtr($_GET['fio'], '*', '%');

    echo "<form method='GET' action='search.php'>
    <p>Введите данные абитуриента: <input type='text' name='name' value='$name'></p>
    <p>Введите данные, полученные при подаче документов: <input type='text' name='fio' value='$fio'></p>
    <p><input type='submit' name='enter' value='Поиск'></p>
    </form>";

    if (isset($_GET['enter']))
    {
      $sql="SELECT entrant.name_entrant, registration.id_depart
    FROM entrant, registration
    WHERE entrant.name_entrant=registration.name_entrant 
    AND entrant.name_entrant LIKE '%$name%' AND registration.id_depart LIKE '%$fio%'";

$result = mysqli_query($link, $sql);
echo "<table border='1'>
<tr> 
<th>name_entrant</th>
<th>id_department</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['name_entrant'] . "</td>";
echo "<td>" . $row['id_department'] . "</td>";
echo "</tr>";
}

echo "</table>"; 

}


mysqli_close($link);
?>

