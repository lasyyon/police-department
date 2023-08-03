<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $sex = $_POST['sex'];
  $dbirth = $_POST['dbirth'];
  $address = $_POST['address'];
  $nationality = $_POST['nationality'];
  $signs = $_POST['signs'];
  $reason = $_POST['reason'];

  // подключаемся к базе данных
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'mydatabase';

  $conn = mysqli_connect($host, $user, $password, $dbname);
  if (!$conn) {
      die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
  }

  // обновляем данные в базе данных
  //$query = "UPDATE criminals SET name='$name' WHERE id='$id'";
  $query = "UPDATE criminals SET name='$name', sex='$sex', dbirth='$dbirth', address='$address', nationality='$nationality', signs='$signs', reason='$reason' WHERE id='$id'";
  mysqli_query($conn, $query);

  // перенаправляем на страницу с преступниками
  header('Location: index.php');
?>