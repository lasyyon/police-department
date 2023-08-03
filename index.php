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
		<a href="" class="button">Головна</a>
		<a href="/search.php" class="button">Пошук</a>
		<a href="/deleted.php" class="button">Видалені</a>
	</div>

	<div class='main'>
		
	<h1>Police Department</h1>
	
	<div>
	<form class='add' method="post">
	<table>

	<!--<tr>
		<td align='right'><label for="photo">Фото:</label></td>
		<td><input type="file" id="photo" name="photo"><br></td>
	</tr>-->
	<tr>
		<td align='right'><label for="photo">Фото:</label></td>
		<td><input type="text" id="photo" name="photo"><br></td>
	</tr>

	<tr>
		<td align='right'><label for="sex">Стать:</label></td>
		<td><select id="sex" name="sex">
  		<option value="М" selected>М</option>
  		<option value="Ж">Ж</option>
		</select><br></td>
	</tr>
	<tr>
		<td align='right'><label for="name">ПІБ:</label></td>
		<td><input type="text" id="name" name="name"><br></td>
	</tr>
	<tr>
		<td align='right'><label  for="dbirth">Дата народження:</label></td>
		<td><input type="text" id="dbirth" name="dbirth"><br></td>
	</tr>
	<tr>
		<td align='right'><label  for="address">Адреса:</label></td>
		<td><input type="text" id="address" name="address"><br></td>
	</tr>
	<tr>
		<td align='right'><label  for="nationality">Національність:</label></td>
		<td><input type="text" id="nationality" name="nationality"><br></td>
	</tr>	
	<tr>
		<td align='right'><label  for="signs">Прикмети:</label></td>
		<td><input type="text" id="signs" name="signs"><br></td>
	</tr>
	<tr>
		<td align='right'><label  for="reason">Причина:</label></td>
		<td><input type="text" id="reason" name="reason"><br></td>
	</tr>
	</table>

	<button type="submit" class='submit' name="submit" value="Добавить">Додати</button>
	
	<br></form>
	<form class='delete' method="post">
	<br><label for="id">ID:</label>
		<input type="text" id="id" name="id"><br>
		<button type="submit" class='submit' name="submit" value="Удалить">Видалити</button>
	</form>
</div>
<br>

<form method="POST" action="search.php" class='delete'>
  <input type="text" id="id" name="search_query">
  <button type="submit" class='submit' >Search</button>
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
</form>


<?php 
include 'process.php';
?>


</div>
</body>



</html
