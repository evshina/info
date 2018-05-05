<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());

echo "Вы подключились!<br>";
 

$sql = 'CREATE table entrant (
  number_of_application int(10) AUTO_INCREMENT,
  name_entrant varchar(35) not null,
  form varchar(10) not null,
  medal int(1) not null,
  basis varchar(10) not null,
  exams int(3),
  extra int(1) not null,
  primary key (number_of_application)
  ) ENGINE=MyISAM';
if (mysqli_query($link, $sql)) {
echo "Table
created successfully<br>";
} else {
echo "Error 
creating table: <br>" . mysqli_error($link);
}

$sql = "INSERT INTO entrant VALUES ('123', 'Ivanov Ivan', 'ochno', '0', 'budget', '258', '0'),
('234', 'Petrov Petr', 'zaochno', '0', 'contract', '211', '0'),
('345', 'Lizova Liza', 'ochno', '1', 'budget', '289', '0')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql ="CREATE TABLE administration (
  id_admin int(6) not null,
  positions int(5),
  id_depart int(6) not null,
  id_special int(6) not null,
  id_fac int(6) not null,
  primary key (id_admin)
  ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO administration VALUES ('111', '20', '111', '111', '111'),
('222', '45', '222', '222', '222'),
('333', '65', '333', '333', '333')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql ="CREATE TABLE worker (
  number_worker int(6) not null,
  name_worker varchar(35) not null,
  id_admin int(6) not null,
  schedule varchar(15) not null,
  primary key (number_worker)
  ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO worker VALUES ('987', 'Solnishkin', '111', 'Mon, Tue'),
('654', 'Luchikov', '222', 'Wed, Thu'),
('321', 'Krasavchik', '333', 'Sat, Sun')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql="CREATE TABLE department (
  id_depart int(6) not null,
  name_depart varchar(30) not null,
  id_special int(6) not null,
  id_fac int(6) not null,
  main_person varchar(30),
  primary key (id_depart)
  ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO department VALUES ('111', 'ITGS', '111', '111', 'Okonzeva'),
('222', 'KT', '222', '222', 'Ulochkin'),
('333', 'PIKT', '333', '333', 'Travkin')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql ="CREATE TABLE faculty (id_fac int(6) not null,
  name_fac varchar(30) not null,
  id_special int(6) not null,
  id_admin int(6) not null,
  id_depart int(6) not null,
  primary key (id_fac))
  ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO faculty VALUES ('111', 'Business Informatics', '111', '111', '111'),
('222', 'Computer Science', '222', '222', '222'),
('333', 'Data Science', '333', '333', '333')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


$sql="CREATE TABLE specialty (
  id_special int(6) not null,
  name_special varchar(30) not null,
  info varchar(100),
  curator varchar(35),
  id_depart int(6) not null,
  id_fac int(6) not null,
  primary key(id_special))
  ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO specialty VALUES ('111', 'Intellectual systems', 'a lot of humanitarian subjects', 'Ann', '111', '111'),
('222', 'Mobile technologies', 'connected with mobile apps', 'Vlad', '222', '222'),
('333', 'Programming', 'hard', 'Kate', '333', '333')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}

$sql ="CREATE TABLE registration (
  number_of_application int(10) not null,
  numberr int(6) not null,
  name_entrant varchar(35) not null,
  form varchar(10) not null,
  id_depart int(6) not null,
  id_fac int(6) not null,
  id_special int(6) not null,
  rating int(5),
  primary key(number_of_application),
  foreign key (number_of_application) references entrant (number_of_application),
  foreign key (numberr) references worker (number_worker)
  ) ENGINE=MyISAM";
if (mysqli_query($link, $sql)) {
echo "Table
created successfully";
} else {
echo "Error 
creating table: " . mysqli_error($link);
}

$sql = "INSERT INTO registration VALUES ('123', '987', 'Ivanov Ivan', 'ochno', '111', '111', '111', '32'),
('234', '654', 'Petrov Petr', 'zaochno', '222', '222', '222', '43'),
('345', '321', 'Lizpva Liza', 'ochno', '333', '333', '333', '14')";
if (mysqli_query($link, $sql)) {
  echo "Created successfully<br>";
} else {
  echo "Error creating <br>" . mysqli_error($link);
}


mysqli_close($link);
?>