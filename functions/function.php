<?php
error_log(0); 
$link = mysqli_connect('localhost','root','','questiondb');
function addquestion($link,$title,$email,$content){
	$sql = "INSERT INTO questions (title,email,content) VALUES ('$title','$email','$content')";
	if (mysqli_query($link, $sql)) {
    	header('Location:http://localhost/Folder/index.php'); #в случае успеха автоматически перейдет на главную
	}
}
if(isset($_POST["addingauestionbut"]))
{
	 addquestion($link,$_POST['title'],$_POST['email'],$_POST['content']);
}
function pagination($link){
	echo "<br>";
    $sql="SELECT count(id) FROM questions";
	$result=mysqli_query($link,$sql);
	$row=mysqli_fetch_row($result);
    $k=$row[0]%3;
    if($k==0)
    {
    	$k=$row[0]/3;
    }
    elseif ($k>0) {
    	while ($k*3<$row[0]) {
    		$k++;
    	}
    }
    echo "<table> <tr>";
    echo "<th><input type='radio' name='page' value='1' checked></th>";
	for ($i=2; $i <= $k; $i++){
    		echo "<th><input type='radio' name='page' value='$i'></th>";
	}
	 echo "<tr>";
	for ($i=1; $i <= $k; $i++){
    		echo "<th>".$i."</th>";
	}
	echo "</tr>";
	echo "</table> </tr>";
}
function getsort($link,$sorter,$key,$s)
{
	$sql="SELECT * FROM questions order by $sorter $key ";
	$result = mysqli_store_result($link);
	$massiv=[];
	$i=0;
	if (mysqli_multi_query($link,$sql)) {
		do {
        if ($result = mysqli_store_result($link)) {
            while ($row = mysqli_fetch_row($result)){
            	$massiv[$i]="<tr><th>".$row[0]."</th><th>".$row[1]."</th><th>".$row[2]."</th><th>".htmlspecialchars($row[3], ENT_QUOTES, 'UTF-8')."</th><th>".$row[4]."</th></tr>";
            	$i++;
            }
            mysqli_free_result($result);
        }
    } while (mysqli_next_result($link));
	}
$sql="SELECT count(id) FROM questions";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_row($result);
$i=$s*3;
$k=$i-3;
echo "<table border='1' width='100%' cellpadding='5'>
   <tr>
    <th>Id</th>
    <th>title</th>
    <th>email</th>
    <th>content</th>
    <th>check</th>
   </tr>";
for ($k; $k < $i; $k++){
	if($k+1>$row[0])
	{
		$k++;
	}
	else{
		printf($massiv[$k]);
	}
	}
echo "</table>";
if ($s=="DESC") {
	echo "Текущая страница $s сортировка по $sorter по убыванию <br>";
}
else{
	echo "Текущая страница $s сортировка по $sorter по возрастанию <br> ";
}
}

?>

