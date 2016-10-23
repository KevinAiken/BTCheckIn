<!DOCTYPE html>
<html>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
  integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/handlebars-v4.0.5.js"></script>

<head>
    <meta charset="utf-8">
    <title>Employee Times</title>
    <link  type="text/css" rel=stylesheet href="css/main.css">
</head>

<body>
    <sidebar>
        <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li><a href="http://github.com/KevinAiken/BTCheckIn">Github</a></li>
        </ul>
    </sidebar>

    <div id="card-container">
        <div id="center-cards">
            <script id="card-template" type="text/x-handlebars-template">
                <div class="card">
                    <div class="img">
                        <img src={{img}}>
                    </div>
                    <div class="info">
                        <div class="name">
                            <h2>{{name}}</h2>
                        </div>
                        <div class="isIn">
                            <p>{{isIn}}</p>
                        </div>
                        <div class="lastIn">
                            <p>{{lastIn}}</p>
                        </div>
                    </div>
                </div>
            </script>
        </div>
    </div>
</body>


<script src="js/cards.js"></script>
<?php
$username = "monitor";
$password = "MichaelChung1!";
$hostname = "localhost";
//php connect to mysql
$conn = mysql_connect($hostname, $username, $password);

mysql_select_db("users");
$result = mysql_query("SELECT * FROM usersdat", $conn);
if(!$result){
  die("Could not get data: ". mysql_error());
}
$scriptString = "<script type=\"text/javascript\">";
while($row = mysql_fetch_array($result)){
  $scriptString += "card(\"res/avatar.jpg\","+ $row[1] + ", \""+ $row[2]+ "," + $row[3] ");";
}
$scriptString += "</script>";

echo $scriptString;
?>
</html>
