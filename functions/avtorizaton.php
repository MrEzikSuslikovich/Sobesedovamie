<?php
error_log(0); 
session_start();
function avtorization($login,$pass)
{	
	$link = mysqli_connect('localhost','root','','questiondb');
	if(isset($_POST['avtbut'])){
	$sql="SELECT * FROM avtorization where login='$login'";
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($result);
	if(empty($row[0])){
		$_SESSION['avtorizationcheck']="Неверный логин";
	}
	else{
		if($row[1]!=$pass){
			$_SESSION['avtorizationcheck']="Неверный пароль";
		}
		else{
			$_SESSION['avtorizationcheck']="YES";
		}
	}
}
}
?>
