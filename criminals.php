<link rel="stylesheet" type="text/css" href="style.css">

<?php
// Подключаемся к базе данных
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'mydatabase';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect($host, $user, $password, $dbname);

// Получаем id из URL-адреса
$id = $_GET['id'];

// Выбираем информацию о конкретном преступнике из базы данных
$sql = "SELECT * FROM criminals WHERE id = $id";
$result = mysqli_query($conn, $sql);
$criminal = mysqli_fetch_assoc($result);
?>

<div class="header-banner">
        <div class="container">
            <div class="header-banner__content">
                
                <a class="header-banner__logo">
                    <img class="header-banner__logo-img" src="/icon.svg" alt="Портал МВС" width='100px'>
                    <h2 class="header-banner__logo-title">Портал МВС</h1></a>
                
            </div>
        </div>
    </div>
<!-- Выводим информацию о преступнике -->
<div class='buttons'>	
		<a href="http://police" class="button">Головна</a>
		<a href="/search.php" class="button">Пошук</a>
		<a href="/deleted.php" class="button">Видалені</a>
	</div>
<div class='main'>
  <a href='http://police' style='text-decoration: none;'>← Назад</a>
  <h1><?php echo $criminal['name']; ?></h1>
  <img width='400px' src="<?php echo $criminal['photo']; ?>">

<!--/*  <form class='updform' action="update_criminal.php" method="POST">
        <table>
        <tr>
            <td>    <label for="name">ФИО:</label></td>
            <td>    <input type="text" name="name" value="<?php echo $criminal['name']; ?>"></td>
        </tr>
        <tr>
        <td>  <input type="hidden" name="id" value="<?php echo $criminal['id']; ?>"></td> 
        <td>   <input type="submit" value="Update"></td> 
        </tr>
        <table>
    </form>

  <p>Пол: <?php echo $criminal['sex']; ?></p>
  <p>Дата рождения: <?php echo $criminal['dbirth']; ?></p>
  <p>Адрес: <?php echo $criminal['address']; ?></p>
  <p>Национальность: <?php echo $criminal['nationality']; ?></p>
  <p>Приметы: <?php echo $criminal['signs']; ?></p>
  <p>Статья: <?php echo $criminal['reason']; ?></p>
</div>*/-->

<form method="POST" action="update_criminal.php" class='updform'>
    <p>ПІБ: <input type="text" name="name" value="<?php echo $criminal['name']; ?>"></p>
    <p>Стать: <input type="text" name="sex" value="<?php echo $criminal['sex']; ?>"></p>
    <p>Дата народження: <input type="text" name="dbirth" value="<?php echo $criminal['dbirth']; ?>"></p>
    <p>Адреса: <input type="text" name="address" value="<?php echo $criminal['address']; ?>"></p>
    <p>Національність: <input type="text" name="nationality" value="<?php echo $criminal['nationality']; ?>"></p>
    <p>Прикметы: <input type="text" name="signs" value="<?php echo $criminal['signs']; ?>"></p>
    <p>Причина: <input type="text" name="reason" value="<?php echo $criminal['reason']; ?>"></p>
    <input type="hidden" name="id" value="<?php echo $criminal['id']; ?>">
    <input type="submit" value="Обновить">
</form>

<style>

</style>
<!--'$photo', '$name', '$sex', '$dbirth', '$address', '$nationality', '$signs', '$reason'-->


