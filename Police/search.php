<!DOCTYPE html>
<html>
<head>
	<title>Police</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="/icon.svg">
</head>
<body>
<div class="header-banner">
        <div class="container">
            <div class="header-banner__content">
                
                <a class="header-banner__logo">
                    <img class="header-banner__logo-img" src="/icon.svg" alt="Портал МВС" width='100px'>
                    <h2 class="header-banner__logo-title">Портал МВС</h1></a>
                
            </div>
        </div>
      </div>

      <div class='buttons'>	
		<a href="http://police/" class="button">Головна</a>
		<a href="/search.php" class="button">Пошук</a>
		<a href="/deleted.php" class="button">Видалені</a>
	</div>
       <div class='main'>
       <a href='http://police' style='text-decoration: none;'>← Назад</a>
            <form action="search.php" method="POST" class='delete'>
            <label for="field"></label>
            <select name="field" id="field">
            <option value="id">ID</option>
            <option value="name">Ім'я</option>
            <option value="sex">Стать</option>
            <option value="dbirth">Дата народження</option>
            <option value="address">Адреса</option>
            <option value="nationality">Національність</option>
            <option value="signs">Прикмети</option>
            <option value="reason">Причина</option>
         </select>
  <br>
  <label for="search_query">Введіть дані</label>
  <input id="id" type="text" name="search_query" id="search_query">
  <br>
  <input type="submit" value="Search" class='submit'>

</form>
<?php

// Получаем запрос из формы
$search_query = $_POST['search_query'];
$field = $_POST['field'];

// Подключаемся к базе данных
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'mydatabase';

$conn = mysqli_connect($host, $user, $password, $dbname);

// Формируем запрос к базе данных
$sql = "SELECT * FROM criminals WHERE {$field} LIKE '%{$search_query}%'";


// Выполняем запрос и получаем результат
$result = $conn->query($sql);



// Выводим результаты на HTML-страницу
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		echo "<table width='70%' cellspacing='0' cellpadding='5' border='1' align='left'>";
		echo "<tr>
		<th>ID</th>
		<th>Фото</th>
		<th>ФИО</th>
		<th>Пол</th>
		<th>Дата рождения</th>
		<th>Адрес</th>
		<th>Национальность</th>
		<th>Приметы</th>
		<th>Причина</th>
		</tr>";
    echo "<tr><td>" . $row['id'] . "</td><td> <img src=". $row['photo'] ." width='80px'> </td><td> <a href='/criminals.php?id=" . $row['id'] . "'> ".$row['name']."</> </td><td>" . $row['sex'] . "</td><td>" . $row['dbirth'] . "</td><td>" . $row['address'] . "</td><td>" . $row['nationality'] . "</td><td>" . $row['signs'] . "</td><td>" . $row['reason'] . "</td></tr>";
		echo "</table>";
    }
  } else {
    echo "<span style='color: red;'> Поки що дані не знайдені: ( </span>";
  }

$conn->close();

/*// Выводим результаты на HTML-страницу
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . "<br>";
        echo "ФИО: "  . $row["name"] .  "<br>";
        echo "Пол: " . $row["sex"] . "<br>";
        echo "Дата рождения: " . $row["dbirth"] . "<br>";
        echo "Адрес: " . $row["address"] . "<br>";
        echo "Национальность: " . $row["nationality"] . "<br>";
        echo "Приметы: " . $row["signs"] . "<br>";
        echo "Причина: " . $row["reason"] . "<br>";
    }
  } else {
    echo "0 results";
  }*/
?>

</div>
</form> 









