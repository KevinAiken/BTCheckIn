<!DOCTYPE html>
<html>
    <script src="js/jquery-3.1.1.min.js"</script>
    <script type="text/javascript" src="js/handlebars-v4.0.5.js"></script>

<head>
    <meta charset="utf-8">
    <title>Employee Checkin</title>
    <link  type="text/css" rel=stylesheet href="css/main.css">
</head>

<body>
    <sidebar>
        <ul>
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
                        <div class="status">
                            <p>{{status}}</p>
                        </div>
                    </div>
                </div>
            </script>
        </div>
    </div>
</body>

<script src="js/cards.js"></script>

<script>
<?php
$servername = 'localhost';
$username = 'monitor';
$password = 'MichaelChung1!';

$conn = mysql_connect($servername, $username, $password);
if( ! $conn) {
	die('Could not connect: ' . mysql_error());
} 

$sql = 'SELECT * FROM userstatus';
mysql_select_db('users');
$retval = mysql_query($sql, $conn);

if(!$retval){
	die('Could not get data: ' . mysql_error());
}

$cards = "";

while($row = mysql_fetch_assoc($retval)){
	cards += 'card(\"res/{$row['name']}.png\", \"' + {$row['name']} + '\", \" + {row['status']} + '\");<br>';
}

echo $cards;

mysql_close($conn);
?>
</script>
    
</html>
