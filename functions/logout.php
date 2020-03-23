<?php
function exitsession()
{
	session_start();
	session_destroy();
	header('Location:http://localhost/Folder/view.php');
}
exitsession();
?>