<form method="get">
<input type="submit" name="navbut" value="Следующий">
<input type="submit" name="navbut" value="Предыдущий">
</form>
<?php
$idselec=1;
function dataredact($link,$idnum){
$sql="SELECT * FROM questions where id='$idnum'";
$result = mysqli_store_result($link);
$i=0;
echo "<table border='1' width='100%'>
   <tr>
    <th>Id</th>
    <th>title</th>
    <th>email</th>
    <th>content</th>
    <th>check</th>
   </tr>";
if (mysqli_multi_query($link,$sql)) {
	do {
      	if ($result = mysqli_store_result($link)) {
            while ($row = mysqli_fetch_row($result)){
            	echo ("<tr><th>".$row[0]."</th><th>".$row[1]."</th><th>".$row[2]."</th><th>".htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8')."</th><th>".$row[4]."</th></tr>");
            	$i++;
            }
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($link));
	}
    echo "</table>";	
}
if(isset($_GET['navbut'])=="Следующий"){
    $idselec++;
    dataredact($link, $idselec);
}
elseif (isset($_GET['navbut'])=="Предыдущий") {
    $idselec=$idselec-1;
    dataredact($link, $idselec);
}

?>