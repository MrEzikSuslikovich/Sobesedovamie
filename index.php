<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
 <meta charset="utf-8">
body {font-family: Arial;}
    form.question
    {
      border: 1px solid #54ba4e;
      border-width: 1px;
      border-color: black;
      padding: 8px;
    }
    textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
    box-sizing: border-box;
    }
    button
    {
      padding: 8px;
      margin-bottom: 10px;
    }
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}
.tab button:hover {
  background-color: #ddd;
}
.tab button.active {
  background-color: #ccc;
}
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}
.topright:hover {color: red;}
</style>
</head>
<body>
<h2>Tabs</h2>
<div class="tab">

  <button class="tablinks" onclick="openCity(event, 'questions')" id="defaultOpen">Вопросы</button>
  <button class="tablinks" onclick="openCity(event, 'addquestion')">Добавить вопрос</button>
  <button class="tablinks" onclick="openCity(event, 'questionset')">Изменить вопросы</button>
</div>

<?php  
require "functions/view.php";
?>

<script>
function openCity(evt, cityName) {
  document.getElementById("defaultOpen").click();
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</body>
</html> 
