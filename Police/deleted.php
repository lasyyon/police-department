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
		<a href="http://police/index.php" class="button">Главная</a>
		<a href="/search.php" class="button">Поиск</a>
		<a href="/deleted.php" class="button">Удаленные</a>
	</div>

	<div class='main'>
    <a href='http://police' style='text-decoration: none;'>← Назад</a>
    <h2>Police Department</h2>
    <h3>Список видалених злочинців</h3>

    <?php
	// Подключение к базе данных
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = 'mydatabase';

	$conn = mysqli_connect($host, $user, $password, $dbname);
    $sql = "SELECT * FROM deleted WHERE {$field} LIKE '%{$search_query}%'";


// Выполняем запрос и получаем результат
$sql = "SELECT * FROM deleted";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
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
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row['id'] . "</td><td> <img src=". $row['photo'] ." width='80px'> </td><td> <a href='/criminals.php?id=" . $row['id'] . "'> ".$row['name']."</> </td><td>" . $row['sex'] . "</td><td>" . $row['dbirth'] . "</td><td>" . $row['address'] . "</td><td>" . $row['nationality'] . "</td><td>" . $row['signs'] . "</td><td>" . $row['reason'] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Нет данных для отображения.</p>";
}

mysqli_close($conn);

?>
    </div>

