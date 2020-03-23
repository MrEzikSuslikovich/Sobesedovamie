<?php
require "function.php";
?>
<div id="questions" class="tabcontent">
<form class="question" method="get">
		<?php
		error_log(0); 
		pagination($link);
		if(isset($_GET['subsort']))
		{
			getsort($link,$_GET["sortsel"],$_GET["updown"],$_GET['page']);
		}
		?>
		<select name="sortsel">
                <option value=id>id</option>
                <option value=email>email</option>
                <option value=title>title</option>
                <option value=сontent>content</option>
                <option value=status>status</option>
        </select>
        <select name="updown">
        	<option value="">По возрастанию</option>
        	<option value="DESC">По убыванию</option>
        </select>
        <button type="submit" name="subsort" value=yes>Отсортировать</button>
	</form>
</div>

<div id="addquestion" class="tabcontent">
<form class="question" action="functions/function.php" method="post">
	<b>Имя <input type="text" name="title" autocomplete="off" required=""></b><p name="titlecheck"></p>
	<b>email <input type="email" name="email" autocomplete="off" required></b>
	<p>Текст<textarea name="content" required=""></textarea></p>
	<button type="submit" name="addingauestionbut">Добавить вопрос </button>
</form>
</div>

<div id="questionset" class="tabcontent">	
	<form method='post'>
		<b>Имя <input type='text' name='login' autocomplete='off' required=''></b>
		<b>Пароль <input type='password' name='pass' autocomplete='off' required=''></b>
		<button type='submi' name='avtbut'>Подвтердить</button>
	</form>
	<?php
	error_log(0); 
	require "avtorizaton.php"; 
	if (isset($_POST['avtbut']))
	{
		avtorization($_POST['login'],$_POST['pass']);
		if(isset($_SESSION['avtorizationcheck']) or $_SESSION["avtorizationcheck"]=="YES")
		{
			echo('Вы вошли ');
			echo("	<a href='logout.php'>Logout</a>");
			require "sqldatachange.php";
		}
		elseif(isset($_SESSION['avtorizationcheck']) and $_SESSION["avtorizationcheck"]!="YES"){
			echo('не вошли '.$_SESSION["avtorizationcheck"]);
		}
		elseif(empty($_SESSION['avtorizationcheck'])){
			echo "пройдите регистрацию";
		}
		if(isset($_POST['logout'])) {
		exitsession();
		
	}
}
	?>
	</form>

</div>