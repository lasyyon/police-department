<?php
	// Подключение к базе данных
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$dbname = 'mydatabase';

	$conn = mysqli_connect($host, $user, $password, $dbname);
	if (!$conn) {
		die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
	}


	

	// Добавление новых данных в таблицу
	if (isset($_POST['submit']) && $_POST['submit'] == 'Добавить') {
		$photo = mysqli_real_escape_string($conn, $_POST['photo']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$sex = mysqli_real_escape_string($conn, $_POST['sex']);
		$dbirth = mysqli_real_escape_string($conn, $_POST['dbirth']);
		$address = mysqli_real_escape_string($conn, $_POST['address']);
		$nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
		$signs = mysqli_real_escape_string($conn, $_POST['signs']);
		$reason = mysqli_real_escape_string($conn, $_POST['reason']);
		$sql = "INSERT INTO criminals (photo, name, sex, dbirth, address, nationality, signs, reason) VALUES ('$photo', '$name', '$sex', '$dbirth', '$address', '$nationality', '$signs', '$reason')";
		if (mysqli_query($conn, $sql)) {
			echo "<p>Дані успішно додані!</p>";
		} else {
			echo "<p>Помилка додавання даних: " . mysqli_error($conn) . "</p>";
		}
	}

	// Удаление данных из таблицы
	if (isset($_POST['submit']) && $_POST['submit'] == 'Удалить') {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$sql = "INSERT INTO deleted (id, name, sex, photo, dbirth, address, nationality, signs, reason)
        SELECT id, name, sex, photo, dbirth, address, nationality, signs, reason
        FROM criminals WHERE id = '$id'";
		if ($conn->query($sql) === TRUE) {
    $delete_sql = "DELETE FROM criminals WHERE id = $id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Дані про злочинця успішно переміщені до таблиці \"deleted\" та видалені з таблиці \"criminals\"";
    } else {
        echo "Помилка видалення даних про злочинця з таблиці \"criminals\": " . $conn->error;
    }
} else {
    echo "Помилка переміщення даних про злочинця до таблиці \"deleted\": " . $conn->error;
}}

	// Отображение данных из таблицы
	$sql = "SELECT * FROM criminals";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<table width='70%' cellspacing='0' cellpadding='5' border='1' align='left'>";
		echo "<tr>
		<th>ID</th>
		<th>Фото</th>
		<th>ПІБ</th>
		<th>Стать</th>
		<th>Дата народження</th>
		<th>Адреса</th>
		<th>Національність</th>
		<th>Прикметы</th>
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